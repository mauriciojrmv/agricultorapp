<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOfertaDetallesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('oferta_detalles', function (Blueprint $table) {
            $table->id(); // Define 'id' como BIGINT UNSIGNED
            $table->foreignId('id_oferta')->constrained('ofertas')->onDelete('cascade'); // Relación con Oferta
            $table->foreignId('id_producto')->constrained('productos')->onDelete('cascade'); // Relación con Producto
            $table->decimal('cantidad_disponible', 10, 2); // Cantidad disponible
            $table->decimal('precio_unitario', 10, 2); // Precio unitario
            $table->date('fecha_disponible'); // Fecha de disponibilidad
            $table->string('estado_detalle', 50)->default('disponible'); // Estado del detalle
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
        Schema::dropIfExists('oferta_detalles');
    }
}
