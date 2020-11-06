<?php
# @Date:   2020-11-06T15:46:38+00:00
# @Last modified time: 2020-11-06T16:13:20+00:00




namespace Database\Seeders;

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
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
    }
}
