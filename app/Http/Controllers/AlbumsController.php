<?php

namespace App\Http\Controllers;

use App\Album;
use Illuminate\Http\Request;

class AlbumsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get a;bums photos
        $albums = Album::with('Photos')->get();
        return view('albums.index')->with('albums', $albums);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('albums.create');
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
            'name' => 'required|max:65',
            'description' => 'required|max:120',
            'cover_image' => 'image|max:1999'
        ]);



        // Get the file name with extension
        $filenameWithExt =  $request->file('cover_image')->getClientOriginalName();

        // Get the file name
        $fileName = pathinfo($filenameWithExt,PATHINFO_FILENAME);

        // Get the file extension
        $extension = $request->file('cover_image')->getClientOriginalExtension();

        // Create new filename
        $filenameToStore = $fileName . '_' . time() . '.' . $extension;

        // Upload cover image
       $path = $request->file('cover_image')->storeAs('public/album_covers',$filenameToStore);

        // Create new album
        $album = new Album;
        //store in db
        $album->name = strip_tags(preg_replace('/\s+/', ' ',  $request->input('name')));
        $album->description = strip_tags(preg_replace('/\s+/', ' ',  $request->input('description')));
        $album->cover_image = strip_tags($filenameToStore);
        $album->save();

        // Redirect to albums page
        return redirect('/')->with('success', 'Album Created');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }
}
