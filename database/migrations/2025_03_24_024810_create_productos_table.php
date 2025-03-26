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
        Schema::create('productos', function (Blueprint $table) {
            $table->id('id_producto'); // Clave primaria
        $table->unsignedBigInteger('id_busqueda'); // Relación con busquedas
        $table->string('nombre_producto', 100); // Nombre del producto
        $table->decimal('precio', 10, 2); // Precio del producto con 2 decimales
        $table->decimal('calificacion', 3, 2)->default(0.0); // Calificación de 0.00 a 5.00
        $table->string('categoria', 50); // Categoría del producto
        $table->timestamps(); // created_at y updated_at

        // Clave foránea para la relación con busquedas
        $table->foreign('id_busqueda')->references('id_busqueda')->on('busquedas')->onDelete('cascade');
    });
}


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('productos');
    }
};
