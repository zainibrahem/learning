<?php

namespace App\Http\Livewire\Pagination;

use App\Models\File;
use App\Models\Stage;
use App\Models\Subject;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Files extends Component
{
    use WithPagination;
    use WithFileUploads;

    protected $paginationTheme = 'bootstrap';
    public $searchTerm;
    public $limit = 10;
    public $isCreate = false;
    public $subjects;

    public $name, $file, $path, $subject;


    public function showModel()
    {
        $this->isCreate = !$this->isCreate;
    }


    protected $rules = [
        'name' => 'required|min:4',
        'subject' => 'required|exists:subjects,id',
        'file' => 'required|file|max:1024',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }


    public function submit()
    {

        $this->validate();


        $data = $this->file->store('public/files');

        $data = Str::replace('public', 'storage', $data);

        File::create([
            'name' => $this->name,
            'subject_id' => $this->subject,
            'type' => $this->file->getMimeType(),
            'path' => $data,
        ]);
        return redirect()->to('/files')->with(['success' => 'File is Added  !']);
    }


    public function render()
    {
        //todo filter subject that belongs to the Auth user
        //todo add the subjects that has been created by admin
        $this->subjects = Subject::all();

        $searchTerm = '%' . $this->searchTerm . '%';
        $limit = $this->limit;

        $files = File::query()->
        where("name", 'like', $searchTerm)->
        where('created_by', Auth::id())->
        paginate($limit);
        return view('livewire.pagination.files', ['files' => $files]);
    }
}
