<?php
	$title = 'test page';
?>

@extends('layouts.master')

@section('file')
       <div class="media">
       	 <h2>
            test heading
        </h2>
        <p class="lead">
            by <a href="index.php">test
            </a>
        </p>
        <p><span class="glyphicon glyphicon-time"></span> Posted on date</p>
        <hr>
        <p>this is the body of the test post</p>
        <div class="row">
            <div class="col-lg-12">
                <a class="btn btn-primary" href="">Add Comment <span class="glyphicon"></span></a>
                <a class="btn btn-primary" href="">Edit <span class="glyphicon glyphicon-pencil"></span></a>

            </div> 


        </div>

			 <div class="media-left">
			    <a href="#">
			      <img class="media-object" src="..." alt="...">
			    </a>
			  </div>
			  <div class="media-body">
			    <h4 class="media-heading">Media heading</h4>
			    
			    <p> this is a comment</p>
			    <div class="media">
			    	<div class="media-left">
			    <a href="#">
			      <img class="media-object" src="..." alt="...">
			    </a>
			  </div>
			  <div class="media-body">
			    <h4 class="media-heading">Media heading</h4>
			    
			    <p> this is a comment</p>
			  </div>
			    </div>
			  </div>
       </div>
        <hr>
@stop