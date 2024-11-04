<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePuntosDeRecogidaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('puntos_de_recogida', function (Blueprint $table) {
            $table->id(); // Define 'id' como BIGINT UNSIGNED
            $table->foreignId('id_ruta')->constrained('rutas')->onDelete('cascade'); // Relación con Ruta
            $table->foreignId('id_terreno')->constrained('terrenos')->onDelete('cascade'); // Relación con Terreno
            $table->foreignId('id_carga')->constrained('carga')->onDelete('cascade'); // Relación con Carga
            $table->foreignId('id_producto')->constrained('productos')->onDelete('cascade'); // Relación con Producto
            $table->decimal('cantidad_recoger', 10, 2); // Cantidad a recoger
            $table->integer('orden'); // Orden de recogida
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
        Schema::dropIfExists('puntos_de_recogida');
    }
}
