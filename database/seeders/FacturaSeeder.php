<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Factura;

class FacturaSeeder extends Seeder
{
    public function run()
    {
        Factura::create([
            'precio_unitario' => 100.50,
            'precio_total' => 200.00,
        ]);

        Factura::create([
            'precio_unitario' => 150.75,
            'precio_total' => 300.00,
        ]);
    }
}
