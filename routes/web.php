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
	$tasklists = App\Position::find(1)->task_lists()->get();
	dd($tasklists);
	// $roles = App\User::find(1)->roles()->orderBy('name')->get();
	// $position = 1;

	// function lookup()
	// {
	// 	$position = App\Position::find(1);

	// 	foreach ($position->task_lists as $tasklist) {

	// 	}

	// 	return true;
	// }

	// $numbers = array(1,2,3);
	// dd(lookup($numbers));


	// $tasklists = array();
	// $tasks = array();

	// $position = App\Position::find(1);

	// foreach ($position->task_lists as $tasklist) {
	// 	$tasklists[] = $tasklist->id;
	// };

	// // dd($tasklists);

	// foreach ($tasklists as $tasklist) {
	// 	$tasks = App\Tasklist::find($tasklist)->tasks()->get();
	// };

	// $tasks = App\Taskslist::find($tasklist)

	// $numbers = array(1,2,3);
	// $tasklists[1] = $numbers;
	// $tasklists = App\Position::find(1)->task_lists()->get();
	dd($tasks);
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('newhire', 'Admin\NewHiresController@index');
Route::post('newhire', 'Admin\NewHiresController@store');

// Authentication Routes...
Route::get('login', 'Auth\AuthController@login');
Route::get('logout', 'Auth\AuthController@logout')->name('logout');

// Registration Routes...
Route::get('register', 'Auth\AuthController@showRegistrationForm');
Route::post('register', 'Auth\AuthController@register');

Route::group(['prefix' => 'admin', 'middleware' => ['role:admin']], function () {
	Route::get('/', function () {
		return view('admin.dashboard');
	});
    Route::resource('role', 'Admin\RoleController');
    Route::resource('permission', 'Admin\PermissionController');
    Route::resource('user', 'Admin\UserController');
    Route::resource('location', 'Admin\LocationController');
	Route::resource('position', 'Admin\PositionController');
	Route::resource('status', 'Admin\StatusController');
	Route::resource('task', 'Admin\TaskController');
	Route::resource('tasklist', 'Admin\TaskListController');
	Route::resource('contact', 'Admin\ContactController');
	Route::resource('notifygroup', 'Admin\NotifyGroupController');
});
