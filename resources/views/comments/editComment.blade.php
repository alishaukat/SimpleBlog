<?php 
	$title = 'Edit Comment';
?>

@extends('layouts.master')

@section('pageHeading')
    <h1 class="page-header">
        Edit Comment
    <small>say what is on your mind</small>
    </h1>
@stop

@section('file')

	<form method="POST" action="/post/{{ $comment->post_id }}/comment/{{ $comment->id }}">
		{{ method_field('PATCH') }}
		{{ csrf_field() }}

		<div class="form-group">
			<label for="exampleInputBody">Comment Description</label>
			<textarea class="form-control" rows="3" id="exampleInputBody" placeholder="Enter text here" name="body">{{ $comment->body }}</textarea>
		</div>
			<button type="submit" class="btn btn-default">Update Comment</button>
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