<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function index()
    {
        return Producto::all();
    }

    public function store(Request $request)
{
    $validated = $request->validate([
        'nombre' => 'required|string|max:255',
        'descripcion' => 'nullable|string',
        'precio' => 'required|numeric|min:0',
        'stock' => 'required|integer|min:0',
        'id_categoria' => 'required|exists:categorias,id',
        'id_sucursal' => 'required|exists:sucursales,id',
    ]);

    $producto = Producto::create($validated);

    return response()->json($producto, 201);
}

    public function show($id)
    {
        return Producto::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nombre' => 'string|max:255',
            'descripcion' => 'nullable|string',
            'precio' => 'numeric|min:0',
            'stock' => 'integer|min:0',
        ]);

        $producto = Producto::findOrFail($id);
        $producto->update($validated);

        return response()->json($producto);
    }

    public function destroy($id)
    {
        Producto::destroy($id);

        return response()->json(['message' => 'Producto eliminado']);
    }
}
