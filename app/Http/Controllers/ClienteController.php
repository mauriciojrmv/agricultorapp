<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    // Listar todos los clientes
    public function index()
    {
        return response()->json(Cliente::all());
    }

    // Crear un nuevo cliente
    public function store(Request $request)
    {
        try {
            $request->validate([
                'nombre' => 'required|string|max:255',
                'apellido' => 'required|string|max:255',
                'email' => 'required|email|unique:clientes,email',
                'telefono' => 'required|string|max:15',
                'password' => 'required|string|min:6',
                'direccion' => 'nullable|string|max:255',
                'ubicacion_latitud' => 'nullable|numeric',
                'ubicacion_longitud' => 'nullable|numeric',
            ]);

            $cliente = Cliente::create([
                'nombre' => $request->nombre,
                'apellido' => $request->apellido,
                'email' => $request->email,
                'telefono' => $request->telefono,
                'password' => bcrypt($request->password),
                'direccion' => $request->direccion,
                'ubicacion_latitud' => $request->ubicacion_latitud,
                'ubicacion_longitud' => $request->ubicacion_longitud,
            ]);

            return response()->json($cliente, 201);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    // Mostrar un cliente específico
    public function show($id)
    {
        $cliente = Cliente::find($id);

        if (!$cliente) {
            return response()->json(['message' => 'Cliente no encontrado'], 404);
        }

        return response()->json($cliente);
    }

    // Actualizar un cliente existente
    public function update(Request $request, $id)
    {
        try {
            $cliente = Cliente::find($id);

            if (!$cliente) {
                return response()->json(['message' => 'Cliente no encontrado'], 404);
            }

            $request->validate([
                'nombre' => 'string|max:255',
                'apellido' => 'string|max:255',
                'email' => 'email|unique:clientes,email,' . $id,
                'telefono' => 'string|max:15',
                'password' => 'nullable|string|min:6',
                'direccion' => 'nullable|string|max:255',
                'ubicacion_latitud' => 'nullable|numeric',
                'ubicacion_longitud' => 'nullable|numeric',
            ]);

            $cliente->update([
                'nombre' => $request->nombre,
                'apellido' => $request->apellido,
                'email' => $request->email,
                'telefono' => $request->telefono,
                'password' => $request->password ? bcrypt($request->password) : $cliente->password,
                'direccion' => $request->direccion,
                'ubicacion_latitud' => $request->ubicacion_latitud,
                'ubicacion_longitud' => $request->ubicacion_longitud,
            ]);

            return response()->json($cliente);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    // Eliminar un cliente
    public function destroy($id)
    {
        try {
            $cliente = Cliente::find($id);

            if (!$cliente) {
                return response()->json(['message' => 'Cliente no encontrado'], 404);
            }

            $cliente->delete();

            return response()->json(['message' => 'Cliente eliminado']);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}

