<?php

namespace App\Http\Livewire\Subjects;

use App\Models\Stage;
use App\Models\Subject;
use Livewire\Component;

class Edit extends Component
{
    public $data;
    public $subject;

    public $name;
    public $stage;
    public $image;
    public $teacher = '';
    public $otherStage ;


    public $name1;
    public $stage1;
    public $image1;
    public $teacher1 = '';
    public $otherStage1 ;


    protected $rules = [
        'name1' => 'sometimes|min:4',
        'stage1' => 'sometimes|exists:stages,id',
        'image1' => 'sometimes|image|max:1024',
        'teacher1' => 'sometimes',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);

    }


    public function submit()
    {
        //Todo handle the teacher
        $this->validate();
        dd($this);
        $fileName = uniqid();
        $this->image->storeAs('subjects', $fileName . '.png');

        Subject::create([
            'name' => $this->name,
            'stage_id' => $this->stage,
            'image' => 'subjects/' . $fileName,
        ]);
        return redirect()->to('/subjects');
    }


    public function render()
    {
        $subject= Subject::query()->where("id",$this->data)->first();
        $this->subject=$subject;
        $this->name=$subject->name;
        $this->stage=$subject->stage->name;
        $this->image=$subject->image;
        $this->teacher = $subject;
        $this->otherStage=Stage::query()->where("id",'<>',$subject->stage->id)->get();
        return view('livewire.subjects.edit');
    }
}
