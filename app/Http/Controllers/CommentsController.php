<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Post;
use App\User;
use App\Comment;
use Auth;

class CommentsController extends Controller
{

	public function __construct(){
	        $this->middleware('auth');
	}

    public function store(Request $request,$post){
			
		$this->validate($request,[
		'body' => 'required'
		]);

		$comment = new Comment;
		$comment->body = $request->body;
		$comment->post_id = $post;
		Auth::user()->comments()->save($comment);
		return back();
    }

    public function edit($post, Comment $comment){
    	return view('comments.editComment', compact('comment'));
    }

    public function update(Request $request, $post, Comment $comment){
    	$this->validate($request,[
			'body' => 'required'
		]);
		$comment->update($request->all());
		return redirect('/home');
    }

    public function destroy($post,Comment $comment){
		$comment->delete();
		return back();
	}
}
