<?php

namespace App\Livewire;

use Livewire\Component;

class Comment extends Component
{
    public $comment;
    public $post;
    public $indent_level;
    public $show_replyarea = false;

    /**
     * Create a new component instance.
     */

    public function mount($comment, $post, $indent)
    {
        $this->comment = $comment;
        $this->post = $post;
        $this->indent_level = $indent;
    }

    public function render()
    {
        return view('livewire.comment');
    }

    public function toggle_visibility()
    {
        if (auth()->check()) {
            $this->show_replyarea = !$this->show_replyarea;
        } else {
            return $this->redirect(route('login'));
        }
    }
}