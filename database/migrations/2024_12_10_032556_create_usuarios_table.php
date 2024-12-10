<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_usuario');
            $table->string('correo')->unique();
            $table->string('contraseña');
            $table->enum('rol', ['admin', 'empleado', 'cliente'])->default('cliente');
            $table->foreignId('id_cliente')->nullable()->constrained('clientes')->onDelete('cascade');
            $table->foreignId('id_empleado')->nullable()->constrained('empleados')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuarios');
    }
};
