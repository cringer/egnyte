<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(OrderStatusesTableSeeder::class);
        $this->call(AssignmentMethodsTableSeeder::class);
        $this->call(PositionsTableSeeder::class);
        $this->call(EquipmentTypesTableSeeder::class);
    }
}
