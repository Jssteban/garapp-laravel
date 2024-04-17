<?php

namespace App\Http\Controllers;
use App\Models\FacturaModel;
use Illuminate\Http\Request;

class BillController extends Controller
{
    public function index(){
        $factura = FacturaModel::all(); //hace una peticion para traer todos los datos
        if($factura->isEmpty()){ //comprueba si la factura esta vacio
            return response()->json(['message'=>'no existe la factura'], 404); //manda un mensaje 
        }
        return $factura; //retorna todo lo que contenga factura
    }
    public function store(Request $request){ //crea un nuevo registro en la base de datos
        $factura = FacturaModel::create($request->all()); // utiliza los datos enviados y los datos procesados
        return $factura; // retorna todo lo que contenga factura
    }

    public function show($id){
        $factura = FacturaModel::find($id); //busca id por la primera coincidencia
        if(! $id){ //si no existe la factura en la base de datos
            return response()->json(['message'=>'la factura no existe'], 404); //manda un mensaje de error
        }
        return $factura; //retorna todo lo que contenga factura
    }
    public function update(Request $request , $id){
        $factura = FacturaModel::find($id); //busca id por la primera coincidencia
        if(! $factura){ //si factura no existe en la base de datos
            return response()->json(['messaje'=>'la factura no existe'], 404); //manda un mensaje de error
        }
        $factura->fill($request->all()); //toma los datos de la solicitud y asigna los atributos correspondientes 
        $factura->save(); //guarda los cambios realizados
        return $factura; //retorna todo lo que contenga factura
    }
    public function destroy($id){ //elimina la factura de la base de datos
        $factura = FacturaModel::find($id); //busca id por la primera coincidencia
        if($factura){ //si esta la factura hace lo siguiente
            return response()->json(['messaje'=>'la factura se elimino'], 200); //manda un mensaje que la factura a sido eliminado
        }else{
            return response()->json(['messaje'=>'la factura no existe'] , 404); //manda un mensaje que la factura no existe
        }

    }
}
