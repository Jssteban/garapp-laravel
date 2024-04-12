<?php

use App\Http\Controllers\ApiController;
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
Route::get('/api/csrf-token',[ApiController::class , 'csfrToken'] );
