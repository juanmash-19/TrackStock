<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empleado;

class EmpleadoController extends Controller
{
    // Listar todos los empleados
    public function index()
    {
        $empleados = Empleado::with('sucursal')->get();
        return response()->json($empleados);
    }

    // Crear un nuevo empleado
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'cedula' => 'required|string|max:255|unique:empleados,cedula',
            'correo' => 'nullable|email|max:255',
            'telefono' => 'nullable|string|max:20',
            'id_sucursal' => 'required|exists:sucursales,id',
        ]);

        $empleado = Empleado::create($validated);

        return response()->json(['message' => 'Empleado creado con éxito', 'empleado' => $empleado], 201);
    }

    // Mostrar un empleado específico
    public function show($id)
    {
        $empleado = Empleado::with('sucursal')->find($id);

        if (!$empleado) {
            return response()->json(['message' => 'Empleado no encontrado'], 404);
        }

        return response()->json($empleado);
    }

    // Actualizar un empleado existente
    public function update(Request $request, $id)
    {
        $empleado = Empleado::find($id);

        if (!$empleado) {
            return response()->json(['message' => 'Empleado no encontrado'], 404);
        }

        $validated = $request->validate([
            'nombre' => 'sometimes|string|max:255',
            'cedula' => 'sometimes|string|max:255|unique:empleados,cedula,' . $empleado->id,
            'correo' => 'nullable|email|max:255',
            'telefono' => 'nullable|string|max:20',
            'id_sucursal' => 'sometimes|exists:sucursales,id',
        ]);

        $empleado->update($validated);

        return response()->json(['message' => 'Empleado actualizado con éxito', 'empleado' => $empleado]);
    }

    // Eliminar un empleado
    public function destroy($id)
    {
        $empleado = Empleado::find($id);

        if (!$empleado) {
            return response()->json(['message' => 'Empleado no encontrado'], 404);
        }

        $empleado->delete();

        return response()->json(['message' => 'Empleado eliminado con éxito']);
    }
}
