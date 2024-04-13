<?php

namespace App\Http\Controllers;

use App\Models\CategoryModel;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    //lista todo las categorias de nuestra base de datos
    public function index()
    {
        $categorias = CategoryModel::all(); //hace peticion para traer todos los datos
        if ($categorias->isEmpty()) { //comprueba si productos esta basio y devuelve un mensaje de error
            return response()->json(['message' => 'no existe categorias'], 404);
        }
        return $categorias; //retorna todo lo que esta en el producto

    }
    public function store(Request $request) //crea un nuevo recurso en nuestra base de datos
    {
        $categorias = CategoryModel::create($request->all());
        return $categorias;
    }

    public function show($id)
    {  //trae un producto en espesifico
        //busca un producto en especifico
        $categorias = CategoryModel::find($id); //busca por id la primera coincidencia 
        if (!$categorias) { // si no existe el producto en la base de datos devuelve un mensaje de error 
            return response()->json(['message' => 'no existe producto'], 404);
        }
        return $$categorias; //devuelve el producto que coincide con el id dentro de la base de datos
    }

    public function update(Request $request, $id)
    { //actualizar uhn recurso existente en la base de datos
        $categorias = CategoryModel::find($id); // busca por id la primera coincidencia en la base de datos
        if (!$categorias) {
            return response()->json(['message' => 'no existe producto'], 404); //manda un mensaje que la condicion no existe 
        }

        $categorias->fill($request->all()); // asigna todo lo que contenga el cuerpo de la solicitud
        $categorias->save(); //me guarda la solicitud
        return $categorias; //devuelve el producto con sus coincidencias guardadas
    }

    public function destroy($id)
    { //elimina la categoria
        $categorias = CategoryModel::find($id); //busca la primera coincidencia en la base de datos
        if ($categorias) { //si esta la categoria realiza lo siguiente
            $categorias->delete(); //borra la categoria eliminado
            return response()->json(['message' => 'categoria eliminado'], 200); //manda por mensaje que la categoria fue eliminado con exito
        } else {
            return response()->json(['message' => 'no existe el categoria'], 404); //manda por mensaje que la categoria no existe
        }
    }
}
