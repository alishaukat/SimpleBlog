<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Post;
use App\User;
use Auth;

class PostsController extends Controller
{
	public function __construct()
	    {
	        $this->middleware('auth');
	    }

	public function create(){
		return view('posts.createPost');
	}

	public function store(Request $request){
		$post = new Post;
		$post->title = $request->title;
		$post->body = $request->body;
		$post->user_id = Auth::id();

		$post->save();
			return redirect('/home');
	}

	public function edit(Post $post){
		return view('posts.editPost',compact('post'));
	}

	public function update(Request $request, Post $post){
		$post->update($request->all());
		return redirect('/home');
	}

	public function destroy(Post $post){
		$post->delete();
		return redirect('/home');
	}
}
