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
Route::resource('position', 'PositionController', ['except' => [
	'destroy'
]]);
Route::resource('order', 'OrderController', ['only' => [
	'index', 'show'
]]);

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