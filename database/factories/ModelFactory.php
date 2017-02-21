<?php

use Carbon\Carbon;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'slug' => $faker->word,
        'email' => $faker->safeEmail,
        'hostname' => $faker->word
    ];
});

$factory->define(App\NewHire::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'slug' => $faker->word,
        'position_id' => 1,
        'status_id' => 1,
        'location_id' => 1,
        'hire_date' => $faker->date
    ];
});

$factory->define(App\Location::class, function (Faker\Generator $faker) {
    return [
        'site' => $faker->word,
        'slug' => $faker->word
    ];
});

$factory->define(App\Position::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->word,
        'slug' => $faker->word,
        'color' => $faker->safeColorName
    ];
});

$factory->define(App\Status::class, function (Faker\Generator $faker) {
    return [
        'status' => $faker->word,
        'slug' => $faker->word
    ];
});

$factory->define(App\Task::class, function (Faker\Generator $faker) {
    return [
        'task_list_id' => 1,
        'name' => $faker->word
    ];
});

$factory->define(App\TaskList::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->word,
        'icon' => $faker->word
    ];
});

$factory->define(App\TaskGroup::class, function (Faker\Generator $faker) {
    return [
        'position_id' => 1
    ];
});

$factory->define(Spatie\Permission\Models\Role::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->word,
        
    ];
});

$factory->define(Spatie\Permission\Models\Permission::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->word,
        
    ];
});
