<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'id'        => 1,
            'name'      => 'Admin',
            'email'     => 'admin@test.com',
            'password'  => bcrypt('password'),
            'status'    => true,
        ]);
        User::factory()->count(200)->create();
    }
}
