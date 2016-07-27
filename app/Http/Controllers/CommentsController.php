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
}
