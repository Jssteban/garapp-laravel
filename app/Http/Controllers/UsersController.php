<?php

namespace App\Http\Controllers;

use App\Models\UsuariosModel;
use Illuminate\Http\Request;

use function Pest\Laravel\delete;

class UsersController extends Controller
{

    // lista todos los usuarios de nuestra base de datos
    public function index()
    {
        $usuarios = UsuariosModel::with(['repartidor', 'productos'])->get(); //agregar las tablas con las que el modelo tiene relaciones 

        if ($usuarios->isEmpty()) { // si esta vacio manda un mensaje
            return response()->json(['message' => 'La lista de usuarios está vacía'], 404);
        }

        $usuarios_formateados = $usuarios->map(function ($usuario) { //mapeamos nuestro array de usuarios
            return [
                'id' => $usuario->id,
                'nombre' => $usuario->nombre,
                'apellido' => $usuario->apellido,
                // Agregar otros campos del usuario aquí
                'repartidor' => $usuario->repartidor ? [
                    'id' => $usuario->repartidor->id,
                    'soat' => $usuario->repartidor->soat,
                    'cedula' => $usuario->repartidor->cedula,
                    'numero_licencia' => $usuario->repartidor->numero_licencia
                ] : null,
                'productos' => $usuario->productos->map(function ($producto) {
                    return [
                        'id' => $producto->id,
                        'nombre' => $producto->nombre,
                        // Agregar otros campos del producto aquí si es necesario
                    ];
                }),
            ];
        });

        return response()->json($usuarios_formateados);
    }

    public function store(Request $request)
    { //crea un nuevo usuario en nuestra base de datos
        $usuario =  UsuariosModel::create($request->all());

        if ($usuario) { // si se crea el usuario manda el siguiente mensaje
            return response()->json(['message' => 'el usuario creado', 'data' => $usuario]); //el usuario se a creado

        } else {
            return response()->json(['message' => 'el usuario no se creo']); //el usuario no se a creado
        }
    }

    public function  show($id)
    { //tre un usuario en especifico o busca un suario en especifico
        $usuario = UsuariosModel::with('repartidor')->find($id); //incluyendo la conexion con repartidor busca por id la primero coincidencia 

        if (!$usuario) { //si no existe el usuario en la base de datos manda un mensaje de error
            return  response()->json(['message' => 'no existe el usuario'], 404);
        }
        $usuario_array = $usuario->toArray(); //creamos un array o formateamos a nuestra variable usuario 
        if ($usuario->repartidor) { //si existe el repartido se añade la informacion a nuestro array de usuario
            $usuario_array['repartidor'] = [
                'id' => $usuario->repartidor->id,
                'soat' => $usuario->repartidor->soat,
                'cedula' => $usuario->repartidor->cedula,
                'numero_licencia' => $usuario->repartidor->numero_licencia
            ];
        } else {
            $usuario_array['repartidor'] = null;
        }
        return $usuario; //devuelve el usuario que coincida con la base de datos


    }
    public function update(Request $request, $id)
    { //actualiza un recurso en la base de datos
        $usuario = UsuariosModel::find($id); //busca por id la primera coincidencia en nuestra base de datos
        if (!$usuario) {
            return response()->json(['message' => 'no existe el usuario'], 404); // manda un mensaje que la coincidencia no existe
        }
        $usuario->fill($request->all()); //asigna todo lo que contenga  el cuerpo de la solicitud
        $usuario->save(); //guarda la solicitud
        return $usuario; // devuelve el usuario con las coincidencias guardadas

    }
    public function  destroy($id)
    { //elimina el usuario
        $usuario = UsuariosModel::find($id); //busca la primera coincidencia en la base de datos
        if ($usuario) { //si esta el usuario realiza lo siguiente
            $usuario->delete(); //borra el usuario
            return response()->json(['message' => 'usuario a sido eliminado'], 200); //manda un mensaje que el usuario fue eliminado con exito
        } else {
            return response()->json(['message' => 'usuario no exsiste']); //manda por mensaje que el usuario no existe
        }
    }
}
