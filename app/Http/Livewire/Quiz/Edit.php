<?php

namespace App\Http\Livewire\Quiz;

use App\Models\Quiz;
use App\Models\QuizQuestions;
use App\Models\Subject;
use Livewire\Component;

class Edit extends Component
{
    public $subject;
    public $ids = [];
    public $questions = null;
    public $selectedQuestion = [];
    public $selectedQuestions = [];

    public $quiz;
    public $name;
    public $data;


    protected $listeners = [
        'setSelectedQuestion',
        "removeMyQuestion",
        'addSubject'

    ];

    protected $rules = [
        'name' => 'required|string|min:4',
        'selectedQuestion' => 'required|array|min:2'
    ];



    public function mount()
    {

        $quiz = Quiz::query()->where("id", $this->data)->first();
        $this->quiz = $quiz;
        $this->name = $quiz->name;


        foreach ($quiz->questions as $item) {
            array_push($this->selectedQuestion, $item);
            array_push($this->ids, $item->id);
            array_push($this->selectedQuestions, $item);
        }
        $this->questions = Subject::query()->where("id", $quiz->subject_id)->first()->questions()->whereNotIn("id", $this->ids)->get();

    }


    public function removeMyQuestion($id)
    {
        if (!is_null($id)) {

            $this->ids = array_filter($this->ids, function ($element) use ($id) {
                return $element != $id;
            });

            $this->selectedQuestions = QuizQuestions::query()->whereIn("id", $this->ids)->get();

            $this->questions = QuizQuestions::query()->whereNotIn("id", $this->ids)->get();

        }
    }


    public function setSelectedQuestion($item)
    {
        if (!is_null($item)) {

            array_push($this->ids, $item);

            $this->selectedQuestions = QuizQuestions::query()->whereIn("id", $this->ids)->get();
            $this->selectedQuestion= $this->selectedQuestions;
            $this->questions = $this->questions->whereNotIn("id", $this->ids);

        }


    }



    public function submit()
    {
        $valid = $this->validate();

        $quiz = Quiz::query()->where('id',$this->data)->first();
        $quiz->update(['name' => $valid["name"]]);

        $quiz->questions()->detach();
        $quiz->questions()->attach($this->ids);
        return redirect()->to("quiz")->with('success','Quiz '.$valid["name"].' Edited !');

    }

    public function render()
    {
        return view('livewire.quiz.edit');
    }
}
