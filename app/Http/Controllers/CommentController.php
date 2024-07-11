<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use App\Http\Requests\StoreCommentRequest;
use App\Http\Requests\UpdateCommentRequest;
use Debugbar;
use Illuminate\Support\Facades\Gate;

//use Barryvdh\Debugbar\Facade as Debugbar;

class CommentController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCommentRequest $request, Post $post)
    {

        $data = $request->validated();
        //IF REPLY
        if ($request->comment !== null)
        {
            $post->comments()->create([...$data, 'comment_id' => $request->comment, 'user_id' => $request->user()->id]);}
        else {
            $post->comments()->create([...$data, 'user_id' => $request->user()->id]);
        }
        return to_route('post.show', $post)->withFragment('comments');
    }

    /**
     * Display the specified resource.
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCommentRequest $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post, Comment $comment)
    {

//        $this->authorize('delete', $comment);
        Gate::authorize('delete', $comment);

        $comment->delete();

        return to_route('post.show', $post)->withFragment('comments');
    }
}
