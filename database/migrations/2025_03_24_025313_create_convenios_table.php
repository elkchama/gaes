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
        Schema::create('convenios', function (Blueprint $table) {
            $table->id(); // Clave primaria automática (id)
            $table->unsignedBigInteger('id_tienda'); // Relación con tiendas
            $table->text('obligaciones'); // Obligaciones del convenio
            $table->string('tipo_convenio', 100); // Tipo de convenio (Ej: Comercial, Estratégico)
            $table->text('restricciones'); // Restricciones del convenio
            $table->timestamps(); // created_at y updated_at

            // Definir clave foránea con cascada
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
        Schema::dropIfExists('convenios');
    }
};
