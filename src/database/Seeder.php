<?php

namespace Pshenichniyinfo\AdminPanel\database;

use Illuminate\Support\Facades\DB;
use Pshenichniyinfo\AdminPanel\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class Seeder
{
    public static function addSuperAdmin(string $email, string $password): void
    {
        $user = User::create([
            'name' => 'super-admin',
            'email' => $email,
            'password' => Hash::make($password),
        ]);

        Role::create(['name' => 'super-admin', 'guard_name' => 'web']);

        $user->assignRole('super-admin');
    }

    public static function addPermissions(): void
    {
        $permissions = [
            'show product',
            'edit product',
            'delete product',
            'add product',
            'show order',
            'edit order',
            'delete order',
            'add order',
            'show user',
            'edit user',
            'delete user',
            'add user',
            'show role',
            'edit role',
            'delete role',
            'add role',
            'show permission',
            'edit permission',
            'delete permission',
            'add permission',
        ];

        $role = Role::first();

        foreach ($permissions as $permission) {
            $per = Permission::firstOrCreate(['name' => $permission]);

            DB::table('role_has_permissions')
                ->updateOrInsert(
                    ['role_id' => $role->id, 'permission_id' => $per->id]
                );
        }
    }
}
