@extends('layouts.master')

@section('title')
	Upload Photo
@endsection

@section('content')

		<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<h1>Upload Photos</h1>
		</div>
	</div>
	
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<form action="{{route('photo.store')}}" method="POST" enctype="multipart/form-data">
				<div class="form-group">
					<label for="title"></label>
					<input type="text" name="title" class="form-control">
				</div>
				<div class="form-group">
					<label for="description"></label>
					<textarea rows="5" type="text" name="description" class="form-control"></textarea>
				</div>
				<div class="form-group">
					<input type="hidden" name="album_id" class="form-control" value="{{ $album_id }}">
				</div>
				<div class="form-group">
					<label for="file"></label>
					<input type="file" name="photo" class="form-control">
				</div>
				<button type="submit" class="btn btn-primary">Submit</button>
				{{ csrf_field() }}
			</form>
		</div>
	</div>

@endsection