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
        // Usar factory para crear 10 usuarios
        Usuario::factory(10)->create();

        // Crear un usuario específico con datos personalizados
        Usuario::factory()->create([
            'nombre_usuario' => 'Test User', // nombre_usuario en lugar de name
            'correo' => 'test@example.com',  // correo en lugar de email
            'contraseña' => 'password123',   // Proporciona una contraseña segura
            'rol' => 'admin',  // Puede ser admin, empleado, cliente, etc.
        ]);
    }
}
