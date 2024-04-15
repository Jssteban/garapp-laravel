<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlmacenesModel extends Model
{
    use HasFactory;

    protected $table = 'almacenes'; //de este mode se crea el modela de la tabla en nuestra base de datos
    protected $fillable = ['nombre','numero de telefono','email','nit','direccion','url_imagen'];//va a poner los campos que se van a rellenar
}
