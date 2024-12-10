<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function index()
    {
        // Obtiene todos los clientes
        return Cliente::all();
    }

    public function store(Request $request)
    {
        // Valida los datos recibidos
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'cedula' => 'required|string|max:15|unique:clientes',
            'correo' => 'required|email|unique:clientes',
            'telefono' => 'nullable|string|max:20',
            'direccion' => 'nullable|string',
        ]);

        // Crea un nuevo cliente
        $cliente = Cliente::create($validated);

        return response()->json($cliente, 201);
    }

    public function show($id)
    {
        // Muestra un cliente específico
        return Cliente::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        // Valida los datos recibidos
        $validated = $request->validate([
            'nombre' => 'string|max:255',
            'cedula' => 'string|max:15|unique:clientes,cedula,' . $id,
            'correo' => 'email|unique:clientes,correo,' . $id,
            'telefono' => 'nullable|string|max:20',
            'direccion' => 'nullable|string',
        ]);

        // Encuentra al cliente y actualiza sus datos
        $cliente = Cliente::findOrFail($id);
        $cliente->update($validated);

        return response()->json($cliente);
    }

    public function destroy($id)
    {
        // Elimina un cliente
        Cliente::destroy($id);

        return response()->json(['message' => 'Cliente eliminado']);
    }
}
