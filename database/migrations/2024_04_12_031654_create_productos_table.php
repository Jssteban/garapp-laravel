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
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('referencia');
            $table->string('url_imagen');
            $table->text('descripcion');
            $table->integer('cantidad');
            $table->integer('precio');
            $table->unsignedBigInteger('usuario_id');
            $table->timestamps();
            //definicion de la clave foranea
            $table->foreign('usuario_id')->references('id')->on('usuarios')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
};
