<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    use HasFactory;
    protected $fillable =['product_id','photo'];
    public function products(){
        return $this->belongTo(Product::class, 'product_id');
    }

}
