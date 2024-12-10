<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'cedula',
        'correo',
        'telefono',
        'direccion',
    ];

    // Relación con el modelo Usuario
    public function usuario()
    {
        return $this->hasOne(Usuario::class);
    }
}
