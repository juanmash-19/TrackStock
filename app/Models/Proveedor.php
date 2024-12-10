<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'telefono',
        'direccion',
    ];

    // Relación con la tabla de productos o ventas si es necesario
    // Ejemplo: un proveedor puede tener muchos productos
    public function productos()
    {
        return $this->hasMany(Producto::class);
    }
}
