<?php
	$title = 'Edit Profile';
?>

@extends('layouts.master')

@section('pageHeading')
	<h1 class="page-header">
        Update Profile
    	<small>describe who you are</small>
    </h1>
@stop

@section('file')
	<form method="POST" action="/user/{{ Auth::id() }}/profile" enctype="multipart/form-data">
		{{ method_field('PATCH') }}
		{{ csrf_field() }}
		<div class="form-group">
			<label for="exampleInputName">Full Name</label>
			<input type="text" class="form-control" id="exampleInputName" value="{{ $userprofile->fullName}}" name="fullName">
		</div>

		<div class="form-group">
			<label for="photo">Upload Photo</label>
			<input type="file" name="image">
			<p>jpg,png (only) with file size less than 2 MB</p>
		</div>

		<div class="form-group">
			<label for="exampleInputProfession">Profession</label>
			<input type="text" class="form-control" id="exampleInputProfession" value="{{ $userprofile->profession}}" name="profession">
		</div>

		<div class="form-group">
			<label for="exampleInputCity">City</label>
			<input type="text" class="form-control" id="exampleInputCity" value="{{ $userprofile->city}}" name="city">
		</div>

		<div class="form-group">
			<label for="exampleInputCountry">Country</label>
			<input type="text" class="form-control" id="exampleInputCountry" value="{{ $userprofile->country}}" name="country">
		</div>

		<div class="form-group">
			<label for="exampleInputWebsite">Website</label>
			<input type="text" class="form-control" id="exampleInputWebsite" value="{{ $userprofile->website}}" name="website">
		</div>

		<div class="form-group">
			<label for="exampleInputbdate">Birth Date</label>
			<input type="date" class="form-control" id="exampleInputbdate" value="{{$userprofile->dob->format('Y-m-d')}}" name="dob">
		</div>

			<button type="submit" class="btn btn-default">Update Profile</button>
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

