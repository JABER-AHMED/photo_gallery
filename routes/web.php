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

Route::get('/', 'AlbumController@index');
Route::get('/album', 'AlbumController@index')->name('index');
Route::get('/album/create', 'AlbumController@create')->name('create');
Route::post('/album/store', 'AlbumController@store')->name('store');
Route::get('/album/{id}', 'AlbumController@show')->name('album_show');


Route::get('/photos/create/{id}', 'PhotosController@create')->name('photos');
Route::post('/photo/store', 'PhotosController@store')->name('photo.store');
Route::get('/photo/{id}', 'PhotosController@show')->name('photo_show');
Route::delete('photo/{id}', 'PhotosController@destroy')->name('photo.delete');
