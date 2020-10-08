<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/create_painting', 'PaintingController@newPainting')->middleware('auth');
Route::post('/create_painting', 'PaintingController@store')->middleware('auth');


Route::get('/painting/{painting_id}', 'PaintingController@show');
Route::post('/delete_painting/{painting_id}', 'PaintingController@destroy')->middleware('auth');
Route::post('/sold_painting/{painting_id}', 'PaintingController@modify')->middleware('auth');

Route::get('/profile/{user_id}', 'ProfileController@show');
Route::post('/modify_profile/{user_id}', 'ProfileController@update')->middleware('auth');

Route::get('/search', 'SearchController@index');

Route::get('/explore', 'ExploreController@index');

Route::post('/paintingupvote/{user_id}/{painting_id}', 'PaintingVoteController@manageUpvote')->middleware('auth');
Route::post('/paintingdownvote/{user_id}/{painting_id}', 'PaintingVoteController@manageDownvote')->middleware('auth');

Route::post('/profileupvote/{user_id}/{profile_id}', 'ProfileVoteController@manageUpvote')->middleware('auth');
Route::post('/profiledownvote/{user_id}/{profile_id}', 'ProfileVoteController@manageDownvote')->middleware('auth');


