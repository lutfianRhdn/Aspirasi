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


//default
Route::view('/', 'welcome');
Route::get('/home', 'HomeController@index')->name('home');

// auth
Auth::routes();

//aspiration
route::group([], function(){
	Route::get('/aspirations', 'AspirationController@index')->name('aspirations.index');
	Route::get('/aspirations/create', 'AspirationController@create')->name('aspirations.create');
	Route::post('/aspirations/store', 'AspirationController@store')->name('aspirations.store');
	Route::get('/aspirations/{aspiration}/delete', 'AspirationController@destroy')->name('aspirations.delete');
	Route::post('/aspirations/upvote', 'AspirationController@upvote')->name('aspirations.upvote');
	Route::get('/aspiratins/beranda', 'AspirationController@beranda')->name('aspirations.beranda');
});