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

Route::get('/post/{post}/asguest','IndexController@showPost');

Route::auth();

Route::get('/home', 'HomeController@index');

Route::get('/post/{post}','PostsController@showPost' );

Route::get('/newpost/create', 'PostsController@create');

Route::post('/user/{user}/post', 'PostsController@store');

Route::get('/post/{post}/edit', 'PostsController@edit');

Route::patch('/post/{post}', 'PostsController@update')->middleware('post.owner');

Route::delete('/post/{post}', 'PostsController@destroy')->middleware('post.owner');

Route::post('/post/{post}/comment/create', 'CommentsController@store');

Route::get('/post/{post}/comment/{comment}', 'CommentsController@edit');

Route::patch('/post/{post}/comment/{comment}', 'CommentsController@update')->middleware('comment.owner');

Route::delete('/post/{post}/comment/{comment}', 'CommentsController@destroy')->middleware('comment.owner');

Route::get('/user/{user}/profile','UsersController@show');

Route::get('/user/{user}/profile/asguest','IndexController@showProfile');

Route::get('/user/{user}/profile/edit','UsersController@edit');

Route::patch('/user/{user}/profile','UsersController@update');
