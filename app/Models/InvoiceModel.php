<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceModel extends Model
{
    use HasFactory;
    protected $table = 'invoice'; //de este mode se crea el modela de la tabla en nuestra base de datos
    protected $fillable = ['date','hour','total_pay','order_id'];//va a poner los campos que se van a rellenar

    public function order(){
     return $this->hasOne(OrdersModel::class, 'order_id');
    }
}

