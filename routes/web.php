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
Route::redirect('/home', '/')->name('home');

// auth
Auth::routes();

/* ASPIRATIONS or USERS */
Route::get('/', 'AspirationController@index')->name('aspirations.index');

route::group(['auth'] , function(){
	Route::get('/aspirations/create', 'AspirationController@create')->name('aspirations.create');
	Route::post('/aspirations/store', 'AspirationController@store')->name('aspirations.store');
	Route::get('/aspirations/{aspiration}/delete', 'AspirationController@destroy')->name('aspirations.delete');
	Route::post('/aspirations/upvote', 'AspirationController@upvote')->name('aspirations.upvote');
	Route::get('/aspirations/beranda', 'AspirationController@beranda')->name('aspirations.beranda');
	Route::get('aspirations/profile', 'AspirationController@profile')->name('aspirations.profile');
});

/* ADMINS */
Route::group(['admin'], function(){
	Route::get('/admin', 'AdminController@index')->name('admins.index');
	Route::resource('admin/menus', 'MenuController');
	Route::resource('admin/sub-menus', 'SubMenuController');
	Route::resource('admin/users', 'UserController');
});

