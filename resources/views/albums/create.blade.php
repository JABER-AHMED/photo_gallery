@extends('layouts.master')

@section('title')
	Photo Gallery
@endsection

@section('content')
	
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<h1>Create Albums</h1>
		</div>
	</div>
	
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			<form action="{{route('store')}}" method="POST" enctype="multipart/form-data">
				<div class="form-group">
					<label for="name"></label>
					<input type="text" name="name" class="form-control">
				</div>
				<div class="form-group">
					<label for="description"></label>
					<textarea rows="5" type="text" name="description" class="form-control"></textarea>
				</div>
				<div class="form-group">
					<label for="file"></label>
					<input type="file" name="cover_image" class="form-control">
				</div>
				<button type="submit" class="btn btn-primary">Submit</button>
				{{ csrf_field() }}
			</form>
		</div>
	</div>

@endsection