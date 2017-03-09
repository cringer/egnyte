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
	// $notifygroup = App\NotifyGroup::find(1);
	$notifygroup = App\NotifyGroup::findOrFail(1);
	// $notifygroups = App\NotifyGroup::all();
	foreach ($notifygroup->contacts as $contact) {
		echo $contact->name;
	}

	// foreach ($notifygroups as $notifygroup) {
	// 	foreach ($notifygroup->contacts as $contact) {
	// 		echo $contact->name;
	// 	}
	// }

	// $tasklists = App\TaskList::orderBy('name', 'asc')->get();

	// foreach ($tasklists as $tasklist) {
	// 	var_dump($tasklist);
		// foreach ($tasklist->positions as $position) {
		// 	echo $position->name;
		// }
	// }
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
