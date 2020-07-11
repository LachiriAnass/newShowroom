<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Painting;
use App\PaintingVote;

class PaintingController extends Controller
{

    public function show($id)
    {
        $painting = Painting::findOrFail($id);
        //$painting['gallery'] = $painting->gallery;

        $upvotes = $painting->paintingvotes->filter(function($item){
            return $item->vote_type == true;
        });

        $downvotes = $painting->paintingvotes->filter(function($item){
            return $item->vote_type == false;
        });

        return view('painting', ['painting' => $painting, 'upvotes' => $upvotes, 'downvotes' => $downvotes]);
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'image' => 'image',
            'gallery_id' => 'required'
        ]);

        $painting = new Painting();

        if($request->hasFile('image')){
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $filename = preg_replace('/\s+/', '', $filename);
            $fileNameToStore = $filename .'_'.time().'.'.$extension;
            $path = $request->file('image')->storeAs('public/painting', $fileNameToStore);
            $painting->image = $fileNameToStore;
        }

        $painting->title = request('title');
        $painting->description = request('description');
        $painting->gallery_id = request('gallery_id');
        $painting->save();

        return back()
            ->with('success','You have successfully created a gallery.');
    }

    public function destroy($id)
    {

        $painting = Painting::findOrFail($id);
        $red = "gallery/$painting->gallery_id";
        PaintingVote::where('painting_id', '=', $id)->delete();
        $painting->delete();

        return redirect($red);
    }
}
