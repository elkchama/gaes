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
        Schema::create('tienda_productos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_tienda'); // Clave foránea de tiendas
            $table->unsignedBigInteger('id_producto'); // Clave foránea de productos
            $table->timestamps();

            // Definir claves foráneas con cascada
            $table->foreign('id_tienda')->references('id_tienda')->on('tiendas')->onDelete('cascade');
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
        Schema::dropIfExists('tienda_productos');
    }
};
