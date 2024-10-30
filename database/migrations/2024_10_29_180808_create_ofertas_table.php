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
        Schema::create('ofertas', function (Blueprint $table) {
            $table->id(); // Crea 'id' como BIGINT UNSIGNED
            $table->foreignId('id_produccion')->constrained('produccions')->onDelete('cascade');
            $table->foreignId('id_agricultor')->constrained('agricultors')->onDelete('cascade');
            $table->decimal('precio_oferta', 10, 2);
            $table->decimal('cantidad_oferta', 10, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ofertas');
    }
};
