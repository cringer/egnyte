<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('test', function() {
	Auth::logout();

	if (!Auth::check()) {
    	echo 'User is logged out!';
	} else {
		echo 'User is logged in!';
	}
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('newhire', 'NewHiresController@index');
Route::post('newhire', 'NewHiresController@store');

// Authentication Routes...
Route::get('login', 'Auth\AuthController@login');
Route::get('logout', 'Auth\AuthController@logout')->name('logout');

// Registration Routes...
Route::get('register', 'Auth\AuthController@showRegistrationForm');
Route::post('register', 'Auth\AuthController@register');

Route::resource('location', 'LocationController');
Route::resource('position', 'PositionController');
Route::resource('status', 'StatusController');
Route::resource('task', 'TaskController');
Route::resource('tasklist', 'TaskListController');

Route::group(['prefix' => 'admin', 'middleware' => ['role:admin']], function () {
	Route::get('/', function () {
		return view('admin.dashboard');
	});
    Route::resource('role', 'RoleController');
    Route::resource('permission', 'PermissionController');
    Route::resource('user', 'UserController');
});
