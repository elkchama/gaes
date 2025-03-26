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
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id('id_usuario');
        $table->string('nombre', 100);
        $table->string('apellido', 100);
        $table->string('correo', 150)->unique();
        $table->string('contrasena', 150);
        $table->string('telefono', 20)->nullable();
        $table->string('direccion', 100)->nullable();
        $table->unsignedBigInteger('id_rol'); // Clave foránea para la relación con roles
        $table->timestamps();

        // Definir clave foránea para roles
        $table->foreign('id_rol')->references('id_rol')->on('roles')->onDelete('cascade');
    });
}


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuarios');
    }
};
