<?php

namespace App\Http\Controllers;

use App\Models\Proveedor;
use Illuminate\Http\Request;

class ProveedorController extends Controller
{
    public function index()
    {
        return Proveedor::all();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'telefono' => 'nullable|string|max:20',
            'direccion' => 'nullable|string',
        ]);

        $proveedor = Proveedor::create($validated);

        return response()->json($proveedor, 201);
    }

    public function show($id)
    {
        return Proveedor::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nombre' => 'string|max:255',
            'telefono' => 'nullable|string|max:20',
            'direccion' => 'nullable|string',
        ]);

        $proveedor = Proveedor::findOrFail($id);
        $proveedor->update($validated);

        return response()->json($proveedor);
    }

    public function destroy($id)
    {
        Proveedor::destroy($id);

        return response()->json(['message' => 'Proveedor eliminado']);
    }
}
