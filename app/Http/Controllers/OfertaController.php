<?php

namespace App\Http\Controllers;

use App\Models\Oferta;
use App\Models\OfertaDetalle;
use App\Models\Produccion;
use Illuminate\Http\Request;

class OfertaController extends Controller
{
    // Listar todas las ofertas
    public function index()
    {
        return response()->json(Oferta::with('detalles')->get());
    }

    // Crear una nueva oferta
    public function store(Request $request)
    {
        $request->validate([
            'id_produccion' => 'required|exists:produccions,id',
            'id_agricultor' => 'required|exists:agricultors,id',
            'precio_oferta' => 'required|numeric|min:0',
            'cantidad_oferta' => 'required|numeric|min:1',
        ]);

        // Verificar la cantidad disponible en la producción
        $produccion = Produccion::findOrFail($request->id_produccion);
        if ($request->cantidad_oferta > $produccion->cantidad_disponible) {
            return response()->json(['message' => 'Cantidad de oferta supera la cantidad disponible en producción'], 400);
        }

        // Crear la oferta
        $oferta = Oferta::create($request->all());

        // Calcular el precio unitario
        $precio_unitario = $request->precio_oferta / $request->cantidad_oferta;

        // Crear el detalle de oferta
        OfertaDetalle::create([
            'id_oferta' => $oferta->id,
            'id_producto' => $produccion->id_producto,
            'cantidad_disponible' => $request->cantidad_oferta,
            'precio_unitario' => $precio_unitario,
            'fecha_disponible' => $request->fecha_disponible ?? now(),
            'estado_detalle' => 'activo',
            'unidad_medida' => $request->unidad_medida ?? 'unidad',
        ]);

        // Reducir la cantidad en producción
        $produccion->decrement('cantidad_disponible', $request->cantidad_oferta);

        return response()->json($oferta->load('detalles'), 201);
    }

    // Mostrar una oferta específica
    public function show($id)
    {
        $oferta = Oferta::with('detalles')->find($id);
        if (!$oferta) {
            return response()->json(['message' => 'Oferta no encontrada'], 404);
        }
        return response()->json($oferta);
    }

    // Actualizar una oferta
    public function update(Request $request, $id)
    {
        // Aquí se implementaría la lógica de actualización
    }

    // Eliminar una oferta
    public function destroy($id)
    {
        $oferta = Oferta::find($id);
        if (!$oferta) {
            return response()->json(['message' => 'Oferta no encontrada'], 404);
        }

        $oferta->delete();
        return response()->json(['message' => 'Oferta eliminada']);
    }
}
