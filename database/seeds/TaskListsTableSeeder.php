<?php

use App\TaskList;
use Illuminate\Database\Seeder;

class TaskListsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TaskList::create([
            'position_id' => 1,
            'name' => 'Create User Account'
        ]);
    }
}
