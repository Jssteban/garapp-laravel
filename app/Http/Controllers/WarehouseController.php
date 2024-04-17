<?php

namespace App\Http\Controllers;

use App\Models\AlmacenesModel;
use Illuminate\Http\Request;

class WarehouseController extends Controller
{
    public function index()
    {
        $almacen = AlmacenesModel::all(); //hace una peticion para traer todos los datos
        if ($almacen->isEmpty()) { //comprueba si el almacen esta vacio y manda un mensaje de error
            return response()->json(['messaje' => 'no existe el almacen', 404]);
        }
        return $almacen; //retorna todo lo que esta en almacen
    }

    public function store(Request $request)
    { //crea un nuevo almacen en nuestra base de datos
        $almacen = AlmacenesModel::create($request->all());
        if ($request) { //si se crea el almacen manda el siguiente mensaje
            return response()->json(['messaje' => 'el almacen se a creado exitosamente', 'data' => $almacen]); //el almacen se a creado
        } else {
            return response()->json(['messaje' => 'el almacen no se creo']); //el almacen no se creo
        }
    }
    public function show($id){ //trae un almacen en especifico
        $almacen = AlmacenesModel::find($id);//busca el id por la primera coincidencia
        if(!$almacen){ //si no existe el almacen en la base de datos manda un mensaje de error
            return  response()->json(['message'=>'no existe el almacen'], 404);
         }
         return $almacen; //devuelve el almacen que coincida con la base de datos
    }
    public function update(Request $request , $id){ //actualiza un recurso en la base de datos
        $almacen = AlmacenesModel::find($id); //busca por id la primera coincidencia en nuestra base de datos
        if(!$almacen){
            return response()->json(['message'=>'no existe el almacen'], 404); // manda un mensaje que la coincidencia no existe
        }
        $almacen->fill($request->all()); //asigna todo lo que contenga  el cuerpo de la solicitud
        $almacen->save(); //guarda la solicitud
        return $almacen; // devuelve el almacen con las coincidencias guardadas

    }
    public function  destroy($id){ //elimina el almacen
        $almacen = AlmacenesModel::find($id); //busca la primera coincidencia en la base de datos
        if($almacen){ //si esta el almacen realiza lo siguiente
            $almacen->delete();//borra el almacen
            return response()->json(['message'=>'el almacen a sido eliminado'], 200);//manda un mensaje que el almacen fue eliminado con exito
        }else{
            return response()->json(['message'=>'el almacen no exsiste']); //manda por mensaje que el almacen no existe
        }

    }
}
