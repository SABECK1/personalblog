<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Comment extends Component
{
    public $comment;
    public $post;
    public $indent_level;
    public $show_replyarea = false;
    public $current_likes;

    /**
     * Create a new component instance.
     */

    public function mount($comment, $post, $indent)
    {
        $this->comment = $comment;
        $this->post = $post;
        $this->indent_level = $indent;
        $this->current_likes = $comment->likes()->count();

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

    public function add_like()
    {
//        return $this->redirect(route('login'));
        // If not logged in
        if (!auth()->check()) {
            return $this->redirect(route('login'));
        }

        // If not verified
        $user = User::whereId(Auth::id())->first();
        if(!$user->hasVerifiedEmail()){
            return $this->redirect(route('login'));
        };
        if ($user->hasLikedComment($this->comment)) {
            $user->unlikeComment($this->comment);
//            $this->current_likes =- 1;
        }
        else {
            $user->likeComment($this->comment);
//            $this->current_likes =+ 1;
        }
        $this->current_likes = $this->comment->likes->count();
    }
}
