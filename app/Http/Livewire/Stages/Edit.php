<?php

namespace App\Http\Livewire\Stages;

use App\Models\Stage;
use Livewire\Component;

class Edit extends Component
{
    public $name;
    public $data;
    public $stage;
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

        $stage = Stage::query()->where("id", $this->data)->first();
        $this->stage = $stage;

        $this->name = $stage->name;


    }

    public function deleteConfirm($msg)
    {
        if ($msg) {
            $subjects=$this->stage->subjects;
            foreach ($subjects as $item) {
                $item->teachers()->detach();
                $item->delete();
            }
            $this->stage->delete();
            return redirect()->to("stages")->with('success', 'Stage deleted successfully !');

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
        $this->validate();

        Stage::query()->where("id", $this->data)->update([
            "name" => $this->name
        ]);
        return redirect()->to('/stages')->with(['success' => 'Stage is updated !']);
    }

    public function render()
    {

        return view('livewire.stages.edit');
    }
}
