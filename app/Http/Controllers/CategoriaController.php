<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    // Listar todas las categorías
    public function index()
    {
        return response()->json(Categoria::all());
    }

    // Crear una nueva categoría
    public function store(Request $request)
    {
        try {
            $request->validate([
                'nombre' => 'required|string|max:255',
            ]);

            $categoria = Categoria::create($request->all());
            return response()->json($categoria, 201);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    // Mostrar una categoría específica
    public function show($id)
    {
        $categoria = Categoria::find($id);

        if (!$categoria) {
            return response()->json(['message' => 'Categoría no encontrada'], 404);
        }

        return response()->json($categoria);
    }

    // Actualizar una categoría existente
    public function update(Request $request, $id)
    {
        try {
            $categoria = Categoria::find($id);

            if (!$categoria) {
                return response()->json(['message' => 'Categoría no encontrada'], 404);
            }

            $request->validate([
                'nombre' => 'string|max:255',
            ]);

            $categoria->update($request->all());
            return response()->json($categoria);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    // Eliminar una categoría
    public function destroy($id)
    {
        try {
            $categoria = Categoria::find($id);

            if (!$categoria) {
                return response()->json(['message' => 'Categoría no encontrada'], 404);
            }

            $categoria->delete();
            return response()->json(['message' => 'Categoría eliminada']);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
