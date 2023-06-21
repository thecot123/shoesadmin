<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'order';
    protected $fillable =['user_id','first_name','last_name','email','phone','country','city','payment_type','status'];

    public function orderItems(){
        return $this->hasMany(OrderItem::class,'order_id','id');
    }

    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }
}
 
