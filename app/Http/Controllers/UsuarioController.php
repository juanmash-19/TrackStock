<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function index()
    {
        return Usuario::all();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre_usuario' => 'required|string|max:255',
            'correo' => 'required|email|unique:usuarios',
            'contraseña' => 'required|string|min:8',
            'rol' => 'required|in:admin,empleado,cliente',
            'id_cliente' => 'nullable|exists:clientes,id',
            'id_empleado' => 'nullable|exists:empleados,id',
        ]);

        $usuario = Usuario::create($validated);

        return response()->json($usuario, 201);
    }

    public function show($id)
    {
        return Usuario::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nombre_usuario' => 'string|max:255',
            'correo' => 'email|unique:usuarios,correo,' . $id,
            'contraseña' => 'string|min:8',
            'rol' => 'in:admin,empleado,cliente',
            'id_cliente' => 'nullable|exists:clientes,id',
            'id_empleado' => 'nullable|exists:empleados,id',
        ]);

        $usuario = Usuario::findOrFail($id);
        $usuario->update($validated);

        return response()->json($usuario);
    }

    public function destroy($id)
    {
        $usuario = Usuario::findOrFail($id);
        $usuario->delete();

        return response()->json(['message' => 'Usuario eliminado con éxito'], 200);
    }
}
