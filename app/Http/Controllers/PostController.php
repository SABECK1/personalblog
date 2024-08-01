<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.post-create', [
            'categories' => Category::all(),
            'tags' => Tag::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'postTitle' => ['required', 'string'],
            'postSubTitle' => ['required', 'string'],
            'postImage' => ['required', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
            'postCategory' => ['required'],
            'editor' => ['required']
        ]);

        if ($validator->fails()){
            return redirect(route('dashboard', ['tab' => 'content']))->withErrors($validator)->withInput();
//            return redirect()->back()->withErrors($validator);
        }


        $statement = DB::select("SHOW TABLE STATUS LIKE 'posts'");
        $nextId = $statement[0]->Auto_increment;

        $imageName = $nextId.'Image.'.$request->postImage->extension();
        $request->postImage->move(public_path('images/posts'), $imageName);
        $post = new Post();
        $post->title = $request->input('postTitle');
        $post->category_id = $request->input('postCategory');
        $post->content = $request->input('editor');
        $post->image_path = 'images/posts/'.$imageName;
        $post->user_id = Auth::user()->id;
        $post->subtitle = $request->input('postSubTitle');
        $post->save();

        return redirect(route('dashboard', ['tab' => 'content']))->with('success', 'Post created');

//        return
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('posts.post-show', [
            'post' => $post,
            'categories' => $post->categories,
            'comments' => $post->comments()->whereNull('comment_id')->latest()->with('replies')->paginate(10),
            'comment_count' => $post->comments()->count(),
            'tags' => $post->tags,
            'roles' => $post->comments()->with('user.role')->get()
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = Post::whereId($id)->with('tags', 'category')->first();
        return view('posts.post-update', [
            'all_categories' => Category::all(),
            'all_tags' => Tag::all(),
            'post' => $post,
            'body' => $post->content,
            'title' => $post->title,
            'subtitle' => $post->subtitle,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $validator = Validator::make($request->all(), [
            'subtitle' => 'required',
            'title' => 'required',
            'content' => 'required',
            'category_id' => 'required',
            'tags' => 'required',
        ]);


        if ($validator->fails()){
            return redirect(route('dashboard', ['tab' => 'content']))->withErrors($validator)->withInput();
//            return redirect()->back()->withErrors($validator);
        }


        //If it has an image, overwrite the last one
        if ($request->hasFile('postImage')) {
            $imageName = $id.'Image.'.$request->postImage->extension();
            $request->postImage->move(public_path('images/posts'), $imageName);
            $validatedData['image_path'] = 'images/posts/'.$imageName;
        }


        // Find the post by ID
        $post = Post::find($id);

        // Check if the post exists
        if (!$post) {
            return redirect()->back()->withErrors(['post_not_found' => 'Post not found.']);
        }


//         Update the post with the validated data

        $post->update($validator->validated());
        $post->tags()->attach($request->input('tags'));
        // Redirect with a success message
        return redirect(route('dashboard', ['tab' => 'content']))->with('success', 'Post updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::find($id);
        Gate::authorize('delete', $post);

        $post->delete();
        return redirect(route('dashboard', ['tab' => 'content']))->with('success', 'Post deleted');
    }
}
