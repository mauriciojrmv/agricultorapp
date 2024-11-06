<?php

namespace App\Http\Controllers;

use App\Models\Conductor;
use Illuminate\Http\Request;

class ConductorController extends Controller
{
    // Listar todos los conductores
    public function index()
    {
        return response()->json(Conductor::all());
    }

    // Crear un nuevo conductor
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:100',
            'apellido' => 'required|string|max:100',
            'telefono' => 'required|string|max:20',
            'carnet' => 'required|string|max:20',
            'licencia_conducir' => 'required|string|max:50|unique:conductors',
            'fecha_nacimiento' => 'required|date',
            'direccion' => 'nullable|string|max:255',
            'email' => 'required|email|unique:conductors',
            'password' => 'required|string|min:6',
            // Hacemos que la validación para ubicación sea nullable
            'ubicacion_latitud' => 'nullable|numeric',
            'ubicacion_longitud' => 'nullable|numeric',
        ]);

        $conductor = Conductor::create([
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'telefono' => $request->telefono,
            'carnet' => $request->carnet,
            'licencia_conducir' => $request->licencia_conducir,
            'fecha_nacimiento' => $request->fecha_nacimiento,
            'direccion' => $request->direccion,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            // Asignar null por defecto si no se recibe en la solicitud
            'ubicacion_latitud' => $request->ubicacion_latitud ?? null,
            'ubicacion_longitud' => $request->ubicacion_longitud ?? null,
            'estado' => 'activo', // Asignar 'activo' como valor por defecto
        ]);

        return response()->json($conductor, 201);
    }

    // Mostrar un conductor específico
    public function show($id)
    {
        $conductor = Conductor::find($id);

        if (!$conductor) {
            return response()->json(['message' => 'Conductor no encontrado'], 404);
        }

        return response()->json($conductor);
    }

    // Actualizar un conductor existente
    public function update(Request $request, $id)
    {
        $conductor = Conductor::find($id);

        if (!$conductor) {
            return response()->json(['message' => 'Conductor no encontrado'], 404);
        }

        $request->validate([
            'nombre' => 'string|max:100',
            'apellido' => 'string|max:100',
            'telefono' => 'string|max:20',
            'carnet' => 'string|max:20',
            'licencia_conducir' => 'string|max:50|unique:conductors,licencia_conducir,' . $id,
            'fecha_nacimiento' => 'date',
            'direccion' => 'string|max:255',
            'email' => 'email|unique:conductors,email,' . $id,
            'password' => 'nullable|string|min:6',
            'ubicacion_latitud' => 'nullable|numeric',
            'ubicacion_longitud' => 'nullable|numeric',
        ]);

        // Actualizar los campos
        $conductor->update($request->all());

        return response()->json($conductor);
    }

    // Eliminar un conductor
    public function destroy($id)
    {
        $conductor = Conductor::find($id);

        if (!$conductor) {
            return response()->json(['message' => 'Conductor no encontrado'], 404);
        }

        $conductor->delete();

        return response()->json(['message' => 'Conductor eliminado']);
    }
}
