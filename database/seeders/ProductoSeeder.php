<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Producto;

class ProductoSeeder extends Seeder
{
    public function run()
    {
        Producto::create([
            'nombre' => 'Manzana',
            'descripcion' => 'Manzana roja fresca',
            'id_categoria' => 1, // Frutas
        ]);

        Producto::create([
            'nombre' => 'Zanahoria',
            'descripcion' => 'Zanahoria fresca',
            'id_categoria' => 2, // Verduras
        ]);

        Producto::create([
            'nombre' => 'Arroz',
            'descripcion' => 'Arroz de calidad',
            'id_categoria' => 3, // Cereales
        ]);
    }
}
