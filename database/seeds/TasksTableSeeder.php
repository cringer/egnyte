<?php

use App\Task;
use Illuminate\Database\Seeder;

class TasksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Task::create([
            'task_list_id' => 1,
            'order' => 1,
            'name' => 'Create user account',
            'details' => 'From Active Directory Users and Computers create User account under OU=Users,DC=snowlinehospice,DC=local'
        ]);

        Task::create([
            'task_list_id' => 1,
            'order' => 2,
            'name' => 'Set Organization field',
            'details' => "In the properties of the user object, select the Organization tab.  Enter 'Snowline Hospice' in the 'Company' field."
        ]);

        Task::create([
            'task_list_id' => 1,
            'order' => 3,
            'name' => 'Set User logon name',
            'details' => "In the properties of the user object, select the Account tab.  Select 'snowlinehospice.org' for the 'User logon name' field."
        ]);
    }
}
