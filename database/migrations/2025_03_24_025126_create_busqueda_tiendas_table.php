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
        Schema::create('busqueda_tiendas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_busqueda'); // Clave foránea de búsquedas
            $table->unsignedBigInteger('id_tienda'); // Clave foránea de tiendas
            $table->timestamps();

            // Definir claves foráneas con cascada
            $table->foreign('id_busqueda')->references('id_busqueda')->on('busquedas')->onDelete('cascade');
            $table->foreign('id_tienda')->references('id_tienda')->on('tiendas')->onDelete('cascade');
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('busqueda_tiendas');
    }
};
