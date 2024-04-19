<?php

namespace App\Http\Controllers;

use App\Models\UsuariosModel;
use Illuminate\Http\Request;

class UsersController extends Controller
{

    // Lista todos los usuarios de nuestra base de datos
    public function index()
    {
        // Obtener todos los usuarios con sus relaciones de repartidor y productos
        $usuarios = UsuariosModel::with(['repartidor', 'productos'])->get();

        // Verificar si la colección de usuarios está vacía
        if ($usuarios->isEmpty()) {
            return response()->json(['message' => 'La lista de usuarios está vacía'], 404);
        }

        // Formatear los datos de cada usuario
        $usuarios_formateados = $usuarios->map(function ($usuario) {//El método map() itera sobre cada usuario en la colección de usuarios
            return [
                'id' => $usuario->id, // Agregamos el ID del usuario
                'nombre' => $usuario->nombre, // Agregamos el nombre del usuario
                'apellido' => $usuario->apellido, // Agregamos el apellido del usuario
        
                'repartidor' => $usuario->repartidor ? [ // Verificamos si el usuario tiene un repartidor asociado
                    'id' => $usuario->repartidor->id, // Agregamos el ID del repartidor
                    'soat' => $usuario->repartidor->soat, // Agregamos el número de SOAT del repartidor
                    'cedula' => $usuario->repartidor->cedula, // Agregamos el número de cédula del repartidor
                    'numero_licencia' => $usuario->repartidor->numero_licencia // Agregamos el número de licencia del repartidor
                ] : null, // Si no hay repartidor asociado, asignamos null
        
                'productos' => $usuario->productos->map(function ($producto) { // Iteramos sobre los productos asociados al usuario
                    return [
                        'id' => $producto->id, // Agregamos el ID del producto
                        'nombre' => $producto->nombre, // Agregamos el nombre del producto
                        
                    ];
                }),
            ];
        });
        

        // Retornar la respuesta JSON con los usuarios formateados
        return response()->json($usuarios_formateados);
    }

    // Crea un nuevo usuario en nuestra base de datos
    public function store(Request $request)
    {
        // Crear un nuevo usuario con los datos proporcionados en la solicitud
        $usuario =  UsuariosModel::create($request->all());

        // Verificar si el usuario se creó correctamente
        if ($usuario) {
            return response()->json(['message' => 'El usuario ha sido creado', 'data' => $usuario]); // Usuario creado
        } else {
            return response()->json(['message' => 'El usuario no se pudo crear']); // Fallo en la creación del usuario
        }
    }

    // Muestra un usuario específico
    public function  show($id)
    {
        // Buscar un usuario por su ID con la relación de repartidor
        $usuario = UsuariosModel::with('repartidor')->find($id);

        // Verificar si el usuario existe
        if (!$usuario) {
            return  response()->json(['message' => 'No existe el usuario'], 404); // Usuario no encontrado
        }

        // Formatear los datos del usuario
        $usuario_formateado = $usuario->toArray();

        // Verificar si existe un repartidor asociado
        if ($usuario->repartidor) {
            $usuario_formateado['repartidor'] = [
                'id' => $usuario->repartidor->id,
                'soat' => $usuario->repartidor->soat,
                'cedula' => $usuario->repartidor->cedula,
                'numero_licencia' => $usuario->repartidor->numero_licencia
            ];
        } else {
            $usuario_formateado['repartidor'] = null;
        }

        return $usuario_formateado; // Devuelve los datos del usuario
    }

    // Actualiza un recurso en la base de datos
    public function update(Request $request, $id)
    {
        // Buscar un usuario por su ID
        $usuario = UsuariosModel::find($id);

        // Verificar si el usuario no existe
        if (!$usuario) {
            return response()->json(['message' => 'No existe el usuario'], 404); // Usuario no encontrado
        }

        // Actualizar el usuario con los datos de la solicitud
        $usuario->fill($request->all());
        $usuario->save();

        return $usuario; // Devuelve los datos del usuario actualizados
    }

    // Elimina un usuario
    public function  destroy($id)
    {
        // Buscar un usuario por su ID
        $usuario = UsuariosModel::find($id);

        // Verificar si el usuario existe
        if ($usuario) {
            $usuario->delete(); // Eliminar el usuario
            return response()->json(['message' => 'El usuario ha sido eliminado'], 200); // Usuario eliminado con éxito
        } else {
            return response()->json(['message' => 'El usuario no existe']); // Usuario no encontrado
        }
    }
}
