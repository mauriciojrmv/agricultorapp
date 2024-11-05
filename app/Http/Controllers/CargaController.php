<?php

namespace App\Http\Controllers;

use App\Models\Carga;
use App\Models\Pedido;
use App\Models\PedidoDetalle;
use App\Models\OfertaDetalle;
use Illuminate\Http\Request;

class CargaController extends Controller
{
    // Listar todas las cargas
    public function index()
    {
        return response()->json(Carga::with(['pedidoDetalle', 'ofertaDetalle'])->get());
    }

    // Crear una nueva carga
    public function store(Request $request)
    {
        $request->validate([
            'id_pedido_detalle' => 'required|integer|exists:pedido_detalles,id',
            'id_oferta_detalle' => 'required|integer|exists:oferta_detalles,id',
            'cantidad_asignada' => 'required|numeric|min:1',
        ]);

        // Obtener los detalles del pedido y la oferta
        $pedidoDetalle = PedidoDetalle::findOrFail($request->id_pedido_detalle);
        $ofertaDetalle = OfertaDetalle::findOrFail($request->id_oferta_detalle);

        // Verificar que la cantidad asignada no exceda la cantidad disponible en la oferta
        if ($request->cantidad_asignada > $ofertaDetalle->cantidad_disponible) {
            return response()->json(['message' => 'Cantidad asignada excede la cantidad disponible en la oferta'], 400);
        }

        // Crear la carga
        $carga = Carga::create([
            'id_pedido_detalle' => $pedidoDetalle->id,
            'id_oferta_detalle' => $ofertaDetalle->id,
            'cantidad_asignada' => $request->cantidad_asignada,
            'estado_asignacion' => 'pendiente',
        ]);

        // Actualizar el estado del pedido a completado si es necesario
        $pedido = Pedido::findOrFail($pedidoDetalle->id_pedido);
        $pedido->update(['estado' => 'completado']);

        // Incrementar el stock comprometido en la oferta
        $ofertaDetalle->oferta->increment('stock_comprometido', $request->cantidad_asignada);

        return response()->json($carga, 201);
    }

    // Mostrar una carga específica
    public function show($id)
    {
        $carga = Carga::with(['pedidoDetalle', 'ofertaDetalle'])->find($id);
        if (!$carga) {
            return response()->json(['message' => 'Carga no encontrada'], 404);
        }
        return response()->json($carga);
    }

    // Actualizar una carga existente
    public function update(Request $request, $id)
    {
        $carga = Carga::find($id);
        if (!$carga) {
            return response()->json(['message' => 'Carga no encontrada'], 404);
        }

        $request->validate([
            'cantidad_asignada' => 'nullable|numeric|min:1',
            'estado_asignacion' => 'nullable|string',
        ]);

        $carga->update($request->all());

        return response()->json($carga);
    }

    // Eliminar una carga
    public function destroy($id)
    {
        $carga = Carga::find($id);
        if (!$carga) {
            return response()->json(['message' => 'Carga no encontrada'], 404);
        }

        $carga->delete();
        return response()->json(['message' => 'Carga eliminada']);
    }
}
