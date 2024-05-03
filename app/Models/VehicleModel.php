<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VehicleModel extends Model
{
    use HasFactory;
    protected $table ='vehicle'; // de este modo se crea el modelo de nuestra tabla de base de datos
    protected $fillable =['brand','model','year','color','enroll','type'];// esto son los campos que se van a rellenar
}

