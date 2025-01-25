<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Borrar todos los usuarios existentes
        DB::table('users')->delete();

        // Llamar al seeder de usuarios
        $this->call(UserSeeder::class);

        // Crear 5 usuarios adicionales usando el factory
        User::factory(5)->create();
    }
}
// Creamos el Factory usando el siguiente comando:
// php artisan make:factory UserFactory --model=User
// --model=User: con esto hacemos que el factory referencie al modelo User,
// esto hace que el factory se configure correctamente para este modelo
// Usamos el comando que procesa las semillas: php artisan db:seed:
// Esto borrará los usuarios existentes, ejecutará UserSeeder para crear un usuario específico,
// y luego generará 5 usuarios adicionales utilizando el factory.
