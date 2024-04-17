<?php

namespace App\Http\Controllers;
use App\Models\VehiculosModel;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    public function index(){
        $vehiculo = VehiculosModel::all(); //hace una peticion para traer todos los datos
        if($vehiculo->isEmpty()){ //comprueba si el vehiculo esta vacio
          return response()->json(['message'=>'no existe el vehiculo'], 404); //manda un mensaje de error
        }
        return $vehiculo; //retorna todo lo que esta en vehiculo
    }
    public function store(Request $request){ // crea un nuevo registro en la base de datos
        $vehiculo = VehiculosModel::create($request->all());  //utiliza los datos procesados y los datos enviados
        return $vehiculo;//retorna todo lo que esta en vehiculo
    }

    public function show($id){ //trae un vehiculo por especifico en la base de datos
     $vehiculo = VehiculosModel::find($id);//busca por id la primera coincidencia
     if(! $vehiculo){ //si no existe el vehiculo en la base de datos
        return response()->json(['messaje'=>'el vehiculo no existe'], 404); //manda un mensaje de error

     }
     return $vehiculo;//retorna el vehiculo que coincida con el id de la base de datos

    }

    public function update(Request $request , $id){// actualiza un recurso existente en la base de datos
        $vehiculo = VehiculosModel::find($id); //busca por id la primera coincidencia
        if(! $vehiculo){ //si no existe el vehiculo en la base de datos
            return response()->json(['massaje'=>'el vehiculo no existe'], 404); //manda un mensaje de error
        }
        $vehiculo->fill($request->all()); // toma todos los datos de la solicitud y asigna los atributos correspondientes
        $vehiculo->save(); //guarda los cambios
        return $vehiculo; //retorna lo que contenga vehiculo con sus coincidencias guardadas
    }

    public function destroy($id){ //elimina el vehiculo de la base de datos
        $vehiculo = VehiculosModel::find($id); //busca por id la primera coincidencia
        if($vehiculo){ // si esta el vehiculo realiza lo siguiente
            return response()->json(['messaje'=>'el vehiculo a sido eliminado'] , 200); //manda un mensaje que el vehiculo a sido eliminado
        }else{
            return response()->json(['messaje'=>'no existe el vehiculo'], 404); //manda un mensaje que el vehiculo no existe
        }
    }
}
