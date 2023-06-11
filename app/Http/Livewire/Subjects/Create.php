<?php

namespace App\Http\Livewire\Subjects;

use App\Models\Subject;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;

class Create extends Component
{
    use WithFileUploads;

    public $name;
    public $stage;
    public $image;
    public $teacher = '';




    protected $rules = [
        'name' => 'required|min:4',
        'stage' => 'required|exists:stages,id',
        'image' => 'required|image|max:1024',
        'teacher' => 'required',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }


    public function submit()
    {
        //Todo handle the teacher
        $this->validate();

       $data= $this->image->store('public/subjects');

      $data=Str::replace('public','storage',$data);

        Subject::create([
            'name' => $this->name,
            'stage_id' => $this->stage,
            'image' =>$data,
        ]);
        return redirect()->to('/subjects')->with(['success'=>'Subject is updated !']);
    }

    public function render()
    {
        return view('livewire.subjects.create');
    }
}
