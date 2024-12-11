<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
<<<<<<< HEAD
=======
use App\Models\Empleado;
>>>>>>> 7541de6 (Subiendo la version final)
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
<<<<<<< HEAD
    public function index()
    {
        return Usuario::all();
    }

=======
    // Listar todos los usuarios
    public function index()
    {
        return response()->json(Usuario::all(), 200);
    }

    // Crear un nuevo usuario
>>>>>>> 7541de6 (Subiendo la version final)
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre_usuario' => 'required|string|max:255',
            'correo' => 'required|email|unique:usuarios',
            'contraseña' => 'required|string|min:8',
            'rol' => 'required|in:admin,empleado,cliente',
            'id_cliente' => 'nullable|exists:clientes,id',
<<<<<<< HEAD
            'id_empleado' => 'nullable|exists:empleados,id',
        ]);

        $usuario = Usuario::create($validated);

        return response()->json($usuario, 201);
    }

    public function show($id)
    {
        return Usuario::findOrFail($id);
    }

=======
            'cedula' => 'required_if:rol,empleado|string|max:20',
        ]);

        // Crear el usuario
        $usuario = Usuario::create($validated);

        // Si el rol es "empleado", crea un registro en empleados
        if ($validated['rol'] === 'empleado') {
            $empleado = Empleado::create([
                'nombre' => $usuario->nombre_usuario,
                'correo' => $usuario->correo,
                'id_usuario' => $usuario->id,
                'cedula' => $validated['cedula'],
            ]);

            // Actualizar el usuario con el id_empleado
            $usuario->update(['id_empleado' => $empleado->id]);
        }

        return response()->json($usuario, 201);
    }

    // Mostrar un usuario por ID
    public function show($id)
    {
        $usuario = Usuario::findOrFail($id);
        return response()->json($usuario, 200);
    }

    // Actualizar un usuario por ID
>>>>>>> 7541de6 (Subiendo la version final)
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nombre_usuario' => 'string|max:255',
            'correo' => 'email|unique:usuarios,correo,' . $id,
            'contraseña' => 'string|min:8',
            'rol' => 'in:admin,empleado,cliente',
            'id_cliente' => 'nullable|exists:clientes,id',
<<<<<<< HEAD
            'id_empleado' => 'nullable|exists:empleados,id',
=======
>>>>>>> 7541de6 (Subiendo la version final)
        ]);

        $usuario = Usuario::findOrFail($id);
        $usuario->update($validated);

<<<<<<< HEAD
        return response()->json($usuario);
    }

    public function destroy($id)
    {
        $usuario = Usuario::findOrFail($id);
=======
        return response()->json($usuario, 200);
    }

    // Eliminar un usuario por ID
    public function destroy($id)
    {
        $usuario = Usuario::findOrFail($id);

        // Si el usuario tiene un rol de empleado, elimina también el registro asociado en empleados
        if ($usuario->rol === 'empleado' && $usuario->id_empleado) {
            Empleado::where('id', $usuario->id_empleado)->delete();
        }

>>>>>>> 7541de6 (Subiendo la version final)
        $usuario->delete();

        return response()->json(['message' => 'Usuario eliminado con éxito'], 200);
    }
}
