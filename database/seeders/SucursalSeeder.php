<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Sucursal;

class SucursalSeeder extends Seeder
{
    public function run()
    {
        Sucursal::create([
            'nombre' => 'Sucursal Centro',
            'direccion' => 'Calle 123, Centro',
            'telefono' => '123456789',
        ]);

        Sucursal::create([
            'nombre' => 'Sucursal Norte',
            'direccion' => 'Av. Principal 456, Norte',
            'telefono' => '987654321',
        ]);

        Sucursal::create([
            'nombre' => 'Sucursal Sur',
            'direccion' => 'Carrera 789, Sur',
            'telefono' => '456123789',
        ]);
    }
}
