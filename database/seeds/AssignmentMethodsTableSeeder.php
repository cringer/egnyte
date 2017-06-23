<?php

use App\AssignmentMethod;
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
	        AssignmentMethod::create(['name' => $method ]);	
    	}
    }
}
