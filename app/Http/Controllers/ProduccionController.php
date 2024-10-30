<?php

namespace App\Http\Controllers;

use App\Models\Produccion;
use Illuminate\Http\Request;

class ProduccionController extends Controller
{
    // Listar todas las producciones
    public function index()
    {
        return response()->json(Produccion::with(['terreno', 'temporada', 'producto'])->get());
    }

    // Crear una nueva producción
    public function store(Request $request)
    {
        $request->validate([
            'id_terreno' => 'required|exists:terrenos,id',
            'id_temporada' => 'required|exists:temporadas,id',
            'id_producto' => 'required|exists:productos,id',
            'cantidad_disponible' => 'required|numeric|min:0',
            'fecha_recoleccion' => 'required|date',
        ]);

        $produccion = Produccion::create($request->all());

        return response()->json($produccion, 201);
    }

    // Mostrar una producción específica
    public function show($id)
    {
        $produccion = Produccion::with(['terreno', 'temporada', 'producto'])->find($id);

        if (!$produccion) {
            return response()->json(['message' => 'Producción no encontrada'], 404);
        }

        return response()->json($produccion);
    }

    // Actualizar una producción existente
    public function update(Request $request, $id)
    {
        $produccion = Produccion::find($id);

        if (!$produccion) {
            return response()->json(['message' => 'Producción no encontrada'], 404);
        }

        $request->validate([
            'id_terreno' => 'exists:terrenos,id',
            'id_temporada' => 'exists:temporadas,id',
            'id_producto' => 'exists:productos,id',
            'cantidad_disponible' => 'numeric|min:0',
            'fecha_recoleccion' => 'date',
        ]);

        $produccion->update($request->all());

        return response()->json($produccion);
    }

    // Eliminar una producción
    public function destroy($id)
    {
        $produccion = Produccion::find($id);

        if (!$produccion) {
            return response()->json(['message' => 'Producción no encontrada'], 404);
        }

        $produccion->delete();

        return response()->json(['message' => 'Producción eliminada']);
    }
}
