<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function account()
    {
        $posts = auth()->user()->posts;
        if ($posts === null) {
            $posts = [];
        }
        return view('account', compact('posts'));
    }

    public function post()
    {
        $posts = Post::where('user_id', Auth::id())->get();
        return view('account', ['posts' => $posts]);
    }
}