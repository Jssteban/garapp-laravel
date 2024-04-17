<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PedidoModel extends Model
{
    use HasFactory;
    protected $table = 'pedido'; //de este mode se crea el modela de la tabla en nuestra base de datos
    protected $fillable = ['fecha','hora','estado'];//va a poner los campos que se van a rellenar
}

