<?php

namespace App\Http\Livewire\Questions;

use App\Models\QuizQuestions;
use App\Models\Stage;
use Livewire\Component;

class Edit extends Component
{
    public $name;
    public $data;
    public $question;
    public $deletepopUp = false;


    protected $rules = [
        'name' => 'sometimes|min:4',
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


    public function mount()
    {

        $question = QuizQuestions::query()->where("id", $this->data)->first();
        $this->question = $question;

        $this->name = $question->name;


    }

    public function deleteConfirm($msg)
    {
        if ($msg) {
            $options=$this->question->options;
            foreach ($options as $item) {
                $item->delete();
            }
            $this->question->delete();
            return redirect()->to("questions")->with('success', 'Question deleted successfully !');

        }
        $this->deletepopUp = false;
        $this->render();

    }

    public function delete()
    {

        $this->deletepopUp = true;
        $this->render();
    }

    public function submit()
    {
        dd($this);
        $this->validate();

        QuizQuestions::query()->where("id", $this->data)->update([
            "name" => $this->name
        ]);
        return redirect()->to('/stages')->with(['success' => 'Stage is updated !']);
    }

    public function render()
    {

        return view('livewire.questions.edit');
    }
}
