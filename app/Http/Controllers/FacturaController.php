<?php

namespace App\Http\Controllers;

use App\Models\Factura;
use Illuminate\Http\Request;

class FacturaController extends Controller
{
    public function index()
    {
        return Factura::all();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'precio_unitario' => 'required|numeric|min:0.01',
            'precio_total' => 'required|numeric|min:0.01',
        ]);

        $factura = Factura::create($validated);

        return response()->json($factura, 201);
    }

    public function show($id)
    {
        return Factura::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'precio_unitario' => 'numeric|min:0.01',
            'precio_total' => 'numeric|min:0.01',
        ]);

        $factura = Factura::findOrFail($id);
        $factura->update($validated);

        return response()->json($factura);
    }

    public function destroy($id)
    {
        Factura::destroy($id);

        return response()->json(['message' => 'Factura eliminada']);
    }
}
