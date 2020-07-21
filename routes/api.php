<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Gallery;
use App\User;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/



Route::get('test/{id}', function ($id){
    $gallery = Gallery::findOrFail($id);
    $user = User::findOrFail($id);
    return response()->json(['gallery' => $gallery,'user' => $user], 200);
});

Route::get('/example', function(){
	return response()->json(['status' => 'Good']);
});
	
Route::post('/register', 'ProfileController@register');
Route::post('/login', 'ProfileController@login');
