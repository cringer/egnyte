<?php

use Illuminate\Database\Seeder;

class AssignmentMethodsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$methods = array('New Equipment', 'Repurposed');

    	foreach($methods as $method) {
	        DB::table('assignment_methods')->insert(['name' => $method]);	
    	}
    }
}
