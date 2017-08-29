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

Route::get('/test', function () {
    return view('test');
});

Route::get('/', 'NewHireController@index');

Route::resource('newhires', 'NewHireController', ['except' => [
    'destroy'
]]);

Route::resource('positions', 'PositionController');
Route::resource('orders', 'OrderController', ['only' => [
    'index', 'show'
]]);

Route::name('admin.')->prefix('admin')->group(function () {
    Route::get('/', function () {
        return view('admin.dashboard');
    });
    // Route::resource('positions', 'Admin\PositionController', ['except' => ['show', 'delete']]);
    Route::resource('vendors', 'Admin\VendorController', ['except' => ['show', 'delete']]);
    Route::resource('vendorcontacts', 'Admin\VendorContactController', ['except' => ['show', 'delete']]);
    Route::resource('equipment', 'Admin\EquipmentController', ['except' => ['show', 'delete']]);
    Route::resource('equipmenttypes', 'Admin\EquipmentTypeController', ['except' => ['show', 'delete']]);
    Route::resource('assignments', 'Admin\AssignmentController', ['except' => ['show', 'delete']]);
    Route::resource('assignmentmethods', 'Admin\AssignmentMethodController', ['except' => ['show', 'delete']]);
    Route::resource('orders', 'Admin\OrderController', ['except' => ['show', 'delete']]);
    Route::resource('orderstatus', 'Admin\OrderStatusController', ['except' => ['show', 'delete']]);
});
