<?php

namespace App\Http\Controllers;

use App\Models\OfertaDetalle;
use Illuminate\Http\Request;

class OfertaDetalleController extends Controller
{
    // Listar todos los detalles de oferta
    public function index()
    {
        return response()->json(OfertaDetalle::all());
    }

    // Mostrar un detalle específico
    public function show($id)
    {
        $detalle = OfertaDetalle::find($id);
        if (!$detalle) {
            return response()->json(['message' => 'Detalle de oferta no encontrado'], 404);
        }
        return response()->json($detalle);
    }

    // Eliminar un detalle de oferta
    public function destroy($id)
    {
        $detalle = OfertaDetalle::find($id);
        if (!$detalle) {
            return response()->json(['message' => 'Detalle de oferta no encontrado'], 404);
        }
        $detalle->delete();
        return response()->json(['message' => 'Detalle de oferta eliminado']);
    }
}
