<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Cliente;

class ClienteSeeder extends Seeder
{
    public function run()
    {
        Cliente::create([
            'nombre' => 'Juan Pérez',
            'cedula' => '123456789',
            'correo' => 'juan.perez@dominio.com',
            'telefono' => '1234567890',
            'direccion' => 'Calle Ficticia 123',
        ]);

        Cliente::create([
            'nombre' => 'Maria Gómez',
            'cedula' => '987654321',
            'correo' => 'maria.gomez@dominio.com',
            'telefono' => '0987654321',
            'direccion' => 'Avenida Imaginaria 456',
        ]);
    }
}
