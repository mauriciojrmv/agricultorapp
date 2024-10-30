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
            'descripcion' => 'required|string|max:255',
            'ubicacion' => 'required|string|max:500',
            'area' => 'required|numeric|min:0'
        ]);

        $terreno = Terreno::create($request->all());

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
            'descripcion' => 'string|max:255',
            'ubicacion' => 'string|max:500',
            'area' => 'numeric|min:0'
        ]);

        $terreno->update($request->all());

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
