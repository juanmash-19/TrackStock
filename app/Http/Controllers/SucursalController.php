<?php

namespace App\Http\Controllers;

use App\Models\Sucursal;
use Illuminate\Http\Request;

class SucursalController extends Controller
{
    public function index()
    {
        return Sucursal::all();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:100',
            'direccion' => 'required|string',
            'telefono' => 'nullable|string|max:20',
        ]);

        $sucursal = Sucursal::create($validated);

        return response()->json($sucursal, 201);
    }

    public function show($id)
    {
        return Sucursal::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nombre' => 'string|max:100',
            'direccion' => 'string',
            'telefono' => 'nullable|string|max:20',
        ]);

        $sucursal = Sucursal::findOrFail($id);
        $sucursal->update($validated);

        return response()->json($sucursal);
    }

    public function destroy($id)
    {
        Sucursal::destroy($id);

        return response()->json(['message' => 'Sucursal eliminada']);
    }
}
