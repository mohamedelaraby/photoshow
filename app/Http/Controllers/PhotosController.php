<?php

namespace App\Http\Controllers;

use App\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PhotosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new photo for specific album.
     *
     * @return $album_id;
     */
    public function create($album_id)
    {
        return view('photos.create')->with('album_id',$album_id);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // Validate form
        $this->validate($request,[
            'title' => 'required|max:65',
            'description' => 'required|max:120',
            'photo' => 'image|max:1999'
        ]);



        // Get the file name with extension
        $filenameWithExt =  $request->file('photo')->getClientOriginalName();

        // Get the file name
        $fileName = pathinfo($filenameWithExt,PATHINFO_FILENAME);

        // Get the file extension
        $extension = $request->file('photo')->getClientOriginalExtension();

        // Create new filename
        $filenameToStore = $fileName . '_' . time() . '.' . $extension;

        // Upload cover image
        $path = $request->file('photo')->storeAs('public/photos/' . $request->input('album_id') ,$filenameToStore);

        // Upload photo
        $photo = new Photo;
        //store in db
        $photo->album_id = $request->input('album_id');
         $photo->title = strip_tags(preg_replace('/\s+/', ' ',  $request->input('title')));
         $photo->description = strip_tags(preg_replace('/\s+/', ' ',  $request->input('description')));
         $photo->size = $request->file('photo')->getSize();
         $photo->photo = strip_tags($filenameToStore);

         $photo->save();

        // Redirect to albums page

        return redirect('/albums/'.$request->input('album_id'))->with('success','Photo Uploaded');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Find phoo id
        $photo = Photo::find($id);
        return view('photos.show')->with('photo',$photo);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Get the photo
        $photo = Photo::find($id);

        //check for photo exists
        if (Storage::delete('/public/photos/' . $photo->album_id . '/' .$photo->photo)){
            $photo->delete();

            return redirect('/albums/'. $photo->album_id )->with('success','Photo deleted');
        }
        // Redirect to the album

    }
}
