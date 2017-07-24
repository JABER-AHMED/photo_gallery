<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Photo;

class PhotosController extends Controller
{
    public function create($album_id)
    {
    	return view('photos.create')->with('album_id', $album_id);
    }

    public function store(Request $request)
    {
    	$this->validate($request, array(

    		'title'  => 'required|max:20',
    		'description' => 'required|max:200',
    		'photo' => 'image|max:1999'

    	));

    	//file name with extension
    	$filenameWithExtension =  $request->file('photo')->getClientOriginalName();
    	$fileName = pathinfo($filenameWithExtension, PATHINFO_FILENAME);//just the filename.
    	$extension = $request->file('photo')->getClientOriginalExtension();//get only the extension
    	$finalfile = $fileName.'-'.time().'.'.$extension;
    	$path = $request->file('photo')->storeAs('public/photos'.$request->album_id, $finalfile);


    	$photo = new Photo();

    	$photo->album_id = $request->album_id;
    	$photo->title = $request->title;
    	$photo->description = $request->description;
    	$photo->size = $request->file('photo')->getClientSize();
    	$photo->photo = $finalfile;

    	$photo->save();

    	return redirect()->route('album_show',$request->album_id)->with('success', 'photo successfully uploaded!');
    }

    public function show($id)
    {
    	$photo = Photo::find($id);
    	return view('photos.show')->with('photo', $photo);
    }

    public function destroy($id)
    {
    	$photo = Photo::find($id);

    	if (Storage::delete('public/photos/'.$photo->album_id.'/'.$photo->photo)) {
    		$photo->delete();

    		return redirect('/')->with('success', 'photo deleted');
    	}
    }
}
