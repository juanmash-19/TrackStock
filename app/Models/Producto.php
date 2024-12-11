<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'descripcion',
        'precio',
        'stock',
        'id_categoria',
        'id_sucursal',
    ];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'id_categoria');
    }

    public function sucursal()
    {
        return $this->belongsTo(Sucursal::class, 'id_sucursal');
    }

    public function ventas()
    {
        return $this->hasMany(Venta::class, 'id_producto');
    }
<<<<<<< HEAD
}

=======
<<<<<<< HEAD
}
=======
}

>>>>>>> 1b47ab46ab601f28ddfa62a0492be6a816f62625
>>>>>>> 7541de6 (Subiendo la version final)
