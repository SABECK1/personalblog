<?php

namespace App\Livewire;

use Livewire\Component;

class Project extends Component
{
    public $project;
    public function __construct($project)
    {
        $this->project = $project;
    }

    public function render()
    {
        return view('livewire.project');
    }
}
