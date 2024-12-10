<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;

    protected $table = 'usuarios';  // Asegúrate de que apunte a 'usuarios'

    protected $fillable = [
        'nombre_usuario', 'correo', 'contraseña', 'rol', 'id_cliente', 'id_empleado'
    ];
}
