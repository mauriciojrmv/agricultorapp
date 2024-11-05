<?php

namespace App\Http\Controllers;

use App\Models\Agricultor;
use Illuminate\Http\Request;

class AgricultorController extends Controller
{
    // Listar todos los agricultores
    public function index()
    {
        return response()->json(Agricultor::all());
    }

    // Crear un nuevo agricultor
    public function store(Request $request)
    {
        try {
            $request->validate([
                'nombre' => 'required|string|max:255',
                'apellido' => 'required|string|max:255',
                'email' => 'required|email|unique:agricultors,email',
                'telefono' => 'required|string|max:15',
                'direccion' => 'nullable|string|max:255',
                'password' => 'required|string|max:255',
                'informacion_bancaria' => 'nullable|string|max:255',
                'nit' => 'required|string|unique:agricultors,nit',
                'carnet' => 'required|string|max:20',
                'licencia_funcionamiento' => 'nullable|string|max:255',
                'estado' => 'required|string|max:50',
            ]);

            $agricultor = Agricultor::create($request->all());
            return response()->json($agricultor, 201);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    // Mostrar un agricultor específico
    public function show($id)
    {
        $agricultor = Agricultor::find($id);

        if (!$agricultor) {
            return response()->json(['message' => 'Agricultor no encontrado'], 404);
        }

        return response()->json($agricultor);
    }

    // Actualizar un agricultor existente
    public function update(Request $request, $id)
    {
        try {
            $agricultor = Agricultor::find($id);

            if (!$agricultor) {
                return response()->json(['message' => 'Agricultor no encontrado'], 404);
            }

            $request->validate([
                'nombre' => 'string|max:255',
                'apellido' => 'string|max:255',
                'email' => 'email|unique:agricultors,email,' . $id,
                'telefono' => 'string|max:15',
                'direccion' => 'nullable|string|max:255',
                'informacion_bancaria' => 'nullable|string|max:255',
                'nit' => 'string|unique:agricultors,nit,' . $id,
                'carnet' => 'string|max:20',
                'licencia_funcionamiento' => 'nullable|string|max:255',
                'estado' => 'string|max:50',
            ]);

            $agricultor->update($request->all());

            return response()->json($agricultor);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    // Eliminar un agricultor
    public function destroy($id)
    {
        try {
            $agricultor = Agricultor::find($id);

            if (!$agricultor) {
                return response()->json(['message' => 'Agricultor no encontrado'], 404);
            }

            $agricultor->delete();

            return response()->json(['message' => 'Agricultor eliminado']);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
