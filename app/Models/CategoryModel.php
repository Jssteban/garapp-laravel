<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryModel extends Model
{
    use HasFactory;
    
    protected $table = 'category';// de esta manera se crea el modelo con la tabla en la base de datos
    protected $fillable = ['name','url_img','description'];// poner los campos que se van a rellenar

}
