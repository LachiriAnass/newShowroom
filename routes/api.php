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

Route::post('/register', 'ProfileController@api_register');
Route::post('/login', 'ProfileController@api_login');

Route::get('/explore', 'ExploreController@api_index');

Route::get('/painting/{painting_id}', 'PaintingController@api_show');

Route::get('/gallery/{gallery_id}', 'GalleryController@api_show');

Route::get('/user_galleries/{user_id}', 'GalleryController@api_show_user_galleries');

Route::get('/search', 'SearchController@api_index');

Route::post('/editprofile/{user_id}', 'ProfileController@api_update');

Route::post('/newgallery/{user_id}', 'GalleryController@api_store');

Route::post('/newpainting/{user_id}', 'PaintingController@api_store');




