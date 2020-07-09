<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gallery;
use App\User;
use App\Painting;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $this->validate($request, [
            'category' => 'required',
            'search_text' => 'required',
        ]);

        $category = request('category');
        $search_text = request('search_text');

        $galleries = Gallery::where('title', 'LIKE', '%'.$search_text.'%')->get();
        $paintings = Painting::where('title', 'LIKE', '%'.$search_text.'%')->get();
        $artists = User::where('name', 'LIKE', '%'.$search_text.'%')->get();


        return view('search', ['category' => $category,
                                'search_text' => $search_text,
                                'galleries' => $galleries,
                                'paintings' => $paintings,
                                'artists' => $artists]);
    }
}
