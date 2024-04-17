<?php

use App\Http\Controllers\ApiController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\WarehouseController;
use App\Http\Controllers\DeliveryController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\BillController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});
/* index lista todos los productos*/
Route::get('/api/productos',[ApiController::class , 'index'] ); // ruta principal de productos traer una lista de productos
Route::post('/api/productos', [ApiController::class, 'store']); // ruta de almacenaje de los productos o crear
Route::get('/api/productos/{id}',[ApiController::class ,'show' ]); // ruta que trae un producto en especifico 
Route::patch('/api/productos/{id}',[ApiController::class , 'update']); // ruta que actualiza el producto
Route::delete('/api/productos/{id}' , [ApiController::class, 'destroy']); // ruta que borra el producto

//ruta globales
Route::get('/api/csrf-token',[ApiController::class , 'csfrToken'] );//ruta que me genera o me devuelve un toke unico para validar las solicitudes http

//ruta de categorias
Route::get('/api/categorias',[CategoryController::class , 'index'] ); // ruta principal de productos traer una lista de productos
Route::post('/api/categorias', [CategoryController::class, 'store']); // ruta de almacenaje de los productos o crear
Route::get('/api/categorias/{id}',[CategoryController::class ,'show' ]); // ruta que trae un producto en especifico 
Route::patch('/api/categorias/{id}',[CategoryController::class , 'update']); // ruta que actualiza el producto
Route::delete('/api/categorias/{id}' , [CategoryController::class, 'destroy']); // ruta que borra el producto

//ruta de usuarios
Route::get('/api/usuarios',[UsersController::class, 'index']); // ruta principal de usuarios que trae el usuario
Route::post('/api/usuarios',[UsersController::class, 'store']); // ruta de almacenaje de los usuarios
Route::get('/api/usuarios/{id}',[UsersController::class, 'show']); // ruta que trea un usuario en especifico
Route::patch('/api/usuarios/{id}',[UsersController::class, 'update']); // ruta que actualiza un usuario
Route::delete('/api/usuarios/{id}',[UsersController::class, 'destroy']); // ruta que borra el usuario

//ruta de almacenes
Route::get('/api/almacenes',[WarehouseController::class, 'index']); //ruta principal de los almacenes que trae una lista de los almacenes
Route::post('/api/almacenes', [WarehouseController::class, 'store']);// ruta de almacenaje de los almacenes
Route::get('/api/almacenes/{id}',[WarehouseController::class, 'show']); //ruta que trea un almacen en especifico
Route::patch('/api/almacenes/{id}',[WarehouseController::class, 'update']);//ruta que actualiza un almacen
Route::delete('/api/almacenes/{id}',[WarehouseController::class, 'destroy']);//ruta que borra un almacen

// Rutas de vehículos
Route::get('/api/vehiculos',[VehicleController::class, 'index']); // Ruta principal que almacena una lista de los vehículos
Route::post('/api/vehiculos', [VehicleController::class, 'store']); // Ruta de almacenamiento de los vehículos
Route::get('/api/vehiculos/{id}',[VehicleController::class, 'show']); // Ruta que trae un vehículo en específico 
Route::patch('/api/vehiculos/{id}',[VehicleController::class, 'update']); // Ruta que actualiza un vehículo
Route::delete('/api/vehiculos/{id}',[VehicleController::class, 'destroy']); // Ruta que borra un vehículo

//rutas de repartidores
Route::get('/api/repartidores', [DeliveryController::class, 'index']); //Ruta principla que almacena una lista de repartidores
Route::post('/api/repartidores', [DeliveryController::class, 'store']); //Ruta de almacenimiento de os vehiculos
Route::get('/api/repartidores/{id}',[DeliveryController::class, 'show']); //Ruta  que trae un repartidor en especifico
Route::patch('/api/repartidores/{id}',[DeliveryController::class , 'update']); //Ruta que actualiza un repartidor
Route::delete('/api/repartidores/{id}', [DeliveryController::class, 'destroy']); //ruta que elimina un repartidor

//ruta de factura
Route::get('/api/facturas', [BillController::class, 'index']); //Ruta principla que almacena una lista de facturas
Route::post('/api/facturas', [BillController::class, 'store']); //Ruta de almacenimiento de las facturas
Route::get('/api/facturas/{id}',[BillController::class, 'show']); //Ruta  que trae una factura en especifico
Route::patch('/api/facturas/{id}',[BillController::class , 'update']); //Ruta que actualiza una factura
Route::delete('/api/facturas/{id}', [BillController::class, 'destroy']); //ruta que elimina una factura

//ruta de pedidos
Route::get('/api/pedidos', [BillController::class, 'index']); //Ruta principla que almacena una lista de facturas
Route::post('/api/pedidos', [BillController::class, 'store']); //Ruta de almacenimiento de las facturas
Route::get('/api/pedidos/{id}',[BillController::class, 'show']); //Ruta  que trae una factura en especifico
Route::patch('/api/pedidos/{id}',[BillController::class , 'update']); //Ruta que actualiza una factura
Route::delete('/api/pedidos/{id}', [BillController::class, 'destroy']); //ruta que elimina una factura

