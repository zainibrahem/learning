<?php

namespace App\Http\Livewire\Quiz;

use App\Models\Quiz;
use App\Models\QuizQuestions;
use App\Models\Subject;
use Livewire\Component;

class Create extends Component
{

    public $subject;

    public $selectedSubject;
    public $name;
    public $questions = null;
    public $selectedQuestion = [];
    public $selectedQuestions;

    protected $rules = [
        'name' => 'required|string|min:4',
        'subject' => 'required|exists:subjects,id',
        'selectedQuestion' => 'required|array|min:2'
    ];


    protected $listeners = [
        'setSelectedQuestion',
        "removeMyQuestion",
        'addSubject'

    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function submit()
    {
        $valid = $this->validate();

        $quiz = Quiz::query()->create(['name' => $valid["name"], 'subject_id' => $valid["subject"]]);
        $quiz->questions()->attach($valid['selectedQuestion']);
        return redirect()->back()->with('success', 'created !');
    }


    public function addSubject($id)
    {

        if (!is_null($id) && $id != $this->selectedSubject) {
            $this->selectedSubject = $id;
            $this->questions = Subject::query()->where("id", $this->subject)->first()->questions;

            $this->selectedQuestion = [];
            $this->selectedQuestions = null;
            $this->render();
        } else {
            $this->questions = null;
        }

        //
    }

    public function addQuestion()
    {
        $this->counter = $this->counter + 1;
        $this->render();

    }

    public function setSelectedQuestion($item)
    {
        if (!is_null($item)) {
            array_push($this->selectedQuestion, $item);

            $this->selectedQuestions = QuizQuestions::query()->whereIn("id", $this->selectedQuestion)->get();

            $this->questions = $this->questions->whereNotIn("id", $this->selectedQuestion);
        }


    }

    public function removeMyQuestion($id)
    {
        if (!is_null($id)) {
            $this->selectedQuestion = array_filter($this->selectedQuestion, function ($element) use ($id) {
                return $element != $id;
            });

            $this->selectedQuestions = QuizQuestions::query()->whereIn("id", $this->selectedQuestion)->get();

            $this->questions = QuizQuestions::query()->whereNotIn("id", $this->selectedQuestion)->get();
        }
    }

    public function render()
    {
        $subjects = Subject::query()->get();
        return view('livewire.quiz.create', ['subjects' => $subjects]);
    }
}
