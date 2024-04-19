<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RepartidorModel extends Model
{
    use HasFactory;
    protected $table = 'repartidores'; //de este modo se crea el modelo en la tabla de la base de datos
    protected $fillable = ['usuario_id','numero_licencia','cedula', 'soat', 'tecnico_mecanica', 'url_imagen_vehiculo'];//esto son los campos que se van a rellenar

   public function usuario(){
    return $this->belongsTo(UsuariosModel::class, 'usuario_id');
   }
}

