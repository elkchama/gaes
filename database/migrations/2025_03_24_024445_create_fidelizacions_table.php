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
        Schema::create('fidelizacions', function (Blueprint $table) {
            $table->id('id_fidelizacion'); // Cambio de 'id_puntos' a 'id_fidelizacion' para mayor claridad
        $table->unsignedBigInteger('id_usuario'); // Clave foránea para la relación con usuarios
        $table->string('finalidad', 20);
        $table->integer('puntos_totales')->default(0); // Comienza desde 0 y se acumula
        $table->integer('limite_puntos')->default(10000); // Límite máximo de puntos
        $table->timestamps();

        // Definir clave foránea para usuarios
        $table->foreign('id_usuario')->references('id_usuario')->on('usuarios')->onDelete('cascade');
    });
}


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fidelizacions');
    }
};
