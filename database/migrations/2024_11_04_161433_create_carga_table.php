<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCargaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carga', function (Blueprint $table) {
            $table->id(); // Define 'id' como BIGINT UNSIGNED
            $table->foreignId('id_pedido_detalle')->constrained('pedido_detalles')->onDelete('cascade'); // Relación con Pedido Detalle
            $table->foreignId('id_oferta_detalle')->constrained('oferta_detalles')->onDelete('cascade'); // Relación con Oferta Detalle
            $table->decimal('cantidad_asignada', 10, 2); // Cantidad asignada
            $table->enum('estado_asignacion', ['pendiente', 'completado', 'parcial'])->default('pendiente'); // Estado por defecto 'pendiente'
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
        Schema::dropIfExists('carga');
    }
}
