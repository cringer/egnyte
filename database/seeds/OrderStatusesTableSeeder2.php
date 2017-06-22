<?php

use Illuminate\Database\Seeder;

class OrderStatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		$statuses = array('Ordered', 'Processing', 'Shipped', 'Delivered');

    	foreach($statuses as $status) {
	        DB::table('order_statuses')->insert(['name' => $status]);	
    	}

    }
}
