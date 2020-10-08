<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Painting;
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
    $painting = Painting::findOrFail($id);
    $user = User::findOrFail($id);
    return response()->json(['painting' => $painting,'user' => $user], 200);
});

Route::get('/example', function(){
	return response()->json(['status' => 'Good']);
});

Route::post('/register', 'ProfileController@api_register');
Route::post('/login', 'ProfileController@api_login');

Route::get('/explore', 'ExploreController@api_index');

Route::get('/painting/{painting_id}', 'PaintingController@api_show');



Route::get('/search', 'SearchController@api_index');

Route::post('/editprofile/{user_id}', 'ProfileController@api_update');

Route::post('/newpainting/{user_id}', 'PaintingController@api_store');




