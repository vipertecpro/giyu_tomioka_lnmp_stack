<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $scopes = [
            'create',
            'read',
            'update',
            'delete',
            'import',
            'export',
        ];
        $models = [
            'user',
            'role',
            'permission',
            'tag',
            'category',
            'blog',
            'page',
            'comment',
        ];
        foreach ($models as $model) {
            foreach ($scopes as $scope) {
                Permission::create([
                    'name' => $scope . ' ' . $model,
                    'slug' => $scope . '-' . $model,
                    'description' => 'Somebody with access to ' . $scope . ' ' . $model . ' features.',
                ]);
            }
        }
    }
}
