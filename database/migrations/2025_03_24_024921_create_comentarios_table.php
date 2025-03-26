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
        Schema::create('comentarios', function (Blueprint $table) {
            $table->id('id_comentario'); // Clave primaria
            $table->unsignedBigInteger('id_producto'); // Relación con productos
            $table->decimal('calificacion', 3, 2)->default(0.0); // Calificación (Ej: 4.75)
            $table->date('fecha_publicacion'); // Fecha en la que se publicó el comentario
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
        Schema::dropIfExists('comentarios');
    }
};
