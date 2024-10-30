<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agricultor extends Model
{
    use HasFactory;

    // Definición de los campos que pueden ser asignados en masa
    protected $fillable = [
        'nombre',
        'apellido',
        'email',
        'telefono',
        'informacion_bancaria',
        'nit',
        'carnet',
        'licencia_funcionamiento',
        'estado',
        'direccion'
    ];

    // Relación con Terreno, ya que un Agricultor puede tener varios Terrenos
    public function terrenos()
    {
        return $this->hasMany(Terreno::class, 'id_agricultor');
    }
}
