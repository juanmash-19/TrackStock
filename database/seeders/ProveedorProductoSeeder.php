<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ProveedorProducto;

class ProveedorProductoSeeder extends Seeder
{
    public function run()
    {
        ProveedorProducto::create([
            'id_proveedor' => 1,
            'id_producto' => 1,
        ]);

        ProveedorProducto::create([
            'id_proveedor' => 1,
            'id_producto' => 2,
        ]);
    }
}
