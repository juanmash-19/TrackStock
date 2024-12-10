<?php

namespace App\Http\Controllers;

use App\Models\Factura;
use Illuminate\Http\Request;

class FacturaController extends Controller
{
    public function index()
    {
        // Obtener todas las facturas
        return Factura::all();
    }

    public function store(Request $request)
    {
        // Validar los datos recibidos
        $validated = $request->validate([
            'precio_unitario' => 'required|numeric|min:0.01',
            'precio_total' => 'required|numeric|min:0.01',
        ]);

        // Crear una nueva factura
        $factura = Factura::create($validated);

        return response()->json($factura, 201);
    }

    public function show($id)
    {
        // Mostrar una factura específica
        return Factura::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        // Validar los datos recibidos
        $validated = $request->validate([
            'precio_unitario' => 'numeric|min:0.01',
            'precio_total' => 'numeric|min:0.01',
        ]);

        // Encontrar la factura y actualizarla
        $factura = Factura::findOrFail($id);
        $factura->update($validated);

        return response()->json($factura);
    }

    public function destroy($id)
    {
        // Eliminar una factura
        Factura::destroy($id);

        return response()->json(['message' => 'Factura eliminada']);
    }
}
