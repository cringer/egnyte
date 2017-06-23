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
		$methods = array('New Equipment' => 'Brand New Equipment', 'Repurposed' => 'Repurposed Gear');

    	foreach($methods as $k => $v) {
	        AssignmentMethod::create(['name' => $k, 'description' => $v ]);	
    	}
    }
}