<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\Permission;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        // Buat role superadmin
        $superadmin = Role::create([
            'name' => 'superadmin',
            'guard_name' => 'web',
            'is_locked' => true
        ]);

        // Buat role admin
        $admin = Role::create([
            'name' => 'admin',
            'guard_name' => 'web',
            'is_locked' => true
        ]);

        // Buat role user
        $user = Role::create([
            'name' => 'user',
            'guard_name' => 'web',
            'is_locked' => false
        ]);

        // Berikan semua permissions ke superadmin
        $superadmin->permissions()->attach(Permission::all());

        // Berikan beberapa permissions ke admin
        $admin->permissions()->attach(
            Permission::whereIn('name', [
                'view-users',
                'view-content',
                'create-content',
                'edit-content',
                'delete-content'
            ])->get()
        );

        // Berikan permissions dasar ke user
        $user->permissions()->attach(
            Permission::whereIn('name', [
                'view-content'
            ])->get()
        );
    }
}
