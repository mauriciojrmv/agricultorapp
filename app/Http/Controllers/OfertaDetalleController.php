<?php

namespace App\Http\Controllers;

use App\Models\OfertaDetalle;
use Illuminate\Http\Request;

class OfertaDetalleController extends Controller
{
    // Listar todos los detalles de ofertas
    public function index()
    {
        return response()->json(OfertaDetalle::with(['oferta', 'producto'])->get());
    }

    // Crear un nuevo detalle de oferta
    public function store(Request $request)
    {
        $request->validate([
            'id_oferta' => 'required|integer|exists:ofertas,id',
            'id_producto' => 'required|integer|exists:productos,id',
            'cantidad_disponible' => 'required|numeric|min:0',
            'precio_unitario' => 'required|numeric|min:0',
            'fecha_disponible' => 'required|date',
            'estado_detalle' => 'required|string|max:50',
        ]);

        // Crear el detalle de oferta
        $ofertaDetalle = OfertaDetalle::create($request->all());

        return response()->json($ofertaDetalle, 201);
    }

    // Mostrar un detalle de oferta específico
    public function show($id)
    {
        $ofertaDetalle = OfertaDetalle::with(['oferta', 'producto'])->find($id);

        if (!$ofertaDetalle) {
            return response()->json(['message' => 'Detalle de oferta no encontrado'], 404);
        }

        return response()->json($ofertaDetalle);
    }

    // Actualizar un detalle de oferta existente
    public function update(Request $request, $id)
    {
        $ofertaDetalle = OfertaDetalle::find($id);

        if (!$ofertaDetalle) {
            return response()->json(['message' => 'Detalle de oferta no encontrado'], 404);
        }

        $request->validate([
            'id_oferta' => 'integer|exists:ofertas,id',
            'id_producto' => 'integer|exists:productos,id',
            'cantidad_disponible' => 'numeric|min:0',
            'precio_unitario' => 'numeric|min:0',
            'fecha_disponible' => 'date',
            'estado_detalle' => 'string|max:50',
        ]);

        $ofertaDetalle->update($request->all());

        return response()->json($ofertaDetalle);
    }

    // Eliminar un detalle de oferta
    public function destroy($id)
    {
        $ofertaDetalle = OfertaDetalle::find($id);

        if (!$ofertaDetalle) {
            return response()->json(['message' => 'Detalle de oferta no encontrado'], 404);
        }

        $ofertaDetalle->delete();

        return response()->json(['message' => 'Detalle de oferta eliminado']);
    }
}
