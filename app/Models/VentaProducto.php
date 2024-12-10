<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VentaProducto extends Model
{
    use HasFactory;

    // Deshabilitar la gestión automática de timestamps, ya que no se usan en esta tabla.
    public $timestamps = false;

    protected $fillable = [
        'id_venta',
        'id_producto',
        'cantidad',
    ];

    // Relación con el modelo Venta
    public function venta()
    {
        return $this->belongsTo(Venta::class, 'id_venta');
    }

    // Relación con el modelo Producto
    public function producto()
    {
        return $this->belongsTo(Producto::class, 'id_producto');
    }
}
