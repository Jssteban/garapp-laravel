<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryModel extends Model
{
    use HasFactory;
    protected $table = 'delivery'; //de este modo se crea el modelo en la tabla de la base de datos
    protected $fillable = ['user_id','driver_licence','identification_number', 'soat_number', 'technical_inspection', 'url_img_vehicle','vehicle_id'];//esto son los campos que se van a rellenar

   public function user(){
    return $this->belongsTo(User::class, 'user_id');
   }
   public function vehicle(){
    return $this->belongsTo(VehicleModel::class, 'vehicle_id');
   }
}

