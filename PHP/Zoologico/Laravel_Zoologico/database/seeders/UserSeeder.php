<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Usamos el metodo create del modelo (Eloquent) para crear un nuevo usuario con nuestros datos
        User::create([
            'name'=>'Nestor',
            'email'=>'nestorserna100@gmail.com',
            'password'=>Hash::make('nestor123') // Es el password bycript pero en laravel, hace lo mismo
        ]);
    }
}
