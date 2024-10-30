<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use App\Models\PedidoDetalle;
use Illuminate\Http\Request;

class PedidoController extends Controller
{
    // Listar todos los pedidos
    public function index()
    {
        return response()->json(Pedido::with('detalles')->get());
    }

    // Crear un nuevo pedido
    public function store(Request $request)
    {
        // Validar la solicitud
        $request->validate([
            'id_cliente' => 'required|integer|exists:clientes,id',
            'productos' => 'required|array',
            'productos.*.id_producto' => 'required|integer|exists:productos,id',
            'productos.*.cantidad' => 'required|integer|min:1',
        ]);

        // Crear el pedido
        $pedido = Pedido::create([
            'id_cliente' => $request->id_cliente,
            'estado' => 'pendiente', // Estado inicial
            'fecha_entrega' => now()->addDays(1), // Fecha de entrega, por ejemplo, al día siguiente
        ]);

        // Crear los detalles del pedido
        foreach ($request->productos as $producto) {
            PedidoDetalle::create([
                'id_pedido' => $pedido->id,
                'id_producto' => $producto['id_producto'],
                'cantidad' => $producto['cantidad'],
                'precio_unitario' => $this->getPrecioUnitario($producto['id_producto']), // Método que obtendrá el precio del producto
            ]);
        }

        return response()->json($pedido->load('detalles'), 201);
    }

    // Método para obtener el precio unitario de un producto
    private function getPrecioUnitario($id_producto)
    {
        // Aquí puedes implementar la lógica para obtener el precio unitario
        // por ejemplo, desde una oferta relacionada o directamente desde el producto
        return 10.00; // Cambiar por la lógica real
    }

    // Mostrar un pedido específico
    public function show($id)
    {
        $pedido = Pedido::with('detalles')->find($id);

        if (!$pedido) {
            return response()->json(['message' => 'Pedido no encontrado'], 404);
        }

        return response()->json($pedido);
    }

    // Actualizar un pedido existente
    public function update(Request $request, $id)
    {
        $pedido = Pedido::find($id);

        if (!$pedido) {
            return response()->json(['message' => 'Pedido no encontrado'], 404);
        }

        $pedido->update($request->all());
        return response()->json($pedido);
    }

    // Eliminar un pedido
    public function destroy($id)
    {
        $pedido = Pedido::find($id);

        if (!$pedido) {
            return response()->json(['message' => 'Pedido no encontrado'], 404);
        }

        $pedido->delete();
        return response()->json(['message' => 'Pedido eliminado']);
    }
}
