<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Likecontroller extends Controller
{
    public function likeComment(User $user, Comment $comment)
    {
        if (!$user->hasLikedComment($comment)) {
            $user->likes()->attach($comment->id);
        }
    }

    public function unlikeComment(User $user, Comment $comment)
    {
        if($user->hasLikedComment($comment)) {
            $user->likes()->detach($comment->id);
        }
    }

    public function toggle_like(User $user, Comment $comment) {
        if ($user->hasLikedComment($comment)) {
            $this->unlikeComment($user, $comment);
//            $this->current_likes =- 1;
        }
        else {
            $this->likeComment($user, $comment);
//            $this->current_likes =+ 1;
        }
    }

}
