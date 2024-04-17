<?php

namespace App\Http\Controllers;
use App\Models\PedidoModel;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(){
        $pedido = PedidoModel::all(); //hace una peticion para traer todos los datos
        if($pedido->isEmpty()){ //comprueba si el pedido esta vacio
          return response()->json(['message'=>'no existe el pedido'], 404); //manda un mensaje de error
        }
        return $pedido; //retorna todo lo que esta en pedido
    }
    public function store(Request $request){ // crea un nuevo registro en la base de datos
        $pedido = PedidoModel::create($request->all());  //utiliza los datos procesados y los datos enviados
        return $pedido;//retorna todo lo que esta en pedido
    }

    public function show($id){ //trae un pedido por especifico en la base de datos
     $pedido = PedidoModel::find($id);//busca por id la primera coincidencia
     if(! $pedido){ //si no existe el pedido en la base de datos
        return response()->json(['messaje'=>'el pedido no existe'], 404); //manda un mensaje de error

     }
     return $pedido;//retorna el pedido que coincida con el id de la base de datos

    }

    public function update(Request $request , $id){// actualiza un recurso existente en la base de datos
        $pedido = PedidoModel::find($id); //busca por id la primera coincidencia
        if(! $pedido){ //si no existe el pedido en la base de datos
            return response()->json(['massaje'=>'el pedido no existe'], 404); //manda un mensaje de error
        }
        $pedido->fill($request->all()); // toma todos los datos de la solicitud y asigna los atributos correspondientes
        $pedido->save(); //guarda los cambios
        return $pedido; //retorna lo que contenga pedido con sus coincidencias guardadas
    }

    public function destroy($id){ //elimina el pedido de la base de datos
        $pedido = PedidoModel::find($id); //busca por id la primera coincidencia
        if($pedido){ // si esta el pedido realiza lo siguiente
            return response()->json(['messaje'=>'el pedido a sido eliminado'] , 200); //manda un mensaje que el pedido a sido eliminado
        }else{
            return response()->json(['messaje'=>'no pedido el vehiculo'], 404); //manda un mensaje que el pedido no existe
        }
    }
}
