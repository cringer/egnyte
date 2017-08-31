<?php

use App\Position;
use Illuminate\Database\Seeder;

class PositionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Position::create([
            'name' => 'Registered Nurse',
            'acronym' => 'RN',
            'color' => 'maroon'
        ]);

        Position::create([
            'name' => 'Home Health Aide',
            'acronym' => 'HHA',
            'color' => 'orchid'
        ]);

        Position::create([
            'name' => 'Licensed Vocational Nurse',
            'acronym' => 'LVN',
            'color' => 'teal'
        ]);

        Position::create([
            'name' => 'Spiritual Care Provider',
            'acronym' => 'SCP',
            'color' => 'powderblue'
        ]);
    }
}
