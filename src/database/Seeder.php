<?php

namespace Pshenichniyinfo\AdminPanel\database;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class Seeder
{
    public static function addSuperAdmin(string $email, string $password)
    {
        DB::table('users')->insert([
            'name' => 'super-admin',
            'email' => $email,
            'password' => Hash::make($password),
        ]);
    }
}
