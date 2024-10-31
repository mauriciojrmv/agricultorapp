<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Agricultor;

class AgricultorSeeder extends Seeder
{
    public function run()
    {
        Agricultor::create([
            'nombre' => 'Juan',
            'apellido' => 'Pérez',
            'email' => 'juan.perez@example.com',
            'telefono' => '123456789',
            'informacion_bancaria' => 'Banco X',
            'nit' => 'NIT123456',
            'carnet' => 'Carnet123',
            'licencia_funcionamiento' => 'Licencia123',
            'estado' => 'Activo',
            'direccion' => 'Dirección de Juan',
        ]);

        Agricultor::create([
            'nombre' => 'Ana',
            'apellido' => 'Gómez',
            'email' => 'ana.gomez@example.com',
            'telefono' => '987654321',
            'informacion_bancaria' => 'Banco Y',
            'nit' => 'NIT789012',
            'carnet' => 'Carnet456',
            'licencia_funcionamiento' => 'Licencia456',
            'estado' => 'Activo',
            'direccion' => 'Dirección de Ana',
        ]);

        Agricultor::create([
            'nombre' => 'Luis',
            'apellido' => 'Martínez',
            'email' => 'luis.martinez@example.com',
            'telefono' => '456789123',
            'informacion_bancaria' => 'Banco Z',
            'nit' => 'NIT345678',
            'carnet' => 'Carnet789',
            'licencia_funcionamiento' => 'Licencia789',
            'estado' => 'Activo',
            'direccion' => 'Dirección de Luis',
        ]);
    }
}
