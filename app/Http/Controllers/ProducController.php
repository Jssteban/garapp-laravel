<?php

namespace App\Http\Controllers;
use App\Models\ProductosModel;
use Illuminate\Http\Request;

class ProducController extends Controller
{
     //lista todo los productos de nuestra base de datos
     public function index()
     {
 
         $productos = ProductosModel::all(); //hace peticion para traer todos los datos
         if($productos->isEmpty()){ //comprueba si productos esta basio y devuelve un mensaje de error
             return response()->json(['message'=>'no existe productos'], 404);
         } 
         return $productos; //retorna todo lo que esta en el producto
         
     }
     public function store(Request $request) //crea un nuevo recurso en nuestra base de datos
     {
         $producto = ProductosModel::create($request->all());
         return $producto;
     }
 
     public function show($id){  //trae un producto en espesifico
     //busca un producto en especifico
         $producto = ProductosModel::find($id); //busca por id la primera coincidencia 
         if(!$producto){ // si no existe el producto en la base de datos devuelve un mensaje de error 
           return response()->json(['message' =>'no existe producto'], 404);
         }
         return $producto; //devuelve el producto que coincide con el id dentro de la base de datos
     }
 
     public function update(Request $request , $id){ //actualizar uhn recurso existente en la base de datos
         $producto = ProductosModel::find($id); // busca por id la primera coincidencia en la base de datos
         if(!$producto){
          return response()->json(['message'=>'no existe producto'], 404);//manda un mensaje que la condicion no existe 
         }
 
         $producto->fill($request->all()); // asigna todo lo que contenga el cuerpo de la solicitud
         $producto->save(); //me guarda la solicitud
         return $producto; //devuelve el producto con sus coincidencias guardadas
     }
 
     public function destroy($id){ //elimina el producto
      $producto = ProductosModel::find($id);//busca la primera coincidencia en la base de datos
      if($producto){//si esta el producto realiza lo siguiente
         $producto->delete(); //borra el producto eliminado
         return response()->json(['message'=>'producto eliminado'], 200); //manda por mensaje el producto fue eliminado con exito
      }else{
         return response()->json(['message'=>'no existe el producto'], 404);//manda por mensaje el producto no existe
      }
     }
}
