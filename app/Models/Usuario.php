<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre_usuario', 
        'correo', 
        'contraseña', 
        'rol', 
        'id_cliente', 
        'id_empleado'
    ];

    // Relación con Cliente (si aplica)
    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'id_cliente');
    }

    // Relación con Empleado (si aplica)
    public function empleado()
    {
        return $this->belongsTo(Empleado::class, 'id_empleado');
    }

    // Setea la contraseña de forma segura
    public function setContraseñaAttribute($value)
    {
        $this->attributes['contraseña'] = bcrypt($value);
    }
}
