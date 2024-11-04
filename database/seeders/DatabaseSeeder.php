<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            AgricultorSeeder::class,
            TerrenoSeeder::class,
            TemporadaSeeder::class,
            ClienteSeeder::class,
            CategoriaSeeder::class,
            ProductoSeeder::class,
            ConductoresTableSeeder::class,
            UnidadesPesoTableSeeder::class,
            CamionesTableSeeder::class,
            // Agrega otros seeders aquí si es necesario
        ]);
    }
}
