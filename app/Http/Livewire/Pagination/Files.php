<?php

namespace App\Http\Livewire\Pagination;

use App\Models\File;
use App\Models\Stage;
use App\Models\Subject;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Files extends Component
{
    use WithPagination;
    use WithFileUploads;

    protected string $paginationTheme = 'bootstrap';
    public string $searchTerm;
    public int $limit = 10;
    public bool $isCreate = false;
    public Collection $subjects;

    public  $name, $file, $path, $subject;


    public function showModel()
    {
        $this->isCreate = !$this->isCreate;
    }


    protected array $rules = [
        'name' => 'required|min:4',
        'subject' => 'required|exists:subjects,id',
        'file' => 'required|file|max:1024',
    ];

    /**
     * @throws ValidationException
     */
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }


    /**
     * @return RedirectResponse
     */
    public function submit(): RedirectResponse
    {

        $this->validate();


        $data = $this->file->store('public/files');

        $data = Str::replace('public', 'storage', $data);

        File::query()->create([
            'name' => $this->name,
            'subject_id' => $this->subject,
            'type' => $this->file->getMimeType(),
            'path' => $data,
        ]);
        return redirect()->to('/files')->with(['success' => 'File is Added  !']);
    }


    /**
     * @return Application|Factory|View|\Illuminate\Foundation\Application
     */
    public function render(): \Illuminate\Foundation\Application|View|Factory|Application
    {
        //todo filter subject that belongs to the Auth user
        //todo add the subjects that has been created by admin
        $this->subjects = Subject::all();

        $searchTerm = '%' . $this->searchTerm . '%';
        $limit = $this->limit;

        $files = File::query()
            ->where("name", 'like', $searchTerm)
            ->where('created_by', Auth::id())
            ->paginate($limit);
        return view('livewire.pagination.files',
            ['files' => $files]);
    }
}
