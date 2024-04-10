<?php

namespace Pshenichniyinfo\AdminPanel\database;

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
        Permission::create(['name' => 'show product']);
        Permission::create(['name' => 'edit product']);
        Permission::create(['name' => 'delete product']);
        Permission::create(['name' => 'add product']);

        Permission::create(['name' => 'show order']);
        Permission::create(['name' => 'edit order']);
        Permission::create(['name' => 'delete order']);
        Permission::create(['name' => 'add order']);

        Permission::create(['name' => 'show user']);
        Permission::create(['name' => 'edit user']);
        Permission::create(['name' => 'delete user']);
        Permission::create(['name' => 'add user']);

        Permission::create(['name' => 'show role']);
        Permission::create(['name' => 'edit role']);
        Permission::create(['name' => 'delete role']);
        Permission::create(['name' => 'add role']);

        Permission::create(['name' => 'show permission']);
        Permission::create(['name' => 'edit permission']);
        Permission::create(['name' => 'delete permission']);
        Permission::create(['name' => 'add permission']);
    }
}
