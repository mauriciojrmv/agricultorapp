<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;

    // Definición de los campos que pueden ser asignados en masa
    protected $fillable = ['nombre'];

    // Relación con Producto, ya que una Categoria puede tener muchos Productos
    public function productos()
    {
        return $this->hasMany(Producto::class, 'id_categoria');
    }
}
