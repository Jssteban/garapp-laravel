<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductosModel extends Model
{
    use HasFactory;
    protected $table = 'productos';// de esta manera se crea el modelo con la tabla en la base de datos
    protected $fillable = ['nombre','referencia','descripcion','url_imagen','cantidad','precio'];// poner los campos que se van a rellenar
}
