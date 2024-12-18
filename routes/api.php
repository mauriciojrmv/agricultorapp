<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AgricultorController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\TemporadaController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\TerrenoController;
use App\Http\Controllers\ProduccionController;
use App\Http\Controllers\OfertaController;
use App\Http\Controllers\OfertaDetalleController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\PedidoDetalleController;
use App\Http\Controllers\UnidadPesoController;
use App\Http\Controllers\CargaController;
use App\Http\Controllers\ConductorController;
use Illuminate\Http\Request;

// Definimos todas las rutas CRUD para el controlador de producciones
Route::apiResource('agricultores', AgricultorController::class);
Route::apiResource('categorias', CategoriaController::class);
Route::apiResource('clientes', ClienteController::class);
Route::apiResource('temporadas', TemporadaController::class);
Route::apiResource('productos', ProductoController::class);
Route::apiResource('terrenos', TerrenoController::class);
Route::apiResource('producciones', ProduccionController::class);
Route::apiResource('ofertas', OfertaController::class);
Route::apiResource('oferta_detalles', OfertaDetalleController::class);
Route::apiResource('pedidos', PedidoController::class);
Route::apiResource('pedido_detalles', PedidoDetalleController::class);
Route::apiResource('unidades_peso', UnidadPesoController::class);
route::apiResource('cargas', CargaController::class);
route::apiResource('conductores', ConductorController::class);

// Ruta de prueba para obtener el usuario autenticado (opcional)
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
