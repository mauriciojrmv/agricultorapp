<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOfertasTable extends Migration
{
    public function up()
    {
        Schema::create('ofertas', function (Blueprint $table) {
            $table->id(); // Crea 'id' como BIGINT UNSIGNED
            $table->foreignId('id_produccion')->constrained('produccions')->onDelete('cascade');
            $table->foreignId('id_agricultor')->constrained('agricultors')->onDelete('cascade');
            $table->decimal('precio_oferta', 10, 2);
            $table->decimal('cantidad_oferta', 10, 2);
            $table->decimal('stock_fisico', 10, 2);
            $table->decimal('stock_comprometido', 10, 2);
            $table->foreignId('id_unidad_peso')->constrained('unidad_pesos')->onDelete('cascade');
            $table->decimal('cantidad_convertida_a_kg', 10, 2);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('ofertas');
    }
}
