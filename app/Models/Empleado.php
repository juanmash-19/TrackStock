<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    use HasFactory;

    protected $table = 'empleados';

<<<<<<< HEAD
=======
    protected $fillable = [
        'nombre',
        'correo',
        'id_usuario',
        'id_sucursal',
        'cedula',
    ];

    // Relación con el modelo Usuario
    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'id_usuario');
    }

    // Relación con el modelo Sucursal
>>>>>>> 7541de6 (Subiendo la version final)
    public function sucursal()
    {
        return $this->belongsTo(Sucursal::class, 'id_sucursal');
    }
}
