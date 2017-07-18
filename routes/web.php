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

Route::get('/', 'NewHireController@index');

// Route::get('api/v1/newhires', 'Api\NewHireController@index')->name('api.newhires.index');
// Route::get('api/v1/newhires/{newhires}', 'Api\NewHireController@show')->name('api.newhires.show');
// Route::delete('api/v1/newhires/{newhires}', 'Api\NewHireController@destroy')->name('api.newhires.destroy');

Route::resource('newhire', 'NewHireController');
Route::resource('position', 'PositionController');
Route::resource('order', 'OrderController');

// Route::get('newhire', 'NewHireController@index');
// Route::get('newhire/{newhire}', 'NewHireController@show');
// Route::post('newhire', 'NewHireController@store');
// Route::delete('newhire', 'NewHireController@delete')

// // Authentication Routes...
// Route::get('login', 'Auth\AuthController@login');
// Route::get('logout', 'Auth\AuthController@logout')->name('logout');

// // Registration Routes...
// Route::get('register', 'Auth\AuthController@showRegistrationForm');
// Route::post('register', 'Auth\AuthController@register');

Route::name('admin.')->prefix('admin')->group(function () {
	Route::get('/', function () {
		return view('admin.dashboard');
	});
	Route::resource('position', 'Admin\PositionController');
	Route::resource('vendor', 'Admin\VendorController');
	Route::resource('vendorcontact', 'Admin\VendorContactController');
	Route::resource('equipment', 'Admin\EquipmentController');
	Route::resource('equipmenttype', 'Admin\EquipmentTypeController');
	Route::resource('assignment', 'Admin\AssignmentController');
	Route::resource('assignmentmethod', 'Admin\AssignmentMethodController');
	Route::resource('order', 'Admin\OrderController');
	Route::resource('orderstatus', 'Admin\OrderStatusController');
});