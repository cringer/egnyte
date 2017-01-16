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
    $position = App\Position::first();

    foreach ($position->task_lists as $tasklist) {
        $task_list_array[] = $tasklist;
    };
    return $task_list_array;
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('newhire', 'NewHiresController@index');
Route::post('newhire', 'NewHiresController@store');

// Authentication Routes...
Route::get('login', 'Auth\AuthController@login');
Route::get('logout', 'Auth\AuthController@logout');

// Registration Routes...
Route::get('register', 'Auth\AuthController@showRegistrationForm');
Route::post('register', 'Auth\AuthController@register');

Route::resource('location', 'LocationController');
Route::resource('position', 'PositionController');
Route::resource('status', 'StatusController');
Route::resource('task', 'TaskController');
Route::resource('tasklist', 'TaskListController');
Route::resource('taskgroup', 'TaskGroupController');
Route::resource('user', 'UserController');

// Api Routes...
Route::get('api/tasks/{tasklist}', function ($tasklist) {
    $tasks = App\TaskList::find($tasklist)->tasks();
    // foreach ($tasks as $task) {
    //     print $task;
    // }
    dd($tasks);
});
