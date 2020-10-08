<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Painting;
use App\User;

class PaintingController extends Controller
{
    public function newPainting()
    {
        return view('new_painting');
    }

    public function index()
    {
        $paintings = Painting::where('user_id', Auth::id())->get();
        return view('paintings', ['paintings' => $paintings]);
    }

    public function show($id)
    {
        $painting = Painting::findOrFail($id);
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
            'for_sale' => 'required'
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
        if(request('for_sale')=='true'){
            $painting->for_sale = true;
            $painting->price = request('price');
        }else{
            $painting->for_sale = false;
        }
        $painting->votes_average = 0;
        $painting->save();

        return back()
            ->with('success','You have successfully uploaded a painting.');
    }

    public function destroy($id)
    {

        $painting = Painting::findOrFail($id);
        PaintingVote::where('painting_id', '=', $id)->delete();
        $painting->delete();

        return redirect($red);
    }

    public function modify($id)
    {
        $painting = Painting::findOrFail($id);

        if($paintinguser->id == Auth::user()->id){
            $painting->for_sale = false;
            $painting->save();
        }

        return back();
    }


    //  APIS FUNCTIONS


    public function api_show($id)
    {
        $painting = Painting::findOrFail($id);

        return response()->json(['status' => 'good', 'painting' => $painting]);
    }

    public function api_store($id, Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'image' => 'image',
            'for_sale' => 'required',
            'login_token' => 'required'
        ]);

        $user = User::findOrFail($id);

        if($user->login_token != request('login_token')){
            return response()->json(['status' => 'bad', 'error' => 'User not verified. Bad Token.']);
        }


        $painting = new Painting();

        if($request->hasFile('image')){
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $filename = preg_replace('/\s+/', '', $filename);
            $fileNameToStore = $filename .'_'.time().'.'.$extension;
            $path = $request->file('image')->storeAs('public/painting', $fileNameToStore);
            $painting->image = $fileNameToStore;
        }else{
            return response()->json(['status' => 'bad', 'error' => 'No image detected']);
        }

        $painting->title = request('title');
        $painting->description = request('description');
        if(request('for_sale')=='true'){
            $painting->for_sale = true;
            $painting->price = request('price');
        }else{
            $painting->for_sale = false;
        }
        $painting->votes_average = 0;
        $painting->save();

        return response()->json(['status' => 'good', 'painting' => $painting]);
    }

}
