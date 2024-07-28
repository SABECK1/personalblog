<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TabsController extends Controller
{
    public function index(Request $request)
    {
        $tab = $request->input('tab', 'home');

        return view('tabs.index', compact('tab'));
    }

    public function account()
    {
        $data = ['title' => 'Home', 'content' => 'Welcome to our home page!'];

        return view('dashboard.dashboard-account', compact('data'));
    }

    public function profile()
    {

        return view('dashboard.dashboard-profile', [
            'user' => Auth::user(),
            'likes' => DB::table('likes')
            ->select(DB::raw('COUNT(*) as like_count'))
            ->join('comments', 'comments.id', '=', 'likes.comment_id')
            ->where('comments.user_id', '=', Auth::user()->id)->first()->like_count,
            'comments' => DB::table('comments')
            ->select(DB::raw('COUNT(*) as comment_count'))
            ->where('user_id', Auth::user()->id)
            ->first()->comment_count
        ]);
    }

    public function content()
    {

        return view('dashboard.dashboard-content', [
            "user" => User::whereId(Auth::user()->id)->with('likes')->first(),
            "posts" => Post::where('user_id', auth()->user()->id)->with('user','tags','category')->latest()->get(),
            "comments" => Comment::where('user_id', auth()->user()->id)->with('post')->latest()->get()
        ]);
    }

}
