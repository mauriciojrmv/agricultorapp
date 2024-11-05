<?php

namespace App\Http\Controllers;

use App\Models\Oferta;
use App\Models\OfertaDetalle;
use App\Models\Produccion;
use app\Models\UnidadPeso;
use Illuminate\Http\Request;

class OfertaController extends Controller
{
    // Listar todas las ofertas
    public function index()
    {
        return response()->json(Oferta::with('detalles')->get());
    }

// Crear una nueva oferta
public function store(Request $request)
{
    $request->validate([
        'id_produccion' => 'required|integer|exists:produccions,id',
        'id_agricultor' => 'required|integer|exists:agricultors,id',
        'precio_oferta' => 'required|numeric|min:0',
        'cantidad_oferta' => 'required|numeric|min:0',
        'id_unidad_peso' => 'required|integer|exists:unidad_pesos,id',
    ]);

    // Obtener la producción relacionada
    $produccion = Produccion::findOrFail($request->id_produccion);

    // Calcular cantidad convertida a kg
    $unidad_peso = UnidadPeso::find($request->id_unidad_peso);
    $cantidad_convertida_a_kg = $request->cantidad_oferta * $unidad_peso->factor_conversion_a_kg;

    // Crear la oferta
    $oferta = Oferta::create([
        'id_produccion' => $request->id_produccion,
        'id_agricultor' => $request->id_agricultor,
        'precio_oferta' => $request->precio_oferta,
        'cantidad_oferta' => $request->cantidad_oferta,
        'stock_fisico' => $cantidad_convertida_a_kg, // Asignar stock físico en kg
        'stock_comprometido' => 0, // Valor por defecto
        'id_unidad_peso' => $request->id_unidad_peso,
        'cantidad_convertida_a_kg' => $cantidad_convertida_a_kg,
    ]);

    // Crear el detalle de oferta
    OfertaDetalle::create([
        'id_oferta' => $oferta->id,
        'id_producto' => $produccion->id_producto,
        'cantidad_disponible' => $request->cantidad_oferta,
        'precio_unitario' => $oferta->precio_oferta / $request->cantidad_oferta,
        'fecha_disponible' => now(),
        'estado_detalle' => 'activo'
    ]);

    return response()->json($oferta->load('detalles'), 201);
}

    // Mostrar una oferta específica
    public function show($id)
    {
        $oferta = Oferta::with('detalles')->find($id);
        if (!$oferta) {
            return response()->json(['message' => 'Oferta no encontrada'], 404);
        }
        return response()->json($oferta);
    }

// Actualizar una oferta
public function update(Request $request, $id)
{
    // Encontrar la oferta
    $oferta = Oferta::find($id);
    if (!$oferta) {
        return response()->json(['message' => 'Oferta no encontrada'], 404);
    }

    // Validar la solicitud
    $request->validate([
        'id_produccion' => 'integer|exists:produccions,id',
        'id_agricultor' => 'integer|exists:agricultors,id',
        'precio_oferta' => 'numeric|min:0',
        'cantidad_oferta' => 'numeric|min:0',
        'id_unidad_peso' => 'integer|exists:unidad_pesos,id',
    ]);

    // Actualizar los campos necesarios
    $oferta->fill($request->all());

    // Si se actualiza 'cantidad_oferta' o 'id_unidad_peso', recalcular
    if ($request->has('cantidad_oferta') || $request->has('id_unidad_peso')) {
        // Obtener la unidad de peso y calcular la cantidad convertida a kg
        if ($request->has('id_unidad_peso')) {
            $unidad_peso = UnidadPeso::find($request->id_unidad_peso);
            $oferta->cantidad_convertida_a_kg = $request->cantidad_oferta * $unidad_peso->factor_conversion_a_kg;
        } else {
            // Usar el valor actual si no se proporciona una nueva unidad de peso
            $oferta->cantidad_convertida_a_kg = $oferta->cantidad_oferta * $oferta->unidadPeso->factor_conversion_a_kg;
        }

        // Ajustar stock físico si es necesario
        $oferta->stock_fisico = $oferta->cantidad_convertida_a_kg; // Esto depende de tu lógica de negocio
    }

    // Guardar la oferta actualizada
    $oferta->save();

    return response()->json($oferta);
}

    // Eliminar una oferta
    public function destroy($id)
    {
        $oferta = Oferta::find($id);
        if (!$oferta) {
            return response()->json(['message' => 'Oferta no encontrada'], 404);
        }

        $oferta->delete();
        return response()->json(['message' => 'Oferta eliminada']);
    }
}
