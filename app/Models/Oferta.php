<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Oferta extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_produccion',
        'id_agricultor',
        'precio_oferta',
        'cantidad_oferta'
    ];

    // Relación con OfertaDetalle
    public function detalles()
    {
        return $this->hasMany(OfertaDetalle::class, 'id_oferta');
    }

    // Relación con Producción (una oferta se basa en una producción específica)
    public function produccion()
    {
        return $this->belongsTo(Produccion::class, 'id_produccion');
    }

    // Relación con Agricultor (una oferta pertenece a un agricultor específico)
    public function agricultor()
    {
        return $this->belongsTo(Agricultor::class, 'id_agricultor');
    }
}
