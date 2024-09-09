<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            [
                'name' => 'Super Admin',
                'slug' => 'super-admin',
                'description' => 'Somebody with access to the site network administration features and all other features.',
            ],
            [
                'name' => 'Administrator',
                'slug' => 'administrator',
                'description' => 'Somebody who has access to all the administration features within a single site.',
            ],
            [
                'name' => 'Editor',
                'slug' => 'editor',
                'description' => 'Somebody who can publish and manage posts including the posts of other users.',
            ],
            [
                'name' => 'Author',
                'slug' => 'author',
                'description' => 'Somebody who can publish and manage their own posts.',
            ],
            [
                'name' => 'Contributor',
                'slug' => 'contributor',
                'description' => 'Somebody who can write and manage their own posts but cannot publish them.',
            ],
            [
                'name' => 'Subscriber',
                'slug' => 'subscriber',
                'description' => 'Somebody who can only manage their profile.',
            ],
        ];
        foreach ($roles as $role) {
            Role::create($role);
        }
    }
}
