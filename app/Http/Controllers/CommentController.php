<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use App\Http\Requests\StoreCommentRequest;
use App\Http\Requests\UpdateCommentRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class CommentController extends Controller
//    implements HasMiddleware
{

    public static function middleware(): array
    {
        return [
            new Middleware(middleware: 'verified'),
        ];
    }

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
        return view('comments.comment-update', ['comment' => $comment]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCommentRequest $request, Comment $comment)
    {

        Gate::authorize('update', $comment);
        $validatedData = $request->validate([
            'content' => 'required'
        ]);

        // If edited in Comment Section
        $post = $comment->post()->first();
        $comment->update($validatedData);

        if(url()->previous() == route('post.show', $post)) {
            return to_route('post.show', $post)->withFragment('comments');
        }

        return redirect()->back()->with('success', 'Comment edited successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post, Comment $comment)
    {

//        $this->authorize('delete', $comment);
        Gate::authorize('delete', $comment);


        //Comment Destroy can either be called with or without $post.
        //If it's called without $post, this will throw an error (Dashboard) -> Need to get post of $comment instead
        if ($post->exists == false) {
            $post = $comment->post()->first();
        }

        $comment->delete();
        if(url()->previous() == route('post.show', $post)) {
            return to_route('post.show', $post)->withFragment('comments');
        }
//        dd('test');
        return redirect()->back()->with('success', 'Comment deleted successfully');
    }
}
