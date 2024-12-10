<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\VentaProducto;

class VentaProductoSeeder extends Seeder
{
    public function run()
    {
        // Insertar datos de ejemplo en la tabla venta_producto
        VentaProducto::create([
            'id_venta' => 1,
            'id_producto' => 1,
            'cantidad' => 2,
        ]);

        VentaProducto::create([
            'id_venta' => 1,
            'id_producto' => 2,
            'cantidad' => 1,
        ]);
    }
}
