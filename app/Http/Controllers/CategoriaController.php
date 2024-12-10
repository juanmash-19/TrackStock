<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function index()
    {
        return Producto::with('categoria')->get();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:150',
            'precio' => 'required|numeric',
            'descripcion' => 'nullable|string',
            'id_categoria' => 'required|exists:categorias,id',
        ]);

        $producto = Producto::create($validated);

        return response()->json($producto, 201);
    }

    public function show($id)
    {
        return Producto::with('categoria')->findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nombre' => 'string|max:150',
            'precio' => 'numeric',
            'descripcion' => 'nullable|string',
            'id_categoria' => 'exists:categorias,id',
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
