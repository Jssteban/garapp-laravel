<?php

namespace App\Http\Controllers;

use App\Models\UsuariosModel;
use Illuminate\Http\Request;

use function Pest\Laravel\delete;

class UsersController extends Controller
{
    public function index(){
        $usuario = UsuariosModel::all();
        if($usuario->isEmpty()){
            return response()->json(['message'=>'no existe el usuario'], 404);
        }
        return $usuario;
    }

    public function store(Request $request){
        $usuario =  UsuariosModel::create($request->all());
       if($usuario){
        return response()->json(['message'=>'el usuario creado','data'=>$usuario]);

       }else{
          return response()->json(['message'=>'el usuario no se creo']);
       }
    }
        

    public function  show($id){
     $usuario = UsuariosModel::find($id);
     if(!$usuario){
        return  response()->json(['message'=>'no existe el usuario'], 404);
     }
     return $usuario;

    }
    public function update(Request $request , $id){
        $usuario = UsuariosModel::find($id);
        if(!$usuario){
            return response()->json(['message'=>'no existe el usuario'], 404);
        }
        $usuario->fill($request->all());
        $usuario->save();
        return $usuario;

    }
    public function  destroy($id){
        $usuario = UsuariosModel::find($id);
        if($usuario){
            $usuario->delete();
            return response()->json(['message'=>'usuario a sido eliminado'], 200);
        }else{
            return response()->json(['message'=>'usuario no exsiste']);
        }

    }

}
