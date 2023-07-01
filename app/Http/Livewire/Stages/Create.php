<?php

namespace App\Http\Livewire\Stages;

use App\Models\Stage;
use Illuminate\Support\Str;
use Livewire\Component;

class Create extends Component
{
    public  $name;

    protected $rules = [
        'name' => 'required|string|min:4',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function submit()
    {
       $valid= $this->validate();

        Stage::create([
            'name' =>$valid["name"],
        ]);
        return redirect()->to('/stages')->with(['success'=>'Stage is created !']);
    }
    public function render()
    {
        return view('livewire.stages.create');
    }
}
