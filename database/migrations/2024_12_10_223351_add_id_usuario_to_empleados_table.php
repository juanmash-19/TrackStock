<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIdUsuarioToEmpleadosTable extends Migration
{
    public function up()
    {
        Schema::table('empleados', function (Blueprint $table) {
            $table->unsignedBigInteger('id_usuario')->nullable()->after('correo');

            // Agregar clave foránea para asegurar integridad referencial
            $table->foreign('id_usuario')->references('id')->on('usuarios')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('empleados', function (Blueprint $table) {
            $table->dropForeign(['id_usuario']);
            $table->dropColumn('id_usuario');
        });
    }
}
