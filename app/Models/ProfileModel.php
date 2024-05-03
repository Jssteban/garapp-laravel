<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfileModel extends Model
{
    use HasFactory;
    protected $table = "profile"; // de esta manera se crea el modelo con la tabla en la base de datos
    protected $fillable = ['last_name','phone_number','identification','address','url_img','description','gender','user_id'];// poner los campos que se van a rellenar

    public function user(){
        return $this->hasOne(User::class, 'user_id');
    }

    

}
