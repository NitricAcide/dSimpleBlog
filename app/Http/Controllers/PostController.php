<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function create()
    {
        return view('postcreate');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
        ]);

        $post = new Post;
        $post->title = $request->title;
        $post->content = $request->content;
        $post->user_id = Auth::id();
        $post->datetime_created = now();
        $post->save();

        return redirect()->route('account');
    }

    public function index()
    {
        $posts = Post::where('user_id', '!=', Auth::id())->paginate(10);
        return view('post', ['posts' => $posts]);
    }

    public function show($id)
    {
        $post = Post::find($id);

        if ($post === null) {
            abort(404);
        }
    
        return view('show', ['post' => $post]);
    }

    public function edit(Post $post)
    {
        return view('postedit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
        ]);

        $post->title = $validatedData['title'];
        $post->content = $validatedData['content'];
        $post->save();

        return redirect()->route('account');
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('account');
    }

}
