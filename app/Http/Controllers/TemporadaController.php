<?php

namespace App\Http\Controllers;

use App\Models\Temporada;
use Illuminate\Http\Request;

class TemporadaController extends Controller
{
    // Listar todas las temporadas
    public function index()
    {
        return response()->json(Temporada::all());
    }

    // Crear una nueva temporada
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string|max:500',
            'fecha_inicio' => 'required|date',
            'fecha_fin' => 'required|date|after_or_equal:fecha_inicio',
        ]);

        $temporada = Temporada::create($request->all());

        return response()->json($temporada, 201);
    }

    // Mostrar una temporada específica
    public function show($id)
    {
        $temporada = Temporada::find($id);

        if (!$temporada) {
            return response()->json(['message' => 'Temporada no encontrada'], 404);
        }

        return response()->json($temporada);
    }

    // Actualizar una temporada existente
    public function update(Request $request, $id)
    {
        $temporada = Temporada::find($id);

        if (!$temporada) {
            return response()->json(['message' => 'Temporada no encontrada'], 404);
        }

        $request->validate([
            'nombre' => 'string|max:255',
            'descripcion' => 'nullable|string|max:500',
            'fecha_inicio' => 'date',
            'fecha_fin' => 'date|after_or_equal:fecha_inicio',
        ]);

        $temporada->update($request->all());

        return response()->json($temporada);
    }

    // Eliminar una temporada
    public function destroy($id)
    {
        $temporada = Temporada::find($id);

        if (!$temporada) {
            return response()->json(['message' => 'Temporada no encontrada'], 404);
        }

        $temporada->delete();

        return response()->json(['message' => 'Temporada eliminada']);
    }
}
