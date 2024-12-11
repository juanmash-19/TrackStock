<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;

    protected $fillable = [
<<<<<<< HEAD
        'nombre_usuario', 
        'correo', 
        'contraseña', 
        'rol', 
        'id_cliente', 
        'id_empleado'
    ];

=======
        'nombre_usuario',
        'correo',
        'contraseña',
        'rol',
        'id_cliente',
        'id_empleado',
    ];

    // Relación con el modelo Cliente
>>>>>>> 7541de6 (Subiendo la version final)
    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'id_cliente');
    }

<<<<<<< HEAD
=======
    // Relación con el modelo Empleado
>>>>>>> 7541de6 (Subiendo la version final)
    public function empleado()
    {
        return $this->belongsTo(Empleado::class, 'id_empleado');
    }

<<<<<<< HEAD
=======
    // Mutador para encriptar la contraseña
>>>>>>> 7541de6 (Subiendo la version final)
    public function setContraseñaAttribute($value)
    {
        $this->attributes['contraseña'] = bcrypt($value);
    }
<<<<<<< HEAD
=======

    // Ocultar atributos sensibles al serializar
    protected $hidden = [
        'contraseña',
    ];
>>>>>>> 7541de6 (Subiendo la version final)
}
