<?php

namespace App\Http\Controllers;

use App\Models\Venta;
use Illuminate\Http\Request;

class VentaController extends Controller
{
    public function index()
    {
        return Venta::with(['usuario', 'producto'])->get();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_usuario' => 'required|exists:usuarios,id',
            'id_producto' => 'required|exists:productos,id',
            'cantidad' => 'required|integer|min:1',
            'total' => 'required|numeric',
        ]);

        $venta = Venta::create($validated);

        return response()->json($venta, 201);
    }

    public function show($id)
    {
        return Venta::with(['usuario', 'producto'])->findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'id_usuario' => 'exists:usuarios,id',
            'id_producto' => 'exists:productos,id',
            'cantidad' => 'integer|min:1',
            'total' => 'numeric',
        ]);

        $venta = Venta::findOrFail($id);
        $venta->update($validated);

        return response()->json($venta);
    }

    public function destroy($id)
    {
        Venta::destroy($id);

        return response()->json(['message' => 'Venta eliminada']);
    }
}
