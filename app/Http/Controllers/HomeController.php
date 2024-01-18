<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except('homepage');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function homepage()
    {
        $posts = Post::all();
        return view('home.homepage', ['posts' => $posts]);
    }

    public function post()
    {
        $posts = Post::all();
        return view('home.homepage', ['posts' => $posts]);
    }
}
