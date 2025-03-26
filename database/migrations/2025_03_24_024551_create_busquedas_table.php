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
        Schema::create('busquedas', function (Blueprint $table) {
            $table->id('id_busqueda'); // ID de la búsqueda (clave primaria)
            $table->string('tipo_busqueda', 100); // Tipo de búsqueda (Ej: producto, tienda, etc.)
            $table->integer('numero_resultados'); // Número de resultados obtenidos
            $table->string('historial_busqueda', 100); // Historial de búsqueda
            $table->timestamps(); // created_at y updated_at
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('busquedas');
    }
};
