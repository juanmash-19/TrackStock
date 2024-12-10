<?php

namespace App\Http\Controllers;

use App\Models\Proveedor;
use Illuminate\Http\Request;

class ProveedorController extends Controller
{
    public function index()
    {
        // Obtiene todos los proveedores
        return Proveedor::all();
    }

    public function store(Request $request)
    {
        // Valida los datos recibidos
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'telefono' => 'nullable|string|max:20',
            'direccion' => 'nullable|string',
        ]);

        // Crea un nuevo proveedor
        $proveedor = Proveedor::create($validated);

        return response()->json($proveedor, 201);
    }

    public function show($id)
    {
        // Muestra un proveedor específico
        return Proveedor::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        // Valida los datos recibidos
        $validated = $request->validate([
            'nombre' => 'string|max:255',
            'telefono' => 'nullable|string|max:20',
            'direccion' => 'nullable|string',
        ]);

        // Encuentra al proveedor y actualiza sus datos
        $proveedor = Proveedor::findOrFail($id);
        $proveedor->update($validated);

        return response()->json($proveedor);
    }

    public function destroy($id)
    {
        // Elimina un proveedor
        Proveedor::destroy($id);

        return response()->json(['message' => 'Proveedor eliminado']);
    }
}
