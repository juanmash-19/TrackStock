<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Venta;

class VentaSeeder extends Seeder
{
    public function run()
    {
        Venta::create([
            'id_usuario' => 1,
            'id_producto' => 2,
            'cantidad' => 3,
            'total' => 59.97,
        ]);

        Venta::create([
            'id_usuario' => 2,
            'id_producto' => 1,
            'cantidad' => 1,
            'total' => 299.99,
        ]);

        Venta::create([
            'id_usuario' => 3,
            'id_producto' => 3,
            'cantidad' => 10,
            'total' => 19.90,
        ]);
    }
}
