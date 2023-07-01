<?php

namespace App\Http\Livewire\Subjects;

use App\Models\Stage;
use App\Models\Subject;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;

class Edit extends Component
{
    use WithFileUploads;
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
        'name' => 'sometimes|min:4',
        'stage' => 'sometimes',
        'image1' => 'sometimes',
        'teacher' => 'sometimes',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);

    }

    public function updateName()
    {
        // Perform any action with the new value here
        // For example, you can update the property value
        $this->name = $this->name; // This is just to trigger the property update
    }

    public function updateImage()
    {
        // Perform any action with the new value here
        // For example, you can update the property value
        $this->image = $this->image1; // This is just to trigger the property update
    }

    public function updateStage()
    {
        // Perform any action with the new value here
        // For example, you can update the property value
        $this->stage = $this->stage; // This is just to trigger the property update
    }


    public function submit()
    {
        //Todo handle the teacher
      $data= $this->validate();

       if ($data['image1']){
           $imagePath= $this->image1->store('public/subjects');

           $imagePath=Str::replace('public','storage',$imagePath);

           Subject::query()->where('id',$this->data)->update([
               'name' => $this->name,
               'stage_id' => $this->stage,
               'image'=>$imagePath
           ]);

       }else{
           Subject::query()->where('id',$this->data)->update([
               'name' => $this->name,
               'stage_id' => $this->stage,
           ]);

       }



        return redirect()->to('/subjects')->with(['success'=>'Subject is updated !']);
    }

    public function mount()
    {
        $subject= Subject::query()->where("id",$this->data)->first();
        $this->subject=$subject;
        $this->name=$subject->name;
        $this->stage=$subject->stage->id;
        $this->image=$subject->image;
        $this->teacher = $subject;
    }

    public function removeTeacher($teacherId):void{
        $this->subject->teachers()->detach($teacherId);
        $this->render();
    }



    public function render()
    {

        $subject= Subject::query()->where("id",$this->data)->first();

        $this->otherStage=Stage::query()->where("id",'<>',$subject->stage->id)->get();
        return view('livewire.subjects.edit');
    }
}
