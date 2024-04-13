<?php

use App\Http\Controllers\ApiController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});
/* index lista todos los productos*/
Route::get('/api/productos',[ApiController::class , 'index'] ); // ruta principal de productos traer una lista de productos
Route::post('/api/productos', [ApiController::class, 'store']); // ruta de almasenaje de los productos o crear
Route::get('/api/productos/{id}',[ApiController::class ,'show' ]); // ruta que trae un producto en espesifico 
Route::patch('/api/productos/{id}',[ApiController::class , 'update']); // ruta que actualiza el producto
Route::delete('/api/productos/{id}' , [ApiController::class, 'destroy']); // ruta que borra el producto

//ruta globales
Route::get('/api/csrf-token',[ApiController::class , 'csfrToken'] );//ruta que me genera o me devuelve un toke unico para validar las solicitudes http

//ruta de categorias
Route::get('/api/categorias',[CategoryController::class , 'index'] ); // ruta principal de productos traer una lista de productos
Route::post('/api/categorias', [CategoryController::class, 'store']); // ruta de almasenaje de los productos o crear
Route::get('/api/categorias/{id}',[CategoryController::class ,'show' ]); // ruta que trae un producto en espesifico 
Route::patch('/api/categorias/{id}',[CategoryController::class , 'update']); // ruta que actualiza el producto
Route::delete('/api/categorias/{id}' , [CategoryController::class, 'destroy']); // ruta que borra el producto

//ruta de usuarios
Route::get('/api/usuarios',[UsersController::class , 'index']);
Route::post('/api/usuarios',[UsersController::class, 'store']);
Route::get('/api/usuarios/{id}',[UsersController::class, 'show']);
Route::patch('/api/usuarios/{id}',[UsersController::class, 'update']);
Route::delete('/api/usuarios/{id}',[UsersController::class, 'destroy']);
