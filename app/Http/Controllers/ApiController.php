<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; //es lo que va a conectar la base de datos
use App\Models\ProductosModel;

class ApiController extends Controller
{
    public function csfrToken(){
      $token = csrf_token();
      return response()->json(['csrf_token'=>$token]);
      
    }
    public function index()
    {
        $productos = ProductosModel::all();
        if($productos->isEmpty()){
            return response()->json(['message'=>'no existe productos'], 404);
        } 
        return $productos; //retorna todo lo que esta en el producto
        
    }
    public function store(Request $request)
    {
        $producto = ProductosModel::create($request->all());
        return $producto;
    }
}
