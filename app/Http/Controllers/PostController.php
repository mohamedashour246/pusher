<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('posts.posts',compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store()
    {

    }

    public function show($id)
    {
        $post = Post::findOrFail($id);
        return view('posts.show',compact('post'));
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return view('posts.edit',compact('post'));
    }

    public function update(Request $request,$id)
    {
        $post = Post::findOrFail($id);

    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);

    }

}

