<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Album;

class AlbumController extends Controller
{
    public function index()
    {
    	$albums = Album::with('photos')->get();
      	return view('albums.index')->with('albums', $albums);
    }

    public function create()
    {
    	return view('albums.create');
    }
    public function store(Request $request)
    {
    	$this->validate($request, array(

    		'name'  => 'required|max:20',
    		'description' => 'required|max:200',
    		'cover_image' => 'image|max:1999'

    	));

    	//file name with extension
    	$filenameWithExtension =  $request->file('cover_image')->getClientOriginalName();
    	$fileName = pathinfo($filenameWithExtension, PATHINFO_FILENAME);//just the filename.
    	$extension = $request->file('cover_image')->getClientOriginalExtension();//get only the extension
    	$finalfile = $fileName.'-'.time().'.'.$extension;
    	$path = $request->file('cover_image')->storeAs('public/album_covers', $finalfile);


    	$album = new Album();
    	$album->name = $request->name;
    	$album->description = $request->description;
    	$album->cover_image = $finalfile;

    	$album->save();

    	return redirect()->route('index')->with('success', 'Album successfully created!');
    }

    public function show($id)
    {
    	$album = Album::with('photos')->find($id);
    	return view('albums.show')->with('album', $album);
    }
}
