<?php

namespace Database\Factories;

use App\Models\Usuario;
use Illuminate\Database\Eloquent\Factories\Factory;

class UsuarioFactory extends Factory
{
    protected $model = Usuario::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre_usuario' => $this->faker->userName(),
            'correo' => $this->faker->unique()->safeEmail(),
            'contraseña' => bcrypt('password123'),  // Se puede ajustar para generar contraseñas aleatorias si es necesario
            'rol' => $this->faker->randomElement(['admin', 'empleado', 'cliente']),
            'id_cliente' => \App\Models\Cliente::inRandomOrder()->first()->id ?? null,  // Relación con Cliente
            'id_empleado' => \App\Models\Empleado::inRandomOrder()->first()->id ?? null,  // Relación con Empleado
        ];
    }
}
