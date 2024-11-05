<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    // Listar todos los productos
    public function index()
    {
        return response()->json(Producto::with(['categoria', 'producciones', 'ofertaDetalles', 'pedidoDetalles'])->get());
    }

    // Crear un nuevo producto
    public function store(Request $request)
    {
        $request->validate([
            'id_categoria' => 'required|exists:categorias,id',
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string|max:500',
        ]);

        $producto = Producto::create($request->all());

        return response()->json($producto, 201);
    }

    // Mostrar un producto específico
    public function show($id)
    {
        $producto = Producto::with(['categoria', 'producciones', 'ofertaDetalles', 'pedidoDetalles'])->find($id);

        if (!$producto) {
            return response()->json(['message' => 'Producto no encontrado'], 404);
        }

        return response()->json($producto);
    }

    // Actualizar un producto existente
    public function update(Request $request, $id)
    {
        $producto = Producto::find($id);

        if (!$producto) {
            return response()->json(['message' => 'Producto no encontrado'], 404);
        }

        $request->validate([
            'id_categoria' => 'nullable|exists:categorias,id',
            'nombre' => 'nullable|string|max:255',
            'descripcion' => 'nullable|string|max:500',
        ]);

        $producto->update($request->all());

        return response()->json($producto);
    }

    // Eliminar un producto
    public function destroy($id)
    {
        $producto = Producto::find($id);

        if (!$producto) {
            return response()->json(['message' => 'Producto no encontrado'], 404);
        }

        $producto->delete();

        return response()->json(['message' => 'Producto eliminado']);
    }
}
