<?php

namespace App\Http\Livewire\Quiz;

use App\Models\Quiz;
use App\Models\QuizQuestions;
use Livewire\Component;

class Edit extends Component
{
    public $subject;
    public $selectedSubject;

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


    public function mount()
    {

        $quiz = Quiz::query()->where("id", $this->data)->first();
        $this->quiz = $quiz;
        $this->name = $quiz->name;
        foreach ($quiz->questions as $item) {
            array_push($this->selectedQuestion, $item);
            array_push($this->selectedQuestions, $item);
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
        return view('livewire.quiz.edit');
    }
}
