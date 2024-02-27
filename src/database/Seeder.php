<?php

namespace Pshenichniyinfo\AdminPanel\database;

use Pshenichniyinfo\AdminPanel\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class Seeder
{
    public static function addSuperAdmin(string $email, string $password)
    {
        $user = User::create([
            'name' => 'super-admin',
            'email' => $email,
            'password' => Hash::make($password),
        ]);

        Role::create(['name' => 'super-admin', 'guard_name' => 'web']);

        $user->assignRole('super-admin');
    }
}
