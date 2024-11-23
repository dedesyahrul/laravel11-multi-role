<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    public function run(): void
    {
        // Permissions untuk user management
        Permission::create(['name' => 'view-users', 'guard_name' => 'web']);
        Permission::create(['name' => 'create-users', 'guard_name' => 'web']);
        Permission::create(['name' => 'edit-users', 'guard_name' => 'web']);
        Permission::create(['name' => 'delete-users', 'guard_name' => 'web']);

        // Permissions untuk role management
        Permission::create(['name' => 'view-roles', 'guard_name' => 'web']);
        Permission::create(['name' => 'create-roles', 'guard_name' => 'web']);
        Permission::create(['name' => 'edit-roles', 'guard_name' => 'web']);
        Permission::create(['name' => 'delete-roles', 'guard_name' => 'web']);

        // Permissions untuk content management
        Permission::create(['name' => 'view-content', 'guard_name' => 'web']);
        Permission::create(['name' => 'create-content', 'guard_name' => 'web']);
        Permission::create(['name' => 'edit-content', 'guard_name' => 'web']);
        Permission::create(['name' => 'delete-content', 'guard_name' => 'web']);
    }
} 