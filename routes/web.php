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


Route::redirect('/home', url('/'))->name('home');

Route::get('/profile', function () {
	return view('layouts.profile');
})->name('profile');

Route::get('/about', function () {
	return view('layouts.about');
})->name('about');
// auth
Auth::routes(['verify' => true]);

/* ASPIRATIONS or USERS */
Route::group(['middleware' => ['verified']], function () {
	Route::get('/', 'AspirationController@index')->name('aspirations.index');
	Route::get('/aspirations/beranda', 'AspirationController@beranda')->name('aspirations.beranda');
	Route::get('/aspiration/load', 'AspirationController@aspirationAjax')->name('aspiration.ajax');
	Route::get('/aspirations/{aspiration}/show', 'AspirationController@show')->name('aspirations.show');
	Route::get('/aspirations/{user}/profile', 'UserController@show')->name('aspirations.user');

	Route::get('aspirations/get-ajax', 'AspirationController@aspirationAjax')->name('aspirations.ajax');
	// Route::post('aspirations/get-ajax', 'AspirationController@aspirationAjax')->name('aspirations.ajax');
});


route::group(['middleware' => ['auth', 'verified']], function () {

	Route::get('/aspirations/create', 'AspirationController@create')->name('aspirations.create');
	Route::post('/aspirations/store', 'AspirationController@store')->name('aspirations.store');
	Route::get('/aspirations/{aspiration}/delete', 'AspirationController@destroy')->name('aspirations.delete');
	Route::get('/aspirations/{aspiration}/upvote', 'AspirationController@upvote')->name('aspirations.upvote');
	Route::get('/aspirations/profile', 'AspirationController@profile')->name('aspirations.profile');
	Route::get('/aspirations/search', 'AspirationController@search')->name('aspirations.search');
	Route::delete('aspirations/{aspiration}/delete', 'AspirationController@delete')->name('aspirations.delete');
	Route::post('/aspiration/comment', 'AspirationController@storeComment')->name('aspirations.comment');
	// Ajax search
	Route::get('/aspirations/ajax-search', 'AspirationController@ajaxSearch')->name('aspirations.ajax-search');
});

route::group(['middleware' => ['auth', 'verified']], function () {
	Route::resource('admin/user', 'UserController');
	Route::get('/user/index', 'UserController@edit')->name('users.index');
	Route::get('/user/{user}/edit', 'UserController@edit')->name('users.edit');
	Route::get('/user/{user}/show', 'UserController@edit')->name('users.show');
	Route::delete('user/{user}/destroy', 'UserController@destroy')->name('users.destroy');
	Route::patch('/user/{id}/update', 'UserController@update')->name('users.update');
});
/* ADMINS */
Route::group(['middleware' => ['admin', 'verified']], function () {
	Route::get('/admin', 'AdminController@index')->name('admins.index');
	Route::get('admin/action-link', 'userController@html')->name('action-link');
	// menu
	Route::resource('admin/menus', 'MenuController');
	Route::get('admin/menu-ajax', 'MenuController@getMenuList')->name('menu-table');
	// submenu
	Route::resource('admin/sub-menus', 'SubMenuController');
	Route::get('admin/subMenu-ajax', 'SubMenuController@getSubmenuList')->name('subMenu-table');
	// user
	Route::get('admin/users', 'AdminController@user')->name('admin-users');
	Route::get('admin/users-ajax', 'UserController@dataTableList')->name('user-table');
	// aspirations
	Route::get('admin/aspiration-admin', 'AdminController@aspiration')->name('aspiration-admin.index');
	Route::resource('admin/categories', 'AspirationCategoryController');
	Route::get('admin/categories-ajax', 'AspirationCategoryController@getCategoriesList')->name('categories-table');
	// for ajax
	Route::get('admin/get/{menu}', 'MenuController@get')->name('menus.get');
	Route::get('admin/get-sub', 'SubMenuController@get')->name('sub-menus.get');
});
