<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Counter extends Component
{
    public $counter=12;

    public function render()
    {
        return view('livewire.counter');
    }
}
