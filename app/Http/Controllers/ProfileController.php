<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\ProfileVote;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Painting;

class ProfileController extends Controller
{
    public function show($id)
    {
        $user = User::findOrFail($id);
        $paintings = Painting::where('user_id', $id)->get();

        $votes = ProfileVote::where('profile_id', '=', $id)->get();

        $upvotes = $votes->filter(function($item){
            return $item->vote_type == true;
        });

        $downvotes = $votes->filter(function($item){
            return $item->vote_type == false;
        });

        return view('profile', ['user' => $user, 'paintings' => $paintings, 'upvotes' => $upvotes, 'downvotes' => $downvotes]);
    }

    public function update($id, Request $request)
    {
        $user = User::findOrFail($id);

        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'image' => 'image',
        ]);


        if($request->hasFile('image')){
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $filename = preg_replace('/\s+/', '', $filename);
            $fileNameToStore = $filename .'_'.time().'.'.$extension;
            $path = $request->file('image')->storeAs('public/profile', $fileNameToStore);
            $user->image = $fileNameToStore;
        }

        $user->name = request('name');
        $user->email = request('email');
        $user->save();

        return back()
            ->with("success","You have successfully modified your profile's infos.");
    }




    //   APIS FUNCTIONS


    public function api_register(Request $request)
    {

        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|email|string|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);




        $muser = User::where('email', request('email'))->first();

        if($muser) {
            return response()->json(['status' => 'bad', 'error' => 'alreadey_registered']);
        }else{
            $user = new User();
            $user->name = request('name');
            $user->email = request('email');
            $user->password = Hash::make(request('password'));
            $user->votes_average = 0;
            $user->login_token = Str::random(60);
            $user->save();

            return response()->json(['status' => 'good','user' => $user]);
        }
    }

    public function api_login(Request $request)
    {

        $this->validate($request, [
            'email' => 'required|email|string|max:255',
            'password' => 'required',
        ]);

        $user = User::where('email', request('email'))->first();
        if($user){
            if(Hash::check(request('password'), $user->password)){
                $user->login_token = Str::random(60);
                $user->save();
                return response()->json(['status' => 'good','user' => $user]);
            }
        }
        return response()->json(['status' => 'bad']);

    }


    public function api_update($id, Request $request)
    {
        $user = User::findOrFail($id);

        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'image' => 'image',
            'login_token' => 'required'
        ]);

        if($user->login_token != request('login_token')){
            return response()->json(['status' => 'bad', 'error' => 'User not verified. Bad Token.']);
        }


        if($request->hasFile('image')){
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $filename = preg_replace('/\s+/', '', $filename);
            $fileNameToStore = $filename .'_'.time().'.'.$extension;
            $path = $request->file('image')->storeAs('public/profile', $fileNameToStore);
            $user->image = $fileNameToStore;
        }else{
            return response()->json(['status' => 'bad', 'error' => 'No image detected']);
        }

        $user->name = request('name');
        $user->email = request('email');
        $user->save();

        return response()->json(['status' => 'good', 'user' => $user]);
    }


}
