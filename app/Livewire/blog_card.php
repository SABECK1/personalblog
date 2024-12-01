<?php

namespace App\Livewire;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class blog_card extends Component
{
    public $post;
    /**
     * Create a new component instance.
     */
    public function __construct($post)
    {
        $this->post = $post;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('livewire.blog_card');
    }
}
