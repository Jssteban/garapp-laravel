<?php

namespace App\Http\Controllers;
use App\Models\RepartidorModel;
use Illuminate\Http\Request;

class DeliveryController extends Controller
{
    public function index(){
        $repatidor = RepartidorModel::all(); //hace una peticion para traer todos los datos
        if($repatidor->isEmpty()){ //comprueba si el repartidor esta vacio
            return response()->json(['message'=>'no existe el repartidor'], 404); //manda un mensaje 
        }
        return $repatidor; //retorna todo lo que contenga repartidor
    }
    public function store(Request $request){ //crea un nuevo registro en la base de datos
        $repatidor = RepartidorModel::create($request->all()); // utiliza los datos enviados y los datos procesados
        return $repatidor; // retorna todo lo que contenga repartidor
    }

    public function show($id){
        $repatidor = RepartidorModel::find($id); //busca id por la primera coincidencia
        if(! $id){ //si no existe el repartidor en la base de datos
            return response()->json(['message'=>'El repartidor no existe'], 404); //manda un mensaje de error
        }
        return $repatidor; //retorna todo lo que contenga repartidor
    }
    public function update(Request $request , $id){
        $repatidor = RepartidorModel::find($id); //busca id por la primera coincidencia
        if(! $repatidor){ //si repartidor no existe en la base de datos
            return response()->json(['messaje'=>'El repartidor no existe'], 404); //manda un mensaje de error
        }
        $repatidor->fill($request->all()); //toma los datos de la solicitud y asigna los atributos correspondientes 
        $repatidor->save(); //guarda los cambios realizados
        return $repatidor; //retorna todo lo que contenga repartidor
    }
    public function destroy($id){ //elimina el repatidor de la base de datos
        $repatidor = RepartidorModel::find($id); //busca id por la primera coincidencia
        if($repatidor){ //si esta el repartidor hace lo siguiente
            return response()->json(['messaje'=>'El repartidor se elimino'], 200); //manda un mensaje que el repatidor a sido eliminado
        }else{
            return response()->json(['messaje'=>'El repartidor no existe'] , 404); //manda un mensaje que el repartidor no existe
        }

    }
}
