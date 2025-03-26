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
        $table->id('id_registro');
        $table->unsignedBigInteger('usuario_id')->unique(); // Relación 1:1 con usuarios
        $table->string('ip_registro', 45)->nullable();
        $table->enum('metodo_registro', ['email', 'google', 'facebook'])->default('email');
        $table->boolean('verificado')->default(false);
        $table->timestamps();

        // Clave foránea
        $table->foreign('usuario_id')->references('id_usuario')->on('usuarios')->onDelete('cascade');
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
