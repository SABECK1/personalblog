<?php

namespace App\Livewire;

use Livewire\Component;

class Categorytable extends Component
{
    public $categories;
    public function render()
    {
        return view('livewire.categorytable');
    }
}
