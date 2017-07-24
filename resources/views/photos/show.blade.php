@extends('layouts.master')

@section('content')

	<h1>{{$photo->title}}</h1>
	<p>{{ $photo->description }}</p>
	<a href="{{route('album_show', $photo->album_id)}}">Back To Gallery</a>
	<br><br>
	<img src="/storage/photos/{{$photo->album_id}}/{{$photo->photo}}" alt="{{ $photo->photo}}">

	<form action="{{ route('photo.delete', $photo->id )}}" method="post">
		<input type="hidden" name="_method" value="DELETE">
		<button type="submit" class="bnt btn-danger">Delete Photo</button>
		{{ csrf_field()}}
	</form>

	<hr>
	<small>Size: {{ $photo->size }}</small>

@endsection