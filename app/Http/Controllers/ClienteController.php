<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function index()
    {
        return Cliente::all();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'cedula' => 'required|string|max:15|unique:clientes',
            'correo' => 'required|email|unique:clientes',
            'telefono' => 'nullable|string|max:20',
            'direccion' => 'nullable|string',
        ]);

        $cliente = Cliente::create($validated);

        return response()->json($cliente, 201);
    }

    public function show($id)
    {
        return Cliente::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nombre' => 'string|max:255',
            'cedula' => 'string|max:15|unique:clientes,cedula,' . $id,
            'correo' => 'email|unique:clientes,correo,' . $id,
            'telefono' => 'nullable|string|max:20',
            'direccion' => 'nullable|string',
        ]);

        $cliente = Cliente::findOrFail($id);
        $cliente->update($validated);

        return response()->json($cliente);
    }

    public function destroy($id)
    {
        Cliente::destroy($id);

        return response()->json(['message' => 'Cliente eliminado']);
    }
}
