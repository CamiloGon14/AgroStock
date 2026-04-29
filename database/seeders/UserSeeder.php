<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

public function run()
{
    // Asegurar que el rol admin existe
    $adminRole = Role::firstOrCreate(['name' => 'admin']);

    // Usuario Alejo
    $alejo = User::create([
        'name' => 'Alejo',
        'email' => 'alejo@AgroStock.com',
        'password' => Hash::make('12345678')
    ]);

    $alejo->assignRole($adminRole);

    // Usuario Camilo
    $camilo = User::create([
        'name' => 'Camilo',
        'email' => 'camilo@AgroStock.com',
        'password' => Hash::make('12345678')
    ]);

    $camilo->assignRole($adminRole);
}