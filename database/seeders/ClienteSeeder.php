<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Cliente;

class ClienteSeeder extends Seeder
{
    public function run()
    {
        Cliente::create([
            'nombre' => 'María',
            'apellido' => 'González',
            'email' => 'maria.gonzalez@example.com',
            'telefono' => '321654987',
            'password' => bcrypt('contraseña'),
            'direccion' => 'Dirección de María',
            'ubicacion_latitud' => '0.000000',
            'ubicacion_longitud' => '0.000000',
        ]);

        Cliente::create([
            'nombre' => 'Pedro',
            'apellido' => 'López',
            'email' => 'pedro.lopez@example.com',
            'telefono' => '654321789',
            'password' => bcrypt('contraseña'),
            'direccion' => 'Dirección de Pedro',
            'ubicacion_latitud' => '0.000000',
            'ubicacion_longitud' => '0.000000',
        ]);

        Cliente::create([
            'nombre' => 'Lucía',
            'apellido' => 'Martínez',
            'email' => 'lucia.martinez@example.com',
            'telefono' => '987123456',
            'password' => bcrypt('contraseña'),
            'direccion' => 'Dirección de Lucía',
            'ubicacion_latitud' => '0.000000',
            'ubicacion_longitud' => '0.000000',
        ]);
    }
}
