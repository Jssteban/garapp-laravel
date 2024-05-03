<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use League\CommonMark\Reference\Reference;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
       

        Schema::create('category', function (Blueprint $table) {
            // Categoría
            $table->id()->unique();
            $table->string('name')->unique();
            $table->string('url_img');
            $table->text('description');
            $table->timestamps();
        });
        
        Schema::create('profile', function (Blueprint $table) {
            // Perfil
            $table->id()->unique();
            $table->string('last_name');
            $table->integer('phone_number');
            $table->integer('identification')->unique();
            $table->string('address');
            $table->string('url_img');
            $table->text('description');
            $table->string('gender');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();
            // Definición de la clave foránea
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
        
        Schema::create('store', function (Blueprint $table) {
            // Tienda
            $table->id()->unique();
            $table->string('name')->unique();
            $table->integer('phone_number')->unique();
            $table->string('email')->unique();
            $table->integer('nit')->unique();
            $table->string('address');
            $table->string('url_img');
            $table->timestamps();
        });
        
        Schema::create('vehicle', function (Blueprint $table) {
            // Vehículo
            $table->id()->unique();
            $table->string('brand');
            $table->string('model');
            $table->string('year');
            $table->string('enroll')->unique();
            $table->string('type');
            $table->string('color');
            $table->timestamps();
        });
        
        Schema::create('delivery', function (Blueprint $table) {
            // Entrega
            $table->id()->unique();
            $table->integer('driver_licence')->unique();
            $table->integer('identification_number')->unique();
            $table->integer('soat_number')->unique();
            $table->integer('technical_inspection')->unique();
            $table->string('url_img_vehicle');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('vehicle_id');
            $table->timestamps();
            // Definición de las claves foráneas
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('vehicle_id')->references('id')->on('vehicle')->onDelete('cascade');
        });
        
        Schema::create('product', function (Blueprint $table) {
            // Producto
            $table->id()->unique();
            $table->string('name')->unique();
            $table->string('reference')->unique();
            $table->string('url_img');
            $table->text('description');
            $table->integer('amount');
            $table->integer('price');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();
            // Definición de la clave foránea con restricción de clave foránea diferida
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
        
        Schema::create('orders', function (Blueprint $table) {
            // Orden
            $table->id();
            $table->date('date');
            $table->string('status');
            $table->timestamps();
            $table->unsignedBigInteger('delivery_id');
            // Definiendo la clave foránea
            $table->foreign('delivery_id')->references('id')->on('delivery')->onDelete('cascade');
        });
        
        Schema::create('invoice', function (Blueprint $table) {
            // Factura
            $table->id()->unique();
            $table->date('date');
            $table->time('hour');
            $table->integer('total_pay');
            $table->unsignedBigInteger('order_id');
            $table->timestamps();
            // Definición de la clave foránea
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('category');
        Schema::dropIfExists('profile');
        Schema::dropIfExists('store');
        Schema::dropIfExists('delivery');
        Schema::dropIfExists('vehicle');
        Schema::dropIfExists('invoice');
        Schema::dropIfExists('product');
        Schema::dropIfExists('orders');
    }
};

