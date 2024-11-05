<?php

namespace App\Http\Controllers;

use App\Models\PedidoDetalle;
use Illuminate\Http\Request;

class PedidoDetalleController extends Controller
{
    // Listar todos los detalles de los pedidos
    public function index()
    {
        return response()->json(PedidoDetalle::with(['pedido', 'producto', 'unidadPeso'])->get());
    }

    // Crear un nuevo detalle de pedido
    public function store(Request $request)
    {
        $request->validate([
            'id_pedido' => 'required|integer|exists:pedidos,id',
            'id_producto' => 'required|integer|exists:productos,id',
            'cantidad' => 'required|numeric|min:1',
            'id_unidad_peso' => 'required|integer|exists:unidad_pesos,id',
            'cantidad_convertida_a_kg' => 'required|numeric|min:0',
            'precio_unitario' => 'required|numeric|min:0',
        ]);

        $detalle = PedidoDetalle::create($request->all());

        return response()->json($detalle, 201);
    }

    // Mostrar un detalle de pedido específico
    public function show($id)
    {
        $detalle = PedidoDetalle::with(['pedido', 'producto', 'unidadPeso'])->find($id);

        if (!$detalle) {
            return response()->json(['message' => 'Detalle de pedido no encontrado'], 404);
        }

        return response()->json($detalle);
    }

    // Actualizar un detalle de pedido existente
    public function update(Request $request, $id)
    {
        $detalle = PedidoDetalle::find($id);

        if (!$detalle) {
            return response()->json(['message' => 'Detalle de pedido no encontrado'], 404);
        }

        $request->validate([
            'id_pedido' => 'integer|exists:pedidos,id',
            'id_producto' => 'integer|exists:productos,id',
            'cantidad' => 'numeric|min:1',
            'id_unidad_peso' => 'integer|exists:unidad_pesos,id',
            'cantidad_convertida_a_kg' => 'numeric|min:0',
            'precio_unitario' => 'numeric|min:0',
        ]);

        $detalle->update($request->all());

        return response()->json($detalle);
    }

    // Eliminar un detalle de pedido
    public function destroy($id)
    {
        $detalle = PedidoDetalle::find($id);

        if (!$detalle) {
            return response()->json(['message' => 'Detalle de pedido no encontrado'], 404);
        }

        $detalle->delete();

        return response()->json(['message' => 'Detalle de pedido eliminado']);
    }
}
