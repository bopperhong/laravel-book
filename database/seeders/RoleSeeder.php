<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminRole = Role::create([
            'name' => 'admin']);
        $adminPermissions = [
            'manage users',
            'manage categories',
            'manage seller approvals',
        ];
        $sellerRole = Role::create([
            'name' => 'seller']);
        $sellerPermissions = [
            'manage books',
            'view orders',
        ];

        $userRole = Role::create([
            'name' => 'user'
        ]);
        $userPermissions = [
            'view books',
            'wishlist',
        ];

        foreach ($sellerPermissions as $permissionName){
            $permission = Permission::create(['name' => $permissionName]);
            $sellerRole->givePermissionTo($permission);
        }
        
        foreach ($adminPermissions as $permissionName){
            $permission = Permission::create(['name' => $permissionName]);
            $adminRole->givePermissionTo($permission);
        }

        foreach ($userPermissions as $permissionName){
            $permission = Permission::create(['name' => $permissionName]);
            $userRole->givePermissionTo($permission);
        }
    }
}
