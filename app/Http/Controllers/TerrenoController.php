<?php

namespace App\Http\Controllers;

use App\Models\Terreno;
use Illuminate\Http\Request;

class TerrenoController extends Controller
{
    // Listar todos los terrenos
    public function index()
    {
        return response()->json(Terreno::all());
    }

    // Crear un nuevo terreno
    public function store(Request $request)
    {
        $request->validate([
            'id_agricultor' => 'required|integer|exists:agricultors,id',
            'ubicacion_latitud' => 'required|numeric',
            'ubicacion_longitud' => 'required|numeric',
            'area' => 'required|numeric|min:0',
            'superficie_total' => 'required|numeric|min:0',
            'descripcion' => 'nullable|string|max:255',
        ]);

        $terreno = Terreno::create([
            'id_agricultor' => $request->id_agricultor,
            'ubicacion_latitud' => $request->ubicacion_latitud,
            'ubicacion_longitud' => $request->ubicacion_longitud,
            'area' => $request->area,
            'superficie_total' => $request->superficie_total,
            'descripcion' => $request->descripcion,
        ]);

        return response()->json($terreno, 201);
    }

    // Mostrar un terreno específico
    public function show($id)
    {
        $terreno = Terreno::find($id);

        if (!$terreno) {
            return response()->json(['message' => 'Terreno no encontrado'], 404);
        }

        return response()->json($terreno);
    }

    // Actualizar un terreno existente
    public function update(Request $request, $id)
    {
        $terreno = Terreno::find($id);

        if (!$terreno) {
            return response()->json(['message' => 'Terreno no encontrado'], 404);
        }

        $request->validate([
            'id_agricultor' => 'integer|exists:agricultors,id',
            'ubicacion_latitud' => 'numeric',
            'ubicacion_longitud' => 'numeric',
            'area' => 'numeric|min:0',
            'superficie_total' => 'numeric|min:0',
            'descripcion' => 'nullable|string|max:255',
        ]);

        $terreno->update($request->only([
            'id_agricultor',
            'ubicacion_latitud',
            'ubicacion_longitud',
            'area',
            'superficie_total',
            'descripcion',
        ]));

        return response()->json($terreno);
    }

    // Eliminar un terreno
    public function destroy($id)
    {
        $terreno = Terreno::find($id);

        if (!$terreno) {
            return response()->json(['message' => 'Terreno no encontrado'], 404);
        }

        $terreno->delete();

        return response()->json(['message' => 'Terreno eliminado']);
    }
}
