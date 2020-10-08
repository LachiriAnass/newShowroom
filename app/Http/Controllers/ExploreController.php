<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Painting;
use App\User;


class ExploreController extends Controller
{
    public function index()
    {
        $latest_paintings = Painting::orderBy('created_at', 'DESC')->limit(6)->get();
        $most_rated_paintings = Painting::orderBy('votes_average', 'DESC')->limit(6)->get();
        $most_rated_artists = User::orderBy('votes_average', 'DESC')->limit(6)->get();
        return view('explore', ['latest_paintings' => $latest_paintings,
                                'most_rated_paintings' => $most_rated_paintings,
                                'most_rated_artists' => $most_rated_artists]);
    }



    //   APIS FUNCTIONS


    public function api_index()
    {
        $latest_paintings= Painting::orderBy('created_at', 'DESC')->limit(6)->get();
        $most_rated_paintings = Painting::orderBy('votes_average', 'DESC')->limit(6)->get();
        return response()->json(['status' => 'good','latest_paintings' => $latest_paintings, 'most_rated_paintings' => $most_rated_paintings]);
    }


}
