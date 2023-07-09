<?php

namespace App\Http\Livewire\Questions;

use App\Models\Subject;
use Livewire\Component;

class Create extends Component
{

    public $counter=1;
    public $subjects;

    public function addQuestion(){
        $this->counter++;

    }


    protected $listeners = [
        'getNewCounter',
        'redirects'
    ];
//
    public function redirects()
    {

            return redirect()->back()->with('success','created !');


}
    public function getNewCounter($value)
    {
        if(!is_null($value))
            $this->counter = $this->counter-1;
    }

    public function render()
    {
        $this->subjects=Subject::query()->get();
        return view('livewire.questions.create');
    }
}
