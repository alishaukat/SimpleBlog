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

Route::group(['middleware' => 'web'], function() {
    
    Route::get('/', 'IndexController@index');

	Route::auth();

	Route::get('/home', 'HomeController@index');

	Route::get('/post/create','PostsController@create');

	Route::post('/user/{user}/post','PostsController@store');

	Route::get('/post/{post}/edit','PostsController@edit');

	Route::patch('/post/{postid}','PostsController@update')->middleware('post.owner');

	Route::delete('/post/{postid}','PostsController@destroy')->middleware('post.owner');

});

// Route::any('/test', function() {
//     return view('');
// });