<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use Illuminate\Http\Request;

class PedidoController extends Controller
{
    public function index()
    {
        return Pedido::with(['proveedor', 'factura'])->get();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_proveedor' => 'required|exists:proveedores,id',
            'fecha' => 'required|date',
            'total' => 'required|numeric|min:0.01',
            'id_factura' => 'nullable|exists:facturas,id',
        ]);

        $pedido = Pedido::create($validated);

        return response()->json($pedido, 201);
    }

    public function show($id)
    {
        return Pedido::with(['proveedor', 'factura'])->findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'id_proveedor' => 'required|exists:proveedores,id',
            'fecha' => 'required|date',
            'total' => 'required|numeric|min:0.01',
            'id_factura' => 'nullable|exists:facturas,id',
        ]);

        $pedido = Pedido::findOrFail($id);
        $pedido->update($validated);

        return response()->json($pedido);
    }

    public function destroy($id)
    {
        Pedido::destroy($id);

        return response()->json(['message' => 'Pedido eliminado']);
    }
}
