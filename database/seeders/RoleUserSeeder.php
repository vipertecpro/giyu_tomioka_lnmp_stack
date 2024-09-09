<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class RoleUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // assign super-admin role to the first user created using eloquent model
        $user = User::find(1);
        $user->roles()->attach(1);
        // assign administrator role to the second user created using eloquent model
        $user = User::find(2);
        $user->roles()->attach(2);
        // assign editor role to the third user created using eloquent model
        $user = User::find(3);
        $user->roles()->attach(3);
        // assign author role to the fourth user created using eloquent model
        $user = User::find(4);
        $user->roles()->attach(4);
        // assign contributor role to the fifth user created using eloquent model
        $user = User::find(5);
        $user->roles()->attach(5);
        // assign subscriber role to the rest of the users created using eloquent model
        $users = User::where('id', '>', 5)->get();
        foreach ($users as $user) {
            $user->roles()->attach(6);
        }
    }
}
