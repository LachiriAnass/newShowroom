<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gallery;

class ExploreController extends Controller
{
    public function index()
    {
        $galleries = Gallery::orderBy('created_at', 'DESC')->get();
        return view('explore', ['galleries' => $galleries]);
    }
}
