<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
//            'comments' => Comment::where
        ]);
    }

    public function content()
    {

        return view('dashboard.dashboard-content', [

            "posts" => Post::where('user_id', auth()->user()->id)->with('user','tags','category')->latest()->get(),
            "comments" => Comment::where('user_id', auth()->user()->id)->with('post')->latest()->get(),
        ]);
    }

}
