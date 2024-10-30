<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $table = 'productos';

    protected $fillable = [
        'id_categoria',
        'nombre',
        'descripcion'
    ];

    // Relación con Produccion
    public function producciones()
    {
        return $this->hasMany(Produccion::class, 'id_producto');
    }
}
