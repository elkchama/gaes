<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comparacions', function (Blueprint $table) {
            $table->id('id_comparacion'); // Clave primaria
        $table->unsignedBigInteger('id_producto'); // Relación con productos
        $table->string('nombre_tienda', 100); // Nombre de la tienda comparada
        $table->decimal('precio_producto', 10, 2); // Precio del producto en la tienda comparada
        $table->string('resultado', 50); // Resultado de la comparación (Ej: "Más barato", "Más caro", etc.)
        $table->timestamps(); // created_at y updated_at

        // Clave foránea para la relación con productos
        $table->foreign('id_producto')->references('id_producto')->on('productos')->onDelete('cascade');
    });
}


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comparacions');
    }
};
