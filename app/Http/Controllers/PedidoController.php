<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use App\Models\PedidoDetalle;
use App\Models\UnidadPeso;
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
        'productos.*.id_unidad_peso' => 'required|integer|exists:unidad_pesos,id', // Validar la unidad de peso
    ]);

    // Crear el pedido
    $pedido = Pedido::create([
        'id_cliente' => $request->id_cliente,
        'estado' => 'pendiente', // Estado inicial
        'fecha_entrega' => null, // Inicialmente nula
    ]);

    // Crear los detalles del pedido
    foreach ($request->productos as $producto) {
        // Obtener el precio unitario y el factor de conversión
        $precio_unitario = $this->getPrecioUnitario($producto['id_producto']);
        $unidad_peso = UnidadPeso::find($producto['id_unidad_peso']);
        $cantidad_convertida_a_kg = $producto['cantidad'] * $unidad_peso->factor_conversion_a_kg;

        PedidoDetalle::create([
            'id_pedido' => $pedido->id,
            'id_producto' => $producto['id_producto'],
            'cantidad' => $producto['cantidad'],
            'id_unidad_peso' => $producto['id_unidad_peso'], // Guardar la unidad de peso
            'cantidad_convertida_a_kg' => $cantidad_convertida_a_kg, // Guardar la cantidad convertida a kg
            'precio_unitario' => $precio_unitario,
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

    // Método para convertir cantidad a kg basado en la unidad de peso
    private function convertirACantidadKg($producto)
    {
        // Aquí deberías implementar la lógica para convertir la cantidad
        // a kg dependiendo de la unidad de peso. Por ahora, solo como ejemplo:
        return $producto['cantidad'] * 1; // Cambia 1 por el factor de conversión real si es necesario
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
