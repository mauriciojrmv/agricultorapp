<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $table = 'productos';

    protected $fillable = [
        'id_categoria',  // ID de la categoría a la que pertenece el producto
        'nombre',
        'descripcion',
    ];

    // Relación con Produccion
    public function producciones()
    {
        return $this->hasMany(Produccion::class, 'id_producto');
    }

    // Relación con OfertaDetalle (si aplica)
    public function ofertaDetalles()
    {
        return $this->hasMany(OfertaDetalle::class, 'id_producto');
    }

    // Relación con PedidoDetalle (si aplica)
    public function pedidoDetalles()
    {
        return $this->hasMany(PedidoDetalle::class, 'id_producto');
    }

    // Relación con Categoria
    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'id_categoria');
    }

    // Relación con Puntos de Recogida (si es necesario)
    public function puntosDeRecogida()
    {
        return $this->hasMany(PuntoDeRecogida::class, 'id_producto');
    }
}
