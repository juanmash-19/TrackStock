<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function index()
    {
        // Obtiene todos los usuarios
        return Usuario::all();
    }

    public function store(Request $request)
    {
        // Valida los datos recibidos
        $validated = $request->validate([
            'nombre_usuario' => 'required|string|max:255',
            'correo' => 'required|email|unique:usuarios',
            'contraseña' => 'required|string|min:8',
            'rol' => 'required|in:admin,empleado,cliente',
            'id_cliente' => 'nullable|exists:clientes,id',
            'id_empleado' => 'nullable|exists:empleados,id',
        ]);

        // Crea un nuevo usuario
        $usuario = Usuario::create($validated);

        return response()->json($usuario, 201);
    }

    public function show($id)
    {
        // Muestra un usuario específico
        return Usuario::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        // Valida los datos recibidos
        $validated = $request->validate([
            'nombre_usuario' => 'string|max:255',
            'correo' => 'email|unique:usuarios,correo,' . $id,
            'contraseña' => 'string|min:8',
            'rol' => 'in:admin,empleado,cliente',
            'id_cliente' => 'nullable|exists:clientes,id',
            'id_empleado' => 'nullable|exists:empleados,id',
        ]);

        // Encuentra el usuario y actualiza sus datos
        $usuario = Usuario::findOrFail($id);
        $usuario->update($validated);

        return response()->json($usuario);
    }

    public function destroy($id)
    {
        // Elimina un usuario
        Usuario::destroy($id);

        return response()->json(['message' => 'Usuario eliminado']);
    }
}
