<?php

namespace App\Http\Controllers;

use App\Models\PedidoProducto;
use Illuminate\Http\Request;

class PedidoProductoController extends Controller
{
    /**
     * Mostrar todos los registros de pedido_producto.
     */
    public function index()
    {
        return PedidoProducto::with(['pedido', 'producto'])->get();
    }

    /**
     * Crear un nuevo registro en pedido_producto.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_pedido' => 'required|exists:pedidos,id',
            'id_producto' => 'required|exists:productos,id',
            'cantidad' => 'required|integer|min:1',
        ]);

        $pedidoProducto = PedidoProducto::create($validated);

        return response()->json($pedidoProducto, 201);
    }

    /**
     * Mostrar un registro específico de pedido_producto.
     */
    public function show($id_pedido, $id_producto)
    {
        $pedidoProducto = PedidoProducto::where('id_pedido', $id_pedido)
            ->where('id_producto', $id_producto)
            ->with(['pedido', 'producto'])
            ->firstOrFail();

        return response()->json($pedidoProducto);
    }

    /**
     * Actualizar un registro específico de pedido_producto.
     */
    public function update(Request $request, $id_pedido, $id_producto)
    {
        $validated = $request->validate([
            'cantidad' => 'required|integer|min:1',
        ]);

        $pedidoProducto = PedidoProducto::where('id_pedido', $id_pedido)
            ->where('id_producto', $id_producto)
            ->firstOrFail();

        $pedidoProducto->update($validated);

        return response()->json($pedidoProducto);
    }

    /**
     * Eliminar un registro específico de pedido_producto.
     */
    public function destroy($id_pedido, $id_producto)
    {
        $pedidoProducto = PedidoProducto::where('id_pedido', $id_pedido)
            ->where('id_producto', $id_producto)
            ->firstOrFail();

        $pedidoProducto->delete();

        return response()->json(['message' => 'Relación eliminada']);
    }
}
