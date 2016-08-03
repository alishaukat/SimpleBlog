<?php
	$title = 'Welcome to GIK';
?>
@extends('layouts.master')

@section('pageHeading')
	<h1 class="page-header">
        Welcome to GIK Blog
    	<small>You are visiting as guest</small>
    </h1>
@stop

@section('file')
    @include('layouts.partials.indexPosts')
@stop