<?php

namespace App\Http\Controllers;

use App\Models\Sucursal;
use Illuminate\Http\Request;

class SucursalController extends Controller
{
    public function index()
    {
        // Obtiene todas las sucursales
        return Sucursal::all();
    }

    public function store(Request $request)
    {
        // Valida los datos recibidos
        $validated = $request->validate([
            'nombre' => 'required|string|max:100',
            'direccion' => 'required|string',
            'telefono' => 'nullable|string|max:20',
        ]);

        // Crea una nueva sucursal
        $sucursal = Sucursal::create($validated);

        return response()->json($sucursal, 201);
    }

    public function show($id)
    {
        // Muestra una sucursal específica
        return Sucursal::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        // Valida los datos recibidos
        $validated = $request->validate([
            'nombre' => 'string|max:100',
            'direccion' => 'string',
            'telefono' => 'nullable|string|max:20',
        ]);

        // Encuentra la sucursal y actualiza sus datos
        $sucursal = Sucursal::findOrFail($id);
        $sucursal->update($validated);

        return response()->json($sucursal);
    }

    public function destroy($id)
    {
        // Elimina una sucursal
        Sucursal::destroy($id);

        return response()->json(['message' => 'Sucursal eliminada']);
    }
}
