<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Empleado;

class EmpleadoSeeder extends Seeder
{
    public function run()
    {
        Empleado::create([
            'nombre' => 'Juan Pérez',
            'cedula' => '123456789',
            'correo' => 'juanperez@empresa.com',
            'telefono' => '3001234567',
            'id_sucursal' => 1,
        ]);

        Empleado::create([
            'nombre' => 'Ana Gómez',
            'cedula' => '987654321',
            'correo' => 'anagomez@empresa.com',
            'telefono' => '3007654321',
            'id_sucursal' => 2,
        ]);
    }
}
