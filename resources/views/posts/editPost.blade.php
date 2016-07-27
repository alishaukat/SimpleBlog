<?php
	$title = 'Edit Post';
?>

@extends('layouts.master')

@section('pageHeading')
    <h1 class="page-header">
        Update Post
    <small>say what is on your mind</small>
    </h1>
@stop

@section('file')
	<form method="POST" action="/post/{{$post->id}}">
	{{ method_field('PATCH') }}
	{{ csrf_field() }}
	<div class="form-group">
		<label for="exampleInputEmail1">Post Title</label>
		<input type="text" class="form-control" id="exampleInputEmail1" placeholder="Title" name="title" value="{{$post->title}}">
	</div>
	<div class="form-group">
		<label for="exampleInputBody">Post Description</label>
		<textarea class="form-control" rows="3" id="exampleInputBody" placeholder="Enter text here" name="body">{{$post->body}}</textarea>
	</div>
		<button type="submit" class="btn btn-default">Update Post</button>
</form>

	@if(count($errors))
		<div class="col-md-12 alert alert-danger">
		<strong>Attention !</strong><br />
			<ul>
				@foreach($errors->all() as $error)
						<li>{{ $error }}</li>.
				@endforeach
			</ul>
		</div> 

		
	@endif

@stop

