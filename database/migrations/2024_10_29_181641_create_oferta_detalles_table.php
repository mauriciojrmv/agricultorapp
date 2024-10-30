<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('oferta_detalles', function (Blueprint $table) {
            $table->id(); // Clave primaria para 'oferta_detalles'
            $table->foreignId('id_oferta')->constrained('ofertas')->onDelete('cascade'); // Clave foránea a 'ofertas'
            $table->foreignId('id_producto')->constrained('productos')->onDelete('cascade'); // Clave foránea a 'productos'
            $table->decimal('cantidad_disponible', 10, 2);
            $table->decimal('precio_unitario', 10, 2);
            $table->date('fecha_disponible');
            $table->string('estado_detalle', 50);
            $table->string('unidad_medida', 50);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('oferta_detalles');
    }
};
