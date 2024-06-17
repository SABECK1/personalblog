<?php

namespace App\Livewire;

use Livewire\Component;

class Tagstable extends Component
{
    public $tags;

    public function render()
    {
        return view('livewire.tagstable');
    }
}
