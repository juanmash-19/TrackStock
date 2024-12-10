<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Usuario;

class UsuarioSeeder extends Seeder
{
    public function run()
    {
        Usuario::create([
            'nombre_usuario' => 'admin',
            'correo' => 'admin@dominio.com',
            'contraseña' => 'admin1234', // La contraseña será cifrada
            'rol' => 'admin'
        ]);

        Usuario::create([
            'nombre_usuario' => 'empleado1',
            'correo' => 'empleado1@dominio.com',
            'contraseña' => 'empleado1234',
            'rol' => 'empleado'
        ]);

        Usuario::create([
            'nombre_usuario' => 'cliente1',
            'correo' => 'cliente1@dominio.com',
            'contraseña' => 'cliente1234',
            'rol' => 'cliente'
        ]);
    }
}
