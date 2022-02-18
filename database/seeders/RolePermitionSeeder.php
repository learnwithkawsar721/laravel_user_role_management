<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermitionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //create role
        $roleAdmin = Role::create(['name' => 'admin']);
        $roleSuperAdmin = Role::create(['name' => 'superadmin']);
        $roleEditor = Role::create(['name' => 'editor']);
        $roleUser = Role::create(['name' => 'user']);
        // create permitions
        $permitions = [
            'dashboard.view',
            // Blog permition
            'blog.create',
            'blog.view',
            'blog.edit',
            'blog.delete',
            'blog.approve',
            // Admin permitions
            'admin.create',
            'admin.view',
            'admin.edit',
            'admin.delete',
            'admin.approve',
            // Role permitions
            'role.create',
            'role.view',
            'role.edit',
            'role.delete',
            'role.approve',
            // profile permitions
            'profile.view',
            'profile.edit',
        ];
        // assign permitions
        for ($i=0; $i <count($permitions) ; $i++) { 
            # code...
            $permission = Permission::create(['name' => $permitions[$i]]);
            $roleAdmin->givePermissionTo($permission);
            $permission->assignRole($roleAdmin);
        }
    }
}
