<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {

        Schema::create('repartidores', function (Blueprint $table) {
            $table->id();
            $table->integer('numero_licencia');
            $table->integer('cedula');
            $table->integer('soat');
            $table->integer('tecnico_mecanica');
            $table->string('url_imagen_vehiculo');
            $table->unsignedBigInteger('usuario_id');
            $table->timestamps();
            // definicion de la clave foranea
            $table->foreign('usuario_id')->references('id')->on('usuarios')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('repartidores');
        /* Schema::table('repartidores', function (Blueprint $table) {
             $table->dropForeign(['usuario_id']);
             $table->dropColumn('usuario_id');
         });*/
    }
};
