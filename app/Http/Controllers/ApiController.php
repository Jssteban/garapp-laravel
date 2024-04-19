<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request; //es lo que va a conectar la base de datos
use Mockery\Undefined;

class ApiController extends Controller
{
    //es generar un token de seguridad el cual va a ser utilizado en el encabezado de todas nuestras solicitudes http
    public function csfrToken(){
      $token = csrf_token();
      return response()->json(['csrf_token'=>$token]);
      
    }
   
}
