<?php

namespace App\Http\Controllers;
use App\Models\RepartidorModel;
use App\Models\UsuariosModel;
use Illuminate\Http\Request;

use function Pest\Laravel\json;

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
        $usuario_id = $request->input('usuario_id');//crea una variabel y busca por la reques a usuario_id en el cuerpo de la solicitud
        $usuarios = UsuariosModel::find(intval($usuario_id));//se busca en el modelo Usuario para ver si existe
        if(! $usuarios){
            return response()->json(['message'=>'usuario no encontrado'], 404);
        }
        if($usuarios->repatidor){ // si hay un repartidor dentro de usuarios manda el siguiente mensaje
          return response()->json(['message'=>'este usuario ya tiene un repartidor'], 400);
        }
        $repatidor = new RepartidorModel(); // utiliza los datos enviados y los datos procesados
        $repatidor->fill($request->all()); //captar todos los datos que venga de la solicitud
        $repatidor->usuario_id = $usuarios->id; // conectar la base de datos mediante el id y grabarlo 
        $repatidor->save(); //guarda el usuario
        
        return response()->json($repatidor); // retorna todo lo que contenga repartidor
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
