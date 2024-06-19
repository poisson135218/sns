<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Like;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index(Post $post)
    {
        return view('posts.index')->with(['posts' => $post->getPaginateByLimit()]);
    }
    public function show(Post $post)
    {
        return view('posts.show')->with(['post' => $post]);
    }
    
    public function create()
    {
        return view('posts.create');
    }
    
    public function store(Request $request, Post $post)
    {
    $input = $request['post'];
    $id = Auth::id();
    $input['user_id'] = $id;
    $post->fill($input)->save();
    return redirect('/posts/' . $post->id);
    }
    
    public function delete(Post $post)
    {
    $post->delete();
    return redirect('/');
    }
    
     public function __construct()
    {
    $this->middleware(['auth', 'verified'])->only(['like', 'unlike']);
    }
    
     public function like($id)
    {
    Like::create([
      'post_id' => $id,
      'user_id' => Auth::id(),
    ]);
    
    session()->flash('success', 'You Liked the Reply.');

    return redirect()->back();
    }
    
    public function unlike($id)
    {
    $like = Like::where('post_id', $id)->where('user_id', Auth::id())->first();
    $like->delete();

    session()->flash('success', 'You Unliked the Reply.');

    return redirect()->back();
    }
    
     public function is_liked_by_auth_user()
    {
    $id = Auth::id();

    $likers = array();
    foreach($this->likes as $like) {
      array_push($likers, $like->user_id);
    }

    if (in_array($id, $likers)) {
      return true;
    } else {
      return false;
    }
  }
    
}