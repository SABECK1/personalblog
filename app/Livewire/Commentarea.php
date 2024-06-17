<?php

namespace App\Livewire;

use Livewire\Component;

class Commentarea extends Component
{
    public $comment;
    public $post;
    public $placeholder;
    public $indent_level;

    public function mount($post, $comment, $indent)
    {
        $this->post = $post;
        $this->indent_level = $indent;

        if ($comment !== null) {
            $this->placeholder = 'Reply to: '.$comment->user->name;
            $this->comment = $comment;
        }
        else {
            $this->placeholder = 'Your Comment';
        }
    }

    public function render()
    {
        return view('livewire.commentarea');
    }

}
