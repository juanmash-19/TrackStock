<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Proveedor;

class ProveedorSeeder extends Seeder
{
    public function run()
    {
        Proveedor::create([
            'nombre' => 'Proveedor A',
            'telefono' => '123456789',
            'direccion' => 'Calle 123, Ciudad A',
        ]);

        Proveedor::create([
            'nombre' => 'Proveedor B',
            'telefono' => '987654321',
            'direccion' => 'Avenida 456, Ciudad B',
        ]);
    }
}
