<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;
use App\Post;
use App\User;

class IndexController extends Controller
{
    public function index(){
    	if(Auth::guest()){
    		$posts = Post::orderBy('updated_at','desc')->get();
    		$posts->load('user');
    		return view('welcome',compact('posts'));
    	}
    	else{
    		return redirect('/home');
    	}
    }

    public function showPost(Post $post){
    	return view('posts.post',compact('post'));
    }

    public function showProfile(User $user){
        return view('userprofile.userprofile',compact('user'));
    }
}
