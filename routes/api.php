<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VentaController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\SucursalController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\FacturaController;
use App\Http\Controllers\VentaProductoController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\PedidoProductoController;
use App\Http\Controllers\ProveedorProductoController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\UsuarioController;

// Rutas de Ventas
Route::get('/ventas', [VentaController::class, 'index']);
Route::post('/ventas', [VentaController::class, 'store']);
Route::get('/ventas/{id}', [VentaController::class, 'show']);
Route::put('/ventas/{id}', [VentaController::class, 'update']);
Route::delete('/ventas/{id}', [VentaController::class, 'destroy']);

// Rutas de Productos
Route::get('/productos', [ProductoController::class, 'index']);
Route::post('/productos', [ProductoController::class, 'store']);
Route::get('/productos/{id}', [ProductoController::class, 'show']);
Route::put('/productos/{id}', [ProductoController::class, 'update']);
Route::delete('/productos/{id}', [ProductoController::class, 'destroy']);

// Rutas de Sucursales
Route::get('/sucursales', [SucursalController::class, 'index']);
Route::post('/sucursales', [SucursalController::class, 'store']);
Route::get('/sucursales/{id}', [SucursalController::class, 'show']);
Route::put('/sucursales/{id}', [SucursalController::class, 'update']);
Route::delete('/sucursales/{id}', [SucursalController::class, 'destroy']);

// Rutas de Clientes
Route::get('/clientes', [ClienteController::class, 'index']);
Route::post('/clientes', [ClienteController::class, 'store']);
Route::get('/clientes/{id}', [ClienteController::class, 'show']);
Route::put('/clientes/{id}', [ClienteController::class, 'update']);
Route::delete('/clientes/{id}', [ClienteController::class, 'destroy']);

// Rutas de Proveedores
Route::get('/proveedores', [ProveedorController::class, 'index']);
Route::post('/proveedores', [ProveedorController::class, 'store']);
Route::get('/proveedores/{id}', [ProveedorController::class, 'show']);
Route::put('/proveedores/{id}', [ProveedorController::class, 'update']);
Route::delete('/proveedores/{id}', [ProveedorController::class, 'destroy']);

// Rutas de Facturas
Route::get('/facturas', [FacturaController::class, 'index']);
Route::post('/facturas', [FacturaController::class, 'store']);
Route::get('/facturas/{id}', [FacturaController::class, 'show']);
Route::put('/facturas/{id}', [FacturaController::class, 'update']);
Route::delete('/facturas/{id}', [FacturaController::class, 'destroy']);

// Rutas de VentaProducto
Route::get('/venta_producto', [VentaProductoController::class, 'index']);
Route::post('/venta_producto', [VentaProductoController::class, 'store']);
Route::get('/venta_producto/{id_venta}/{id_producto}', [VentaProductoController::class, 'show']);
Route::put('/venta_producto/{id_venta}/{id_producto}', [VentaProductoController::class, 'update']);
Route::delete('/venta_producto/{id_venta}/{id_producto}', [VentaProductoController::class, 'destroy']);

// Rutas de Pedidos
Route::get('/pedidos', [PedidoController::class, 'index']);
Route::post('/pedidos', [PedidoController::class, 'store']);
Route::get('/pedidos/{id}', [PedidoController::class, 'show']);
Route::put('/pedidos/{id}', [PedidoController::class, 'update']);
Route::delete('/pedidos/{id}', [PedidoController::class, 'destroy']);

// Rutas de PedidoProducto
Route::get('/pedido_producto', [PedidoProductoController::class, 'index']);
Route::post('/pedido_producto', [PedidoProductoController::class, 'store']);
Route::get('/pedido_producto/{id_pedido}/{id_producto}', [PedidoProductoController::class, 'show']);
Route::put('/pedido_producto/{id_pedido}/{id_producto}', [PedidoProductoController::class, 'update']);
Route::delete('/pedido_producto/{id_pedido}/{id_producto}', [PedidoProductoController::class, 'destroy']);

// Rutas de ProveedorProducto
Route::get('/proveedor_producto', [ProveedorProductoController::class, 'index']);
Route::post('/proveedor_producto', [ProveedorProductoController::class, 'store']);
Route::get('/proveedor_producto/{id_proveedor}/{id_producto}', [ProveedorProductoController::class, 'show']);
Route::put('/proveedor_producto/{id_proveedor}/{id_producto}', [ProveedorProductoController::class, 'update']);
Route::delete('/proveedor_producto/{id_proveedor}/{id_producto}', [ProveedorProductoController::class, 'destroy']);

// Rutas de Empleados
Route::get('/empleados', [EmpleadoController::class, 'index']);
Route::post('/empleados', [EmpleadoController::class, 'store']);
Route::get('/empleados/{id}', [EmpleadoController::class, 'show']);
Route::put('/empleados/{id}', [EmpleadoController::class, 'update']);
Route::delete('/empleados/{id}', [EmpleadoController::class, 'destroy']);

// Rutas de Usuarios
Route::prefix('usuarios')->group(function () {
    Route::get('/', [UsuarioController::class, 'index']);
    Route::post('/', [UsuarioController::class, 'store']);
    Route::get('/{id}', [UsuarioController::class, 'show']);
    Route::put('/{id}', [UsuarioController::class, 'update']);
    Route::delete('/{id}', [UsuarioController::class, 'destroy']);
});

// Ruta para obtener el usuario autenticado (requiere token de autenticación)
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
