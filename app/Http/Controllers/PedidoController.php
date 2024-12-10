<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use Illuminate\Http\Request;

class PedidoController extends Controller
{
    public function index()
    {
        // Obtener todos los pedidos
        return Pedido::with(['proveedor', 'factura'])->get();
    }

    public function store(Request $request)
    {
        // Validar los datos recibidos
        $validated = $request->validate([
            'id_proveedor' => 'required|exists:proveedores,id',
            'fecha' => 'required|date',
            'total' => 'required|numeric|min:0.01',
            'id_factura' => 'nullable|exists:facturas,id',
        ]);

        // Crear un nuevo pedido
        $pedido = Pedido::create($validated);

        return response()->json($pedido, 201);
    }

    public function show($id)
    {
        // Mostrar un pedido específico
        return Pedido::with(['proveedor', 'factura'])->findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        // Validar los datos recibidos
        $validated = $request->validate([
            'id_proveedor' => 'required|exists:proveedores,id',
            'fecha' => 'required|date',
            'total' => 'required|numeric|min:0.01',
            'id_factura' => 'nullable|exists:facturas,id',
        ]);

        // Encontrar el pedido y actualizarlo
        $pedido = Pedido::findOrFail($id);
        $pedido->update($validated);

        return response()->json($pedido);
    }

    public function destroy($id)
    {
        // Eliminar un pedido
        Pedido::destroy($id);

        return response()->json(['message' => 'Pedido eliminado']);
    }
}
