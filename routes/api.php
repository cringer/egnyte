<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');

Route::name('api.')->group(function () {
    Route::resource('positions', 'Api\PositionController');
    Route::resource('vendors', 'Api\VendorController');
    Route::resource('vendorcontacts', 'Api\VendorContactController');
    Route::resource('equipment', 'Api\EquipmentController');
    Route::resource('equipmenttypes', 'Api\EquipmentTypeController');
    Route::resource('assignments', 'Api\AssignmentController');
    Route::resource('assignmentmethods', 'Api\AssignmentMethodController');
    Route::resource('orders', 'Api\OrderController');
    Route::resource('orderstatus', 'Api\OrderStatusController');
    Route::resource('tasklists', 'Api\TaskListController');
    Route::resource('tasks', 'Api\TaskController');
    Route::get('/tasks/update', 'Api\TaskController@updateOrder')->name('tasks.updateorder');
});
