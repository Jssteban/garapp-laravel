<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsuariosModel extends Model
{
    use HasFactory;
    protected $table = "usuarios"; // de esta manera se crea el modelo con la tabla en la base de datos
    protected $fillable = ['nombre','apellido','numero de telefono','email','numero de cedula','direccion','password','url_imagen','descripcion','genero'];// poner los campos que se van a rellenar

    public function repartidor(){
        return $this->hasOne(RepartidorModel::class, 'usuario_id');
    }

    public function producto(){
        return $this->hasMany(ProductosModel::class, 'usuario_id');
    }

}
