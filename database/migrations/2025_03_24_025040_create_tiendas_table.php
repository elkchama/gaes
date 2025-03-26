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
        Schema::create('tiendas', function (Blueprint $table) {
            $table->id('id_tienda'); // Clave primaria
            $table->string('nombre', 100); // Nombre de la tienda
            $table->string('telefono', 20); // Teléfono de contacto
            $table->string('correo', 100)->unique(); // Correo electrónico único
            $table->string('url', 255)->nullable(); // URL de la tienda (opcional)
            $table->text('politica_tienda'); // Política de la tienda
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
        Schema::dropIfExists('tiendas');
    }
};
