<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRutasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rutas', function (Blueprint $table) {
            $table->id(); // Define 'id' como BIGINT UNSIGNED
            $table->foreignId('id_camion')->constrained('camions')->onDelete('cascade'); // Relación con Camión
            $table->date('fecha_recogida'); // Fecha de recogida
            $table->decimal('capacidad_utilizada', 10, 2)->default(0); // Capacidad utilizada por defecto 0
            $table->decimal('distancia_total', 10, 2); // Distancia total de la ruta
            $table->string('estado', 50)->default('pendiente'); // Estado por defecto 'pendiente'
            $table->timestamps(); // Crea las columnas 'created_at' y 'updated_at'
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rutas');
    }
}
