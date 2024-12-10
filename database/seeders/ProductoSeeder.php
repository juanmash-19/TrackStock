<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Producto;

class ProductoSeeder extends Seeder
{
    public function run()
    {
        Producto::create([
            'nombre' => 'Laptop Dell Inspiron',
            'descripcion' => 'Laptop de alta gama para trabajo y estudio',
            'precio' => 899.99,
            'stock' => 10,
        ]);

        Producto::create([
            'nombre' => 'Audífonos Sony WH-1000XM4',
            'descripcion' => 'Audífonos inalámbricos con cancelación de ruido',
            'precio' => 299.99,
            'stock' => 25,
        ]);

        Producto::create([
            'nombre' => 'Teclado Mecánico HyperX',
            'descripcion' => 'Teclado mecánico para gamers con iluminación RGB',
            'precio' => 129.99,
            'stock' => 15,
        ]);
    }
}
