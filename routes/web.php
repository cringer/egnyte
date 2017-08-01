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

Route::resource('newhire', 'NewHireController', ['except' => [
	'destroy'
]]);
Route::resource('position', 'PositionController');
Route::resource('order', 'OrderController', ['only' => [
	'index', 'show'
]]);

Route::name('admin.')->prefix('admin')->group(function () {
	Route::get('/', function () {
		return view('admin.dashboard');
	});
	Route::resource('position', 'Admin\PositionController', ['except' => ['show']]);
	Route::resource('vendor', 'Admin\VendorController', ['except' => ['show']]);
	Route::resource('vendorcontact', 'Admin\VendorContactController', ['except' => ['show']]);
	Route::resource('equipment', 'Admin\EquipmentController', ['except' => ['show']]);
	Route::resource('equipmenttype', 'Admin\EquipmentTypeController', ['except' => ['show']]);
	Route::resource('assignment', 'Admin\AssignmentController', ['except' => ['show']]);
	Route::resource('assignmentmethod', 'Admin\AssignmentMethodController', ['except' => ['show']]);
	Route::resource('order', 'Admin\OrderController', ['except' => ['show']]);
	Route::resource('orderstatus', 'Admin\OrderStatusController', ['except' => ['show']]);
});