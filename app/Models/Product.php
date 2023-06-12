<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $fillable =['name','slug','description','content','price','discount','quantity','category_id','brand_id'];

    public function category(){
        return $this->belongsTo(Category::class,'category_id');
    }
    public function brand()
{
    return $this->belongsTo(Brand::class,'brand_id');

}
public function productImage(){
    return $this->belongsTo(ProductImage::class,'product_id');
}
}

