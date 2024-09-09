<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RoleSeeder::class,
            PermissionSeeder::class,
            PermissionRoleSeeder::class,
            UserSeeder::class,
            RoleUserSeeder::class,
            TagSeeder::class,
            CategorySeeder::class,
            BlogSeeder::class,
        ]);
    }
}
