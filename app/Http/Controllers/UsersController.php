<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Userprofile;
use Auth;
use App\User;
use Carbon;
use Illuminate\Support\Facades\Input;
use App\file;

class UsersController extends Controller
{
    public function __construct(){
	        $this->middleware('auth');
	}

    public function show(User $user){
    	return view('userprofile.userprofile',compact('user'));
    }

    public function edit(){
    	$userprofile = Userprofile::where('user_id', '=', Auth::id())->first();
    	return view('userprofile.editProfile',compact('userprofile'));
    }

    public function update(Request $request){

    	$this->validate($request,[
    		'fullName'		=> 'required',
    		'profession'	=> 'required',
    		'city' 			=> 'required',
    		'country' 		=> 'required',
            'website'       => 'required',
            'dob'           => 'date',
            'image'         => 'image|mimes:jpg,jpeg,png,JPG,JPEG'

    	]);


    	$userprofile = Userprofile::where('user_id', '=', Auth::id())->first();
    	$userprofile->fullName 		= $request->fullName;
    	$userprofile->profession 	= $request->profession;
    	$userprofile->city 			= $request->city;
    	$userprofile->country 		= $request->country;
    	$userprofile->website		= $request->website;
    	$userprofile->dob 			= $request->dob;

        if(Input::hasFile('image')){
            $file = Input::file('image');

            $userprofile->imageName = Auth::user()->name. '-'. $userprofile->user_id. '.'. $file->getClientOriginalExtension();
            $file->move(public_path(). '/uploads/images/',$userprofile->imageName);
        }

    	$userprofile->save();
    	

    	return redirect('/user/'.$userprofile->user_id.'/profile');
    }
}
