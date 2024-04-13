<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsuariosModel extends Model
{
    use HasFactory;
    protected $table = "usuarios";
    protected $fillable = ['nombre','apellido','numero de telefono','email','numero de cedula','direccion','password','url_imagen','descripcion','genero'];

}
