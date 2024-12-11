<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sucursal extends Model
{
    use HasFactory;

<<<<<<< HEAD
=======
    protected $table = 'sucursales';

>>>>>>> 7541de6 (Subiendo la version final)
    protected $fillable = [
        'nombre',
        'direccion',
        'telefono',
    ];
}
