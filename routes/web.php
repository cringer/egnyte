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

Route::get('test', function () {
	$time = \Carbon\Carbon::now();

	return $time;
});

Route::get('api/v1/newhires', 'Api\NewHireController@index')->name('api.newhires.index');
Route::get('api/v1/newhires/{newhires}', 'Api\NewHireController@show')->name('api.newhires.show');
Route::delete('api/v1/newhires/{newhires}', 'Api\NewHireController@destroy')->name('api.newhires.destroy');

Route::get('/', 'Admin\NewHiresController@index');

// Route::resource('contact', 'ContactController');
Route::resource('position', 'PositionController');
// Route::resource('department', 'DepartmentController');
Route::resource('order', 'OrderController');

Route::get('newhire', 'Admin\NewHiresController@index');
Route::get('newhire/{newhire}', 'Admin\NewHiresController@show');
Route::post('newhire', 'Admin\NewHiresController@store');

// Authentication Routes...
Route::get('login', 'Auth\AuthController@login');
Route::get('logout', 'Auth\AuthController@logout')->name('logout');

// Registration Routes...
Route::get('register', 'Auth\AuthController@showRegistrationForm');
Route::post('register', 'Auth\AuthController@register');

// Route::name('admin.')->prefix('admin')->middleware('role:admin')->group(function () {
Route::name('admin.')->prefix('admin')->group(function () {
	Route::get('/', function () {
		return view('admin.dashboard');
	});
 //    Route::resource('role', 'Admin\RoleController');
 //    Route::resource('permission', 'Admin\PermissionController');
 //    Route::resource('user', 'Admin\UserController');
 //    Route::resource('location', 'Admin\LocationController');
	// Route::resource('position', 'Admin\PositionController');
	// Route::resource('status', 'Admin\StatusController');
	// Route::resource('task', 'Admin\TaskController');
	// Route::resource('tasklist', 'Admin\TaskListController');
	// Route::resource('contact', 'Admin\ContactController');
	// Route::resource('notifygroup', 'Admin\NotifyGroupController');
	Route::resource('vendor', 'Admin\VendorController');
	Route::resource('equipment', 'Admin\EquipmentController');
	Route::resource('equipmenttype', 'Admin\EquipmentTypeController');
	Route::resource('assignment', 'Admin\AssignmentController');
	Route::resource('assignmentmethod', 'Admin\AssignmentMethodController');
	Route::resource('order', 'Admin\OrderController');
	Route::resource('orderstatus', 'Admin\OrderStatusController');
});