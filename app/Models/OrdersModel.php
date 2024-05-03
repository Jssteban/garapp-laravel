<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrdersModel extends Model
{
    use HasFactory;

    protected $table = 'orders';
    protected $fillable = ['date','status','delivery_id','invoice_id'];

    public function delivery(){
        return $this->hasOne(DeliveryModel::class, 'delivery_id');
    }
    public function invoice(){
        return $this->belongsTo(InvoiceModel::class, 'invoice_id');
    }
    
}
