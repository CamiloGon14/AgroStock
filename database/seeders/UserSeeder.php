<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Asegurar que el rol admin existe
        $adminRole = Role::firstOrCreate(['name' => 'admin']);
        // Asegurar que el rol almacenista existe
        $almacenistaRole = Role::firstOrCreate(['name' => 'almacenista']);

        // Usuario Alejo
        $alejo = User::create([
            'name' => 'Alejo',
            'email' => 'alejo@AgroStock.com',
            'password' => Hash::make('12345678')
        ]);

        $alejo->assignRole($almacenistaRole);

        // Usuario Camilo
        $camilo = User::create([
            'name' => 'Camilo',
            'email' => 'camilo@AgroStock.com',
            'password' => Hash::make('12345678')
        ]);

        $camilo->assignRole($adminRole);
    }
}
