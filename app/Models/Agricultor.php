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
        'telefono',
        'email',
        'direccion',
        'password',
        'informacion_bancaria',
        'nit',
        'carnet',
        'licencia_funcionamiento',
        'estado',
    ];

    // Relación con Terreno, ya que un Agricultor puede tener varios Terrenos
    public function terrenos()
    {
        return $this->hasMany(Terreno::class, 'id_agricultor');
    }

    // Relación con Producción, si un Agricultor puede tener varias producciones
    public function producciones()
    {
        return $this->hasMany(Produccion::class, 'id_agricultor');
    }

    // Relación con Ofertas, si un Agricultor puede tener varias ofertas
    public function ofertas()
    {
        return $this->hasMany(Oferta::class, 'id_agricultor');
    }
}
