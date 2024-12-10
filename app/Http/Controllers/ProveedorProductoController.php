<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProveedorProductoController extends Controller
{
    /**
     * Muestra todas las relaciones proveedor-producto.
     */
    public function index()
    {
        $relaciones = DB::table('proveedor_producto')->get();
        return response()->json($relaciones);
    }

    /**
     * Almacena una nueva relación proveedor-producto.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_proveedor' => 'required|exists:proveedores,id',
            'id_producto' => 'required|exists:productos,id',
        ]);

        DB::table('proveedor_producto')->insert([
            'id_proveedor' => $validated['id_proveedor'],
            'id_producto' => $validated['id_producto'],
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return response()->json(['message' => 'Relación creada con éxito'], 201);
    }

    /**
     * Muestra una relación específica entre proveedor y producto.
     */
    public function show($id_proveedor, $id_producto)
    {
        $relacion = DB::table('proveedor_producto')
            ->where('id_proveedor', $id_proveedor)
            ->where('id_producto', $id_producto)
            ->first();

        if (!$relacion) {
            return response()->json(['message' => 'Relación no encontrada'], 404);
        }

        return response()->json($relacion);
    }

    /**
     * Actualiza una relación específica entre proveedor y producto.
     */
    public function update(Request $request, $id_proveedor, $id_producto)
    {
        $validated = $request->validate([
            'id_proveedor' => 'required|exists:proveedores,id',
            'id_producto' => 'required|exists:productos,id',
        ]);

        $relacion = DB::table('proveedor_producto')
            ->where('id_proveedor', $id_proveedor)
            ->where('id_producto', $id_producto)
            ->update([
                'id_proveedor' => $validated['id_proveedor'],
                'id_producto' => $validated['id_producto'],
                'updated_at' => now(),
            ]);

        if (!$relacion) {
            return response()->json(['message' => 'Relación no encontrada o no actualizada'], 404);
        }

        return response()->json(['message' => 'Relación actualizada con éxito']);
    }

    /**
     * Elimina una relación específica entre proveedor y producto.
     */
    public function destroy($id_proveedor, $id_producto)
    {
        $deleted = DB::table('proveedor_producto')
            ->where('id_proveedor', $id_proveedor)
            ->where('id_producto', $id_producto)
            ->delete();

        if (!$deleted) {
            return response()->json(['message' => 'Relación no encontrada'], 404);
        }

        return response()->json(['message' => 'Relación eliminada con éxito']);
    }
}
