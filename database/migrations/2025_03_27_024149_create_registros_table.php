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
    Schema::create('registros', function (Blueprint $table) {
        // Cambiamos la llave primaria por id_registro
        $table->bigIncrements('id_registro');

        // Clave foránea para la relación 1:1 con usuarios.
        $table->unsignedBigInteger('id_usuario')->unique();

        // Campos solicitados
        $table->string('nombre_completo');
        $table->string('nombre_usuario');
        $table->string('correo_electronico')->unique();
        $table->string('numero_telefono');
        $table->string('contraseña');
        $table->string('confirmar_contraseña');
        $table->string('genero');

        $table->timestamps();

        // Definición de la clave foránea
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
        Schema::dropIfExists('registros');
    }
};
