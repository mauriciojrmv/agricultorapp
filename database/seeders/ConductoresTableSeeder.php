<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Conductor;

class ConductoresTableSeeder extends Seeder
{
    public function run()
    {
        Conductor::create([
            'nombre' => 'Luis',
            'apellido' => 'García',
            'telefono' => '123456789',
            'carnet' => 'C123456',
            'licencia_conducir' => 'LIC123',
            'fecha_nacimiento' => '1980-01-01',
            'direccion' => 'Calle A',
            'email' => 'luis@example.com',
            'password' => bcrypt('password'),
            'ubicacion_latitud' => 12.345678,  // Proporcionar un valor
            'ubicacion_longitud' => -76.543210, // Proporcionar un valor
        ]);

        Conductor::create([
            'nombre' => 'María',
            'apellido' => 'Rodríguez',
            'telefono' => '987654321',
            'carnet' => 'C654321',
            'licencia_conducir' => 'LIC456',
            'fecha_nacimiento' => '1985-02-02',
            'direccion' => 'Calle B',
            'email' => 'maria@example.com',
            'password' => bcrypt('password'),
            'ubicacion_latitud' => 12.345678,  // Proporcionar un valor
            'ubicacion_longitud' => -76.543210, // Proporcionar un valor
        ]);

        Conductor::create([
            'nombre' => 'Jorge',
            'apellido' => 'Mendoza',
            'telefono' => '456789123',
            'carnet' => 'C789012',
            'licencia_conducir' => 'LIC789',
            'fecha_nacimiento' => '1990-03-03',
            'direccion' => 'Calle C',
            'email' => 'jorge@example.com',
            'password' => bcrypt('password'),
            'ubicacion_latitud' => 12.345678,  // Proporcionar un valor
            'ubicacion_longitud' => -76.543210, // Proporcionar un valor
        ]);
    }
}
