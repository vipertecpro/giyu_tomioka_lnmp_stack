<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Seeder;

class PermissionRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Assign permissions to roles
        $allPermissions = Permission::all();

        // super-admin role
        $superAdminPermissions = $allPermissions->pluck('id');
        $superAdminRole = Role::where('slug', 'super-admin')->first();
        $superAdminRole->permissions()->sync($superAdminPermissions);

        // administrator role
        $administratorPermissions = $allPermissions->pluck('id');
        $administratorRole = Role::where('slug', 'administrator')->first();
        $administratorRole->permissions()->sync($administratorPermissions);

        // editor role
        $editorPermissions = $allPermissions->whereNotIn('slug', ['import-user', 'export-user'])->pluck('id');
        $editorRole = Role::where('slug', 'editor')->first();
        $editorRole->permissions()->sync($editorPermissions);

        // author role
        $authorPermissions = $allPermissions->whereIn('slug', ['create-user', 'read-user', 'update-user', 'delete-user'])->pluck('id');
        $authorRole = Role::where('slug', 'author')->first();
        $authorRole->permissions()->sync($authorPermissions);

        // contributor role
        $contributorPermissions = $allPermissions->whereIn('slug', ['create-user', 'read-user'])->pluck('id');
        $contributorRole = Role::where('slug', 'contributor')->first();
        $contributorRole->permissions()->sync($contributorPermissions);

        // subscriber role
        $subscriberPermissions = $allPermissions->filter(function ($permission) {
            return preg_match('/^read-/', $permission->slug);
        })->pluck('id');
        $subscriberRole = Role::where('slug', 'subscriber')->first();
        $subscriberRole->permissions()->sync($subscriberPermissions);
    }
}
