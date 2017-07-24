@extends('layouts.master')

@section('title')
	Show Album
@endsection

@section('content')

	<h1>{{ $album->name }}</h1>
	<a class="btn btn-primary" href="">Go Back</a>
	<a class="btn btn-primary" href="{{route('photos', $album->id)}}">Upload Photo To Album</a>
	<hr>
	
	@if(count($album->photos) > 0)
	<?php 
		$totalcount = count($album->photos);
		$i = 1;
	 ?>
	 <div id="photos">
	 	<div class="row text-center">
	 		@foreach($album->photos as $photo)

	 			@if($i == $totalcount)

	 				<div class="col-md-4">
	 					<a href="{{route('photo_show', $photo->id)}}">
	 						<img style="height: 250px; width: 350px;" class="thumbnail" src="/storage/photos/{{$photo->album_id}}/{{$photo->photo}}" alt="{{ $photo->title }}">
	 					</a>
	 					<h4>{{ $photo->title }}</h4>
	 					@else
	 					<div class="col-md-4">
	 					<a href="{{route('photo_show', $photo->id)}}">
	 						<img style="height: 250px; width: 350px;" class="thumbnail" src="/storage/photos/{{$photo->album_id}}/{{$photo->photo}}" alt="{{ $photo->title }}">
	 					</a>
	 					<h4>{{ $photo->title }}</h4>
	 					@endif
	 					@if($i % 3 == 0)
	 				</div>
	 	</div>
	 	<div class="row text-center">
	 @else
	 </div>
	 @endif
	  <?php $i++; ?>
	  @endforeach
	  </div>
	  </div>
	  @else
	  <p>No Photos to Display</p>
	  @endif

@endsection