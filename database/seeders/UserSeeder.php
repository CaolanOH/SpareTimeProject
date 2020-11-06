<?php
# @Date:   2020-11-06T16:00:08+00:00
# @Last modified time: 2020-11-06T16:12:04+00:00




namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Hash;
use App\Models\Role;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $role_admin = Role::where('name', 'admin')->first();
      $role_user = Role::where('name', 'user')->first();


        $admin = new User();
        $admin->name = 'Jodie Mcgrane';
        $admin->email = 'admin@sparetime.ie';
        $admin->password = Hash::make('secret');
        $admin->save();
        $admin->roles()->attach($role_admin);


        $user = new User();
        $user->name = 'David Brooks';
        $user->email = 'user@sparetime.ie';
        $user->password = Hash::make('secret');
        $user->save();
        $user->roles()->attach($role_user);
    }
}
