<?php

namespace App\Http\Controllers;

use App\Models\UnidadPeso;
use Illuminate\Http\Request;

class UnidadPesoController extends Controller
{
    // Listar todas las unidades de peso
    public function index()
    {
        return response()->json(UnidadPeso::all());
    }

    // Crear una nueva unidad de peso
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:50|unique:unidad_pesos,nombre',
            'factor_conversion_a_kg' => 'required|numeric',
        ]);

        $unidadPeso = UnidadPeso::create($request->all());

        return response()->json($unidadPeso, 201);
    }

    // Mostrar una unidad de peso específica
    public function show($id)
    {
        $unidadPeso = UnidadPeso::find($id);

        if (!$unidadPeso) {
            return response()->json(['message' => 'Unidad de peso no encontrada'], 404);
        }

        return response()->json($unidadPeso);
    }

    // Actualizar una unidad de peso existente
    public function update(Request $request, $id)
    {
        $unidadPeso = UnidadPeso::find($id);

        if (!$unidadPeso) {
            return response()->json(['message' => 'Unidad de peso no encontrada'], 404);
        }

        $request->validate([
            'nombre' => 'string|max:50|unique:unidad_pesos,nombre,' . $id,
            'factor_conversion_a_kg' => 'numeric',
        ]);

        $unidadPeso->update($request->all());

        return response()->json($unidadPeso);
    }

    // Eliminar una unidad de peso
    public function destroy($id)
    {
        $unidadPeso = UnidadPeso::find($id);

        if (!$unidadPeso) {
            return response()->json(['message' => 'Unidad de peso no encontrada'], 404);
        }

        $unidadPeso->delete();

        return response()->json(['message' => 'Unidad de peso eliminada']);
    }
}
