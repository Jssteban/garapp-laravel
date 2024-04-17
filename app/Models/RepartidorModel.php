<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RepartidorModel extends Model
{
    use HasFactory;
    protected $table = 'repartidor'; //de este modo se crea el modelo en la tabla de la base de datos
    protected $fillable = ['numero licencia','cedula', 'soat', 'tecnico mecanica', 'url_imagen_vehiculo'];//esto son los campos que se van a rellenar
}

