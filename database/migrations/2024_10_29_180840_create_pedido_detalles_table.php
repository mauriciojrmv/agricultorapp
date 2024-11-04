<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePedidoDetallesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedido_detalles', function (Blueprint $table) {
            $table->id(); // Define 'id' como BIGINT UNSIGNED
            $table->foreignId('id_pedido')->constrained('pedidos')->onDelete('cascade'); // Relación con Pedido
            $table->foreignId('id_producto')->constrained('productos')->onDelete('cascade'); // Relación con Producto
            $table->decimal('cantidad', 10, 2); // Cantidad del producto
            $table->foreignId('id_unidad_peso')->constrained('unidad_pesos'); // Relación con Unidad de Peso
            $table->decimal('cantidad_convertida_a_kg', 10, 2); // Cantidad convertida a kilogramos
            $table->decimal('cantidad_ofertada', 10, 2)->default(0); // Cantidad ofertada
            $table->decimal('precio_unitario', 10, 2); // Precio unitario del producto
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
        Schema::dropIfExists('pedido_detalles');
    }
}
