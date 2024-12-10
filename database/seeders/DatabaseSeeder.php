<?php

namespace Database\Seeders;

use App\Models\Usuario;  // Importa el modelo Usuario
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Usuario::factory(10)->create();

        Usuario::factory()->create([
            'nombre_usuario' => 'Test User',
            'correo' => 'test@example.com',
            'contraseña' => 'password123',
            'rol' => 'admin',
        ]);
    }
}
