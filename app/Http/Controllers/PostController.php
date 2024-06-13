<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index(Post $post)
    {
        return view('posts.index')->with(['posts' => $post->getPaginateByLimit()]);
    }
    public function show(Post $post)
    {
        return view('posts.show')->with(['posts' => $post]);
    }
    
    public function create()
    {
        return view('posts.create');
    }
    
    public function store(Request $request, Post $post)
    {
    $input = $request['post'];
    $post->fill($input)->save();
    return redirect('/posts/' . $post->id);
    }
    
    public function delete(Post $post)
    {
    $post->delete();
    return redirect('/');
        
    }
}