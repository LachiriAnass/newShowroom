<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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

        $paintings = Painting::where('title', 'LIKE', '%'.$search_text.'%')->paginate(15);
        $artists = User::where('name', 'LIKE', '%'.$search_text.'%')->paginate(15);



        return view('search', ['category' => $category,
                                'search_text' => $search_text,
                                'paintings' => $paintings,
                                'artists' => $artists]);
    }

    public function api_index(Request $request)
    {
        $this->validate($request, [
            'search_text' => 'required'
        ]);

        $search_text = request('search_text');

        if(request('search_text') == ""){
            return response()->json(['status' => 'bad','error' => 'Search Text Empty !!']);
        }else{
            $paintings = Painting::where('title', 'LIKE', '%'.$search_text.'%')->limit(10)->get();
            return response()->json(['status' => 'good','paintings' => $paintings]);
        }
    }
}
