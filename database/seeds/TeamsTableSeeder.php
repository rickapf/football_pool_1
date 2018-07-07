<?php

use Illuminate\Database\Seeder;

class TeamsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('teams')->insert([
            'name'         => 'Cardinals',
            'city'         => 'Arizona',
            'abbreviation' => 'ari',
            'division'     => 'NFC West'
        ]);

        DB::table('teams')->insert([
            'name'         => 'Falcons',
            'city'         => 'Atlanta',
            'abbreviation' => 'atl',
            'division'     => 'NFC South'
        ]);

        DB::table('teams')->insert([
            'name'         => 'Ravens',
            'city'         => 'Baltimore',
            'abbreviation' => 'bal',
            'division'     => 'AFC North'
        ]);

        DB::table('teams')->insert([
            'name'         => 'Bills',
            'city'         => 'Buffalo',
            'abbreviation' => 'buf',
            'division'     => 'AFC East'
        ]);

        DB::table('teams')->insert([
            'name'         => 'Panthers',
            'city'         => 'Carolina',
            'abbreviation' => 'car',
            'division'     => 'NFC South'
        ]);

        DB::table('teams')->insert([
            'name'         => 'Bears',
            'city'         => 'Chicago',
            'abbreviation' => 'chi',
            'division'     => 'NFC North'
        ]);

        DB::table('teams')->insert([
            'name'         => 'Bengals',
            'city'         => 'Cincinnati',
            'abbreviation' => 'cin',
            'division'     => 'AFC North'
        ]);

        DB::table('teams')->insert([
            'name'         => 'Browns',
            'city'         => 'Cleveland',
            'abbreviation' => 'cle',
            'division'     => 'AFC North'
        ]);

        DB::table('teams')->insert([
            'name'         => 'Cowboys',
            'city'         => 'Dallas',
            'abbreviation' => 'dal',
            'division'     => 'NFC East'
        ]);

        DB::table('teams')->insert([
            'name'         => 'Broncos',
            'city'         => 'Denver',
            'abbreviation' => 'den',
            'division'     => 'AFC West'
        ]);

        DB::table('teams')->insert([
            'name'         => 'Lions',
            'city'         => 'Detroit',
            'abbreviation' => 'det',
            'division'     => 'NFC North'
        ]);

        DB::table('teams')->insert([
            'name'         => 'Packers',
            'city'         => 'Green Bay',
            'abbreviation' => 'gb',
            'division'     => 'NFC North'
        ]);

        DB::table('teams')->insert([
            'name'         => 'Texans',
            'city'         => 'Houston',
            'abbreviation' => 'hou',
            'division'     => 'AFC South'
        ]);

        DB::table('teams')->insert([
            'name'         => 'Colts',
            'city'         => 'Indianapolis',
            'abbreviation' => 'ind',
            'division'     => 'AFC South'
        ]);

        DB::table('teams')->insert([
            'name'         => 'Jaguars',
            'city'         => 'Jacksonville',
            'abbreviation' => 'jax',
            'division'     => 'AFC South'
        ]);

        DB::table('teams')->insert([
            'name'         => 'Chiefs',
            'city'         => 'Kansas City',
            'abbreviation' => 'kc',
            'division'     => 'AFC West'
        ]);

        DB::table('teams')->insert([
            'name'         => 'Dolphins',
            'city'         => 'Miami',
            'abbreviation' => 'mia',
            'division'     => 'AFC East'
        ]);

        DB::table('teams')->insert([
            'name'         => 'Vikings',
            'city'         => 'Minnesota',
            'abbreviation' => 'min',
            'division'     => 'NFC North'
        ]);

        DB::table('teams')->insert([
            'name'         => 'Patriots',
            'city'         => 'New England',
            'abbreviation' => 'ne',
            'division'     => 'AFC East'
        ]);

        DB::table('teams')->insert([
            'name'         => 'Saints',
            'city'         => 'New Orleans',
            'abbreviation' => 'no',
            'division'     => 'NFC South'
        ]);

        DB::table('teams')->insert([
            'name'         => 'Giants',
            'city'         => 'New York',
            'abbreviation' => 'nyg',
            'division'     => 'NFC East'
        ]);

        DB::table('teams')->insert([
            'name'         => 'Jets',
            'city'         => 'New York',
            'abbreviation' => 'nyj',
            'division'     => 'AFC East'
        ]);

        DB::table('teams')->insert([
            'name'         => 'Raiders',
            'city'         => 'Oakland',
            'abbreviation' => 'oak',
            'division'     => 'AFC West'
        ]);

        DB::table('teams')->insert([
            'name'         => 'Eagles',
            'city'         => 'Philadelphia',
            'abbreviation' => 'phi',
            'division'     => 'NFC East'
        ]);

        DB::table('teams')->insert([
            'name'         => 'Steelers',
            'city'         => 'Pittsburgh',
            'abbreviation' => 'pit',
            'division'     => 'AFC North'
        ]);

        DB::table('teams')->insert([
            'name'         => 'Chargers',
            'city'         => 'Los Angeles',
            'abbreviation' => 'lac',
            'division'     => 'AFC West'
        ]);

        DB::table('teams')->insert([
            'name'         => '49ers',
            'city'         => 'San Francisco',
            'abbreviation' => 'sf',
            'division'     => 'NFC West'
        ]);

        DB::table('teams')->insert([
            'name'         => 'Seahawks',
            'city'         => 'Seattle',
            'abbreviation' => 'sea',
            'division'     => 'NFC West'
        ]);

        DB::table('teams')->insert([
            'name'         => 'Rams',
            'city'         => 'Los Angeles',
            'abbreviation' => 'la',
            'division'     => 'NFC West'
        ]);

        DB::table('teams')->insert([
            'name'         => 'Buccaneers',
            'city'         => 'Tampa Bay',
            'abbreviation' => 'tb',
            'division'     => 'NFC South'
        ]);

        DB::table('teams')->insert([
            'name'         => 'Titans',
            'city'         => 'Tennessee',
            'abbreviation' => 'ten',
            'division'     => 'AFC South'
        ]);

        DB::table('teams')->insert([
            'name'         => 'Redskins',
            'city'         => 'Washington',
            'abbreviation' => 'was',
            'division'     => 'NFC East'
        ]);
    }
}
