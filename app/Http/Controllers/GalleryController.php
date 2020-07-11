<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Gallery;
use App\Painting;

class GalleryController extends Controller
{
    public function newGallery()
    {
        return view('new_gallery');
    }

    public function index()
    {
        $galleries = Gallery::where('user_id', Auth::id())->get();
        return view('galleries', ['galleries' => $galleries]);
    }

    public function show($id)
    {
        $gallery = Gallery::findOrFail($id);
        $upvotes = $gallery->galleryvotes->filter(function($item){
            return $item->vote_type == true;
        });

        $downvotes = $gallery->galleryvotes->filter(function($item){
            return $item->vote_type == false;
        });
        $paintings = $gallery->paintings;
        return view('gallery', ['gallery' => $gallery, 'paintings' => $paintings, 'upvotes' => $upvotes, 'downvotes' => $downvotes]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'image' => 'image',
        ]);

        $gallery = new Gallery();

        if($request->hasFile('image')){
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $filename = preg_replace('/\s+/', '', $filename);
            $fileNameToStore = $filename .'_'.time().'.'.$extension;
            $path = $request->file('image')->storeAs('public/gallery', $fileNameToStore);
            $gallery->image = $fileNameToStore;
        }

        $gallery->title = request('title');
        $gallery->description = request('description');
        $gallery->user_id = Auth::id();
        $gallery->save();

        return back()
            ->with('success','You have successfully created a gallery.');
    }
}
