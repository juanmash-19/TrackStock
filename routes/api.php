<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;

// Rutas no protegidas por autenticación (para pruebas)
Route::prefix('usuarios')->group(function () {
    // Obtener todos los usuarios
    Route::get('/', [UsuarioController::class, 'index']);

    // Crear un nuevo usuario
    Route::post('/', [UsuarioController::class, 'store']);

    // Obtener un usuario específico
    Route::get('/{id}', [UsuarioController::class, 'show']);

    // Actualizar un usuario
    Route::put('/{id}', [UsuarioController::class, 'update']);

    // Eliminar un usuario
    Route::delete('/{id}', [UsuarioController::class, 'destroy']);
});

// Ruta de ejemplo para obtener el usuario autenticado (requiere token de autenticación)
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum'); // Aquí está el middleware de autenticación comentado

