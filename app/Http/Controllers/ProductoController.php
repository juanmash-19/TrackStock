<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
<<<<<<< HEAD
    public function index()
    {
        return Producto::all();
    }

    public function store(Request $request)
=======
    /**
     * Muestra todos los productos.
     */
    public function index()
    {
        // Obtener todos los productos con sus relaciones
        return Producto::with(['categoria', 'sucursal'])->get();
    }

    /**
     * Almacena un nuevo producto.
     */
    public function store(Request $request)
<<<<<<< HEAD
    {
        // Validar datos de entrada
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'precio' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'id_categoria' => 'required|exists:categorias,id',
            'id_sucursal' => 'required|exists:sucursales,id',
        ]);

        // Crear el producto
        $producto = Producto::create($validated);

        // Respuesta JSON con código 201 (creado)
        return response()->json($producto, 201);
    }
=======
>>>>>>> 7541de6 (Subiendo la version final)
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
<<<<<<< HEAD

    public function show($id)
    {
        return Producto::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
=======
>>>>>>> 1b47ab46ab601f28ddfa62a0492be6a816f62625

    /**
     * Muestra un producto específico.
     */
    public function show($id)
    {
        // Buscar producto por ID con relaciones
        $producto = Producto::with(['categoria', 'sucursal'])->findOrFail($id);

        return response()->json($producto);
    }

    /**
     * Actualiza un producto existente.
     */
    public function update(Request $request, $id)
    {
        // Validar datos de entrada
>>>>>>> 7541de6 (Subiendo la version final)
        $validated = $request->validate([
            'nombre' => 'string|max:255',
            'descripcion' => 'nullable|string',
            'precio' => 'numeric|min:0',
            'stock' => 'integer|min:0',
<<<<<<< HEAD
        ]);

        $producto = Producto::findOrFail($id);
=======
            'id_categoria' => 'exists:categorias,id',
            'id_sucursal' => 'exists:sucursales,id',
        ]);

        // Buscar producto por ID
        $producto = Producto::findOrFail($id);

        // Actualizar el producto
>>>>>>> 7541de6 (Subiendo la version final)
        $producto->update($validated);

        return response()->json($producto);
    }

<<<<<<< HEAD
    public function destroy($id)
    {
        Producto::destroy($id);

        return response()->json(['message' => 'Producto eliminado']);
    }
}
=======
    public function searchByName($name)
    {
        $productos = Producto::with(['categoria', 'sucursal'])
                            ->where('nombre', 'like', '%' . $name . '%')
                            ->get();

        if ($productos->isEmpty()) {
            return response()->json(['message' => 'No se encontraron productos con ese nombre.'], 404);
        }

        return response()->json($productos);
    }

    /**
     * Elimina un producto.
     */
    public function destroy($id)
    {
        // Buscar y eliminar el producto
        $producto = Producto::findOrFail($id);
        $producto->delete();

        return response()->json(['message' => 'Producto eliminado'], 200);
    }
}
>>>>>>> 7541de6 (Subiendo la version final)
