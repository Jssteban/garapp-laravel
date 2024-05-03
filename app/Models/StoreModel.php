<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StoreModel extends Model
{
    use HasFactory;

    protected $table = 'store'; //de este mode se crea el modela de la tabla en nuestra base de datos
    protected $fillable = ['name','phone_number','email','nit','address','url_img'];//va a poner los campos que se van a rellenar
}
