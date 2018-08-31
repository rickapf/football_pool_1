<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        switch (App::environment()) {
            case 'production':
                $this->call(SettingsTableSeeder::class);
                $this->call(TeamsTableSeeder::class);
                break;
            default:
                $this->call(UsersTableSeeder::class);
                $this->call(SettingsTableSeeder::class);
                $this->call(TeamsTableSeeder::class);
        }
    }
}
