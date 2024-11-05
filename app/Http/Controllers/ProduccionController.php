<?php

namespace App\Http\Controllers;

use App\Models\Produccion;
use App\Models\UnidadPeso;
use Illuminate\Http\Request;

class ProduccionController extends Controller
{
    // Listar todas las producciones
    public function index()
    {
        return response()->json(Produccion::with(['terreno', 'temporada', 'producto', 'unidadPeso'])->get());
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
            'id_unidad_peso' => 'nullable|exists:unidad_pesos,id',
        ]);

        // Obtener el factor de conversión
        $unidadPeso = UnidadPeso::find($request->id_unidad_peso);
        $cantidad_convertida_a_kg = $request->cantidad_disponible * ($unidadPeso ? $unidadPeso->factor_conversion_a_kg : 1);

        // Crear la producción
        $produccion = Produccion::create([
            'id_terreno' => $request->id_terreno,
            'id_temporada' => $request->id_temporada,
            'id_producto' => $request->id_producto,
            'cantidad_disponible' => $request->cantidad_disponible,
            'fecha_recoleccion' => $request->fecha_recoleccion,
            'id_unidad_peso' => $request->id_unidad_peso,
            'cantidad_convertida_a_kg' => $cantidad_convertida_a_kg, // Guardar cantidad convertida a kg
        ]);

        return response()->json($produccion, 201);
    }

    // Mostrar una producción específica
    public function show($id)
    {
        $produccion = Produccion::with(['terreno', 'temporada', 'producto', 'unidadPeso'])->find($id);

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
            'id_terreno' => 'nullable|exists:terrenos,id',
            'id_temporada' => 'nullable|exists:temporadas,id',
            'id_producto' => 'nullable|exists:productos,id',
            'cantidad_disponible' => 'nullable|numeric|min:0',
            'fecha_recoleccion' => 'nullable|date',
            'id_unidad_peso' => 'nullable|exists:unidad_pesos,id',
        ]);

        // Obtener el factor de conversión
        $unidadPeso = UnidadPeso::find($request->id_unidad_peso);
        $cantidad_convertida_a_kg = $request->cantidad_disponible * ($unidadPeso ? $unidadPeso->factor_conversion_a_kg : 1);

        // Actualizar los campos necesarios
        $produccion->update([
            'id_terreno' => $request->id_terreno,
            'id_temporada' => $request->id_temporada,
            'id_producto' => $request->id_producto,
            'cantidad_disponible' => $request->cantidad_disponible,
            'fecha_recoleccion' => $request->fecha_recoleccion,
            'id_unidad_peso' => $request->id_unidad_peso,
            'cantidad_convertida_a_kg' => $cantidad_convertida_a_kg, // Actualizar cantidad convertida a kg
        ]);

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

