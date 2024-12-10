<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_proveedor',
        'fecha',
        'total',
        'id_factura',
    ];

    // Relación con el modelo Proveedor
    public function proveedor()
    {
        return $this->belongsTo(Proveedor::class, 'id_proveedor');
    }

    // Relación con el modelo Factura
    public function factura()
    {
        return $this->belongsTo(Factura::class, 'id_factura');
    }
}
