<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductComment extends Model
{
    use HasFactory;
    protected $table = 'product_comments';
    protected $fillable =['email','name','messages','rating','product_id'];

    public function product(){
        return $this->belongsTo(Product::class,'product_id','id');
    }
}
