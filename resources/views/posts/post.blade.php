<?php
	$title =$post->title;
?>

@extends('layouts.master')

@section('pageHeading')
    <h1 class="page-header">
        Home
    <small>know about life at GIK</small>
    </h1>
@stop

@section('file')
	@include('layouts.partials.blogPost')
@stop