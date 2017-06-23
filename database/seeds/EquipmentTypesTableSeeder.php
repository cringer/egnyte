<?php

use App\EquipmentType;
use Illuminate\Database\Seeder;

class EquipmentTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$types = array('Laptop', 'Workstation', 'Mobile Phone', 'Tablet');

    	foreach($types as $type) {
            EquipmentType::create([ 'name' => $type ]);
    	}
    }
}
