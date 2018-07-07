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
            'towards_weekly'        => 4,
            'towards_overall'       => 1,
            'overall_1st_percent'   => 60,
            'overall_2nd_percent'   => 25,
            'overall_3rd_percent'   => 15,
            'win_points'            => 2,
            'loss_points'           => 0,
            'tie_points'            => 1,
            'best_bet_win_points'   => 4,
            'best_bet_tie_points'   => 2,
        ]);
    }
}
