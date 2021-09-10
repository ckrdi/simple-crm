<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([ 'name' => 'Super Admin' ]);

        $adminRole = Role::create([ 'name' => 'Admin' ]);

        $userRole = Role::create([ 'name' => 'User' ]);

        $permissions = [
            'manage role',
            'manage permission',
            'manage user',
            'manage client',
            'manage project',
            'manage task'
        ];

        foreach ($permissions as $permission) {
            Permission::create([ 'name' => $permission ]);
        }

        $adminRole->givePermissionTo([
            'manage client',
            'manage project',
            'manage task'
        ]);

        $userRole->givePermissionTo([
            'manage project',
            'manage task'
        ]);
    }
}
