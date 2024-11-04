<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Oferta extends Model
{
    use HasFactory;

    protected $table = 'ofertas';

    protected $fillable = [
        'id_produccion',
        'id_agricultor',
        'precio_oferta',
        'cantidad_oferta',
        'stock_fisico',
        'stock_comprometido',
        'id_unidad_peso',
        'cantidad_convertida_a_kg',
    ];

    // Relación con Producción
    public function produccion()
    {
        return $this->belongsTo(Produccion::class, 'id_produccion');
    }

    // Relación con Agricultor
    public function agricultor()
    {
        return $this->belongsTo(Agricultor::class, 'id_agricultor');
    }

    // Relación con Unidad de Peso
    public function unidadPeso()
    {
        return $this->belongsTo(UnidadPeso::class, 'id_unidad_peso');
    }

    // Relación con OfertaDetalle
    public function detalles()
    {
        return $this->hasMany(OfertaDetalle::class, 'id_oferta');
    }
}
