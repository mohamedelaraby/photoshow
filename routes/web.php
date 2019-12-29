<?php

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

//Route::get('/', function () {
//    return view('welcome');
//});

// Routes albums controller pages
Route::resource('/', 'AlbumsController');
Route::get('/albums/{id}', 'AlbumsController@show');

// Route photos controller pages
Route::resource('photo','PhotosController');
Route::get('/photos/create/{id}','PhotosController@create');
