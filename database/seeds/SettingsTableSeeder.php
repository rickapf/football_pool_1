<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->insert([
            'current_week'          => 0,
            'registration_deadline' => Carbon::create(2018, 9, 6, 20, 0, 0)->format('Y-m-d H:i:s'),
            'number_of_weeks'       => 17,
            'cost_per_week'         => 5,
            'total_cost'            => 85,
        ]);
    }
}
