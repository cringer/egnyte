<?php

use App\OrderStatus;
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
            OrderStatus::create([ 'name' => $status ]);
    	}
    }
}
