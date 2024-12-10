<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    public function index()
    {
        return Categoria::all();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
        ]);

        $categoria = Categoria::create($validated);

        return response()->json($categoria, 201);
    }

    public function show($id)
    {
        return Categoria::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nombre' => 'string|max:255',
            'descripcion' => 'nullable|string',
        ]);

        $categoria = Categoria::findOrFail($id);

        $categoria->update($validated);

        return response()->json($categoria);
    }

    public function destroy($id)
    {
        Categoria::destroy($id);
        
        return response()->json(['message' => 'Categoría eliminada']);
    }
}
