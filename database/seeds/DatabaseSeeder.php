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
        $this->call(IntroTableSeeder::class);
        // $this->call(UserTableSeeder::class);
        // $this->call(SatisfactorTableSeeder::class);
    }
}
