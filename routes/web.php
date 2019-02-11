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
Route::get('/genres', 'GenresController@index');
Route::get('/genres/{id}/edit', 'GenresController@edit');
Route::post('/genres/{id}/store', 'GenresController@store');
Route::get('/tracks', 'TracksController@index');
Route::get('/tracks/new', 'TracksController@addTrack');
Route::post('/tracks/store', 'TracksController@store');