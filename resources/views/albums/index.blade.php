@extends('layouts.master')

@section('title')
	Photo Gallery
@endsection

@section('content')

	@if(count($albums) > 0)
	<?php 
		$totalcount = count($albums);
		$i = 1;
	 ?>
	 <div id="albums">
	 	<div class="row text-center">
	 		@foreach($albums as $album)

	 			@if($i == $totalcount)

	 				<div class="col-md-4">
	 					<a href="{{route('album_show', $album->id)}}">
	 						<img style="height: 250px; width: 350px;" class="thumbnail" src="storage/album_covers/{{$album->cover_image}}" alt="{{ $album->name }}">
	 					</a>
	 					<h4>{{ $album->name }}</h4>
	 					@else
	 					<div class="col-md-4">
	 					<a href="{{route('album_show', $album->id)}}">
	 						<img style="height: 250px; width: 350px;" class="thumbnail" src="storage/album_covers/{{$album->cover_image}}" alt="{{$album->name }}">
	 					</a>
	 					<h4>{{ $album->name }}</h4>
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
	  <p>No Albums to Display</p>
	  @endif


@endsection