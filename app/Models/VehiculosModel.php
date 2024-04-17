<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VehiculosModel extends Model
{
    use HasFactory;
    protected $table ='vehiculos'; // de este modo se crea el modelo de nuestra tabla de base de datos
    protected $fillable =['marca','modelo','anoi','color','tipo','color'];// esto son los campos que se van a rellenar
}

