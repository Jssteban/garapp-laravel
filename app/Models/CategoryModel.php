<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryModel extends Model
{
    use HasFactory;
    
    protected $table = 'categorias';// de esta manera se crea el modelo con la tabla en la base de datos
    protected $fillable = ['nombre','url_imagen','descripcion'];// poner los campos que se van a rellenar

}
