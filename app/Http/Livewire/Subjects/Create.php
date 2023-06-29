<?php

namespace App\Http\Livewire\Subjects;

use App\Models\Stage;
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
    public $stages;
    public $teachers;




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

      $teacher=User::query()->where('id',$this->teacher)->first();

       $subject= Subject::create([
            'name' => $this->name,
            'stage_id' => $this->stage,
            'image' =>$data,
        ]);
        $subject->teachers()->sync($teacher);
        return redirect()->to('/subjects')->with(['success'=>'Subject is updated !']);
    }

    public function render()
    {
        $this->stages=Stage::query()->get();
        $this->teachers=\App\Models\User::query()->whereHas("roles",function ($query){
            $query->where('id',2);
        })->orderByDesc("id")->limit(5)->get();
        return view('livewire.subjects.create');
    }
}
