<form method="POST" action="/user/{{Auth::user()->id}}/post">
	{{ csrf_field() }}
	<div class="form-group">
		<label for="exampleInputEmail1">Post Title</label>
		<input type="text" class="form-control" id="exampleInputEmail1" placeholder="Title" name="title">
	</div>
	<div class="form-group">
		<label for="exampleInputBody">Post Description</label>
		<textarea class="form-control" rows="3" id="exampleInputBody" placeholder="Enter text here" name="body"></textarea>
	</div>
		<button type="submit" class="btn btn-default">Create Post</button>
</form>