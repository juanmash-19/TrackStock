<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pedido;

class PedidoSeeder extends Seeder
{
    public function run()
    {
        // Insertar datos de ejemplo en la tabla pedidos
        Pedido::create([
            'id_proveedor' => 1,
            'fecha' => '2024-12-10',
            'total' => 1500.00,
            'id_factura' => 1,
        ]);

        Pedido::create([
            'id_proveedor' => 2,
            'fecha' => '2024-12-11',
            'total' => 2200.00,
            'id_factura' => 2,
        ]);
    }
}
