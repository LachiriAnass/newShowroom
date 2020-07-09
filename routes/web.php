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

Route::get('/gallery/{gallery_id}', 'GalleryController@show');
Route::get('/galleries', 'GalleryController@index')->middleware('auth');
Route::get('/create_gallery', 'GalleryController@newGallery')->middleware('auth');
Route::post('/create_gallery', 'GalleryController@store')->middleware('auth');


Route::get('/painting/{painting_id}', 'PaintingController@show');
Route::post('/create_painting', 'PaintingController@store')->middleware('auth');
Route::post('/delete_painting/{painting_id}', 'PaintingController@destroy')->middleware('auth');

Route::get('/profile/{user_id}', 'ProfileController@show');
Route::post('/modify_profile/{user_id}', 'ProfileController@update')->middleware('auth');

Route::get('/search', 'SearchController@index')->middleware('auth');
