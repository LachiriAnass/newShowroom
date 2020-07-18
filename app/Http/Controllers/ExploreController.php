<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gallery;
use App\Painting;
use App\User;


class ExploreController extends Controller
{
    public function index()
    {
        $latest_galleries = Gallery::orderBy('created_at', 'DESC')->limit(6)->get();
        $most_rated_galleries = Gallery::orderBy('votes_average', 'DESC')->limit(6)->get();
        $most_rated_paintings = Painting::orderBy('votes_average', 'DESC')->limit(6)->get();
        $most_rated_artists = User::orderBy('votes_average', 'DESC')->limit(6)->get();
        return view('explore', ['latest_galleries' => $latest_galleries,
                                'most_rated_galleries' => $most_rated_galleries,
                                'most_rated_paintings' => $most_rated_paintings,
                                'most_rated_artists' => $most_rated_artists]);
    }
}
