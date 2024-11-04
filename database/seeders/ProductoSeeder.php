<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Producto;

class ProductoSeeder extends Seeder
{
    public function run()
    {
        Producto::create(['id_categoria' => 1, 'nombre' => 'Manzana', 'descripcion' => 'Fruta fresca']);
        Producto::create(['id_categoria' => 1, 'nombre' => 'Plátano', 'descripcion' => 'Fruta tropical']);
        Producto::create(['id_categoria' => 2, 'nombre' => 'Zanahoria', 'descripcion' => 'Vegetal fresco']);
    }
}
