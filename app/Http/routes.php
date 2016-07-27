<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
    
Route::get('/', 'IndexController@index');

Route::auth();

Route::get('/home', 'HomeController@index');

Route::get('/post/create','PostsController@create');

Route::post('/user/{user}/post','PostsController@store');

Route::get('/post/{post}/edit','PostsController@edit');

Route::patch('/post/{post}','PostsController@update')->middleware('post.owner');

Route::delete('/post/{post}','PostsController@destroy')->middleware('post.owner');

Route::post('/post/{post}/comment/create','CommentsController@store');

Route::get('/post/{post}/comment/{comment}','CommentsController@edit');

Route::patch('/post/{post}/comment/{comment}','CommentsController@update')->middleware('comment.owner');

Route::delete('/post/{post}/comment/{comment}','CommentsController@destroy')->middleware('comment.owner');

Route::get('/test', function(){
	return view('test');
});