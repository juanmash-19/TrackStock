<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    // Mostrar todas las categorías
    public function index()
    {
        return Categoria::all(); // Devuelve todas las categorías
    }

    // Crear una nueva categoría
    public function store(Request $request)
    {
        // Validación de los datos de entrada
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
        ]);

        // Crear la categoría en la base de datos
        $categoria = Categoria::create($validated);

        // Responder con la categoría recién creada
        return response()->json($categoria, 201);
    }

    // Mostrar una categoría específica
    public function show($id)
    {
        // Encontrar una categoría por su ID o fallar
        return Categoria::findOrFail($id);
    }

    // Actualizar una categoría existente
    public function update(Request $request, $id)
    {
        // Validación de los datos de entrada
        $validated = $request->validate([
            'nombre' => 'string|max:255',
            'descripcion' => 'nullable|string',
        ]);

        // Buscar la categoría por ID
        $categoria = Categoria::findOrFail($id);

        // Actualizar la categoría
        $categoria->update($validated);

        // Responder con la categoría actualizada
        return response()->json($categoria);
    }

    // Eliminar una categoría
    public function destroy($id)
    {
        // Eliminar la categoría por ID
        Categoria::destroy($id);

        // Responder con un mensaje de éxito
        return response()->json(['message' => 'Categoría eliminada']);
    }
}
