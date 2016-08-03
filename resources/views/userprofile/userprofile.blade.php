<?php 
	$title = 'user';
?>

@extends('layouts.master')

@section('pageHeading')
    <h1 class="page-header">
        {{ $user->userprofile->fullName }}
    <small>{{ $user->userprofile->profession }}</small>
    </h1>
@stop

@section('headStuff')
	<link rel="stylesheet" type="text/css" href="/css/styleUserProfile.css">
@stop

@section('file')

<div class="well well-sm">
    <div class="row">
        <div class="col-sm-6 col-md-4">
            <img src="/uploads/images/{{$user->userprofile->imageName}}" alt="{{ $user->userprofile->fullName }}'s Photo" class="img-rounded img-responsive" height="500px" width="380px" />
        </div>
        <div class="col-sm-6 col-md-8">
            <h4>
               {{ $user->userprofile->fullName }}</h4>
            <small><cite title="San Francisco, USA">{{ $user->userprofile->city }}, {{ $user->userprofile->country }} <i class="glyphicon glyphicon-map-marker">
            </i></cite></small>
            <p>
                <i class="glyphicon glyphicon-envelope"></i>{{ $user->email }}
                <br />
                <i class="glyphicon glyphicon-globe"></i><a href="http://www.jquery2dotnet.com">{{ $user->userprofile->website }}</a>
                <br />
                <i class="glyphicon glyphicon-gift"></i>{{ $user->userprofile->dob->format('F j,Y') }}</p>
            <!-- Split button -->
            
        </div>
    </div>
</div>
@if(!Auth::guest())
    @if(Auth::user()->name == $user->name)
        <div class="row">
            <div class="col-md-12">
                <a href="/user/{{$user->id}}/profile/edit" class="btn btn-primary">Edit Profile</a>
            </div>
        </div>
    @endif
@endif

@stop