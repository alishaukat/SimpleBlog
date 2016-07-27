<?php
	$title = 'Create Post';
?>

@extends('layouts.master')

@section('file')
	@include('layouts.partials.savePost')
@stop

@section('pageHeading')
    <h1 class="page-header">
        Create Post
    <small>say what is on your mind</small>
    </h1>
@stop