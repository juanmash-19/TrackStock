<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PedidoProducto;

class PedidoProductoSeeder extends Seeder
{
    public function run()
    {
        PedidoProducto::create([
            'id_pedido' => 1,
            'id_producto' => 1,
            'cantidad' => 5,
        ]);

        PedidoProducto::create([
            'id_pedido' => 1,
            'id_producto' => 2,
            'cantidad' => 10,
        ]);
    }
}
