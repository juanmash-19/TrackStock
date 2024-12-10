<?php

namespace App\Http\Controllers;

use App\Models\VentaProducto;
use Illuminate\Http\Request;

class VentaProductoController extends Controller
{
    /**
     * Mostrar todos los productos vendidos en ventas.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Obtener todos los registros de la tabla `venta_producto` con relación a ventas y productos
        return VentaProducto::with(['venta', 'producto'])->get();
    }

    /**
     * Almacenar un nuevo producto vendido en una venta.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validación de los datos de entrada
        $validated = $request->validate([
            'id_venta' => 'required|exists:ventas,id',
            'id_producto' => 'required|exists:productos,id',
            'cantidad' => 'required|integer|min:1',
        ]);

        // Crear una nueva entrada en la tabla `venta_producto`
        $ventaProducto = VentaProducto::create($validated);

        // Retornar la respuesta con el producto de la venta recién creado
        return response()->json($ventaProducto, 201);
    }

    /**
     * Mostrar un producto vendido específico en una venta.
     *
     * @param  int  $id_venta
     * @param  int  $id_producto
     * @return \Illuminate\Http\Response
     */
    public function show($id_venta, $id_producto)
    {
        // Buscar el registro específico de `venta_producto` usando las claves foráneas
        $ventaProducto = VentaProducto::where('id_venta', $id_venta)
                                      ->where('id_producto', $id_producto)
                                      ->with(['venta', 'producto'])
                                      ->firstOrFail();

        return response()->json($ventaProducto);
    }

    /**
     * Actualizar la cantidad de un producto vendido en una venta.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id_venta
     * @param  int  $id_producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_venta, $id_producto)
    {
        // Validación de los datos de entrada
        $validated = $request->validate([
            'cantidad' => 'required|integer|min:1',
        ]);

        // Buscar el registro específico de `venta_producto`
        $ventaProducto = VentaProducto::where('id_venta', $id_venta)
                                      ->where('id_producto', $id_producto)
                                      ->firstOrFail();

        // Actualizar la cantidad
        $ventaProducto->update($validated);

        // Retornar la respuesta con el producto de la venta actualizado
        return response()->json($ventaProducto);
    }

    /**
     * Eliminar un producto vendido de una venta.
     *
     * @param  int  $id_venta
     * @param  int  $id_producto
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_venta, $id_producto)
    {
        // Buscar y eliminar el registro de `venta_producto`
        $ventaProducto = VentaProducto::where('id_venta', $id_venta)
                                      ->where('id_producto', $id_producto)
                                      ->firstOrFail();

        $ventaProducto->delete();

        // Retornar la respuesta de eliminación exitosa
        return response()->json(['message' => 'Producto de la venta eliminado']);
    }
}
