<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductModel extends Model
{
    use HasFactory;
    protected $table = 'product';// de esta manera se crea el modelo con la tabla en la base de datos
    protected $fillable = ['user_id','name','reference','url_img','description','amount','price'];// poner los campos que se van a rellenar

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
       }
}
