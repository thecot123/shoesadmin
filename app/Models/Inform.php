<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inform extends Model
{
    use HasFactory;
    protected $table = 'inform';
    protected $fillable =['photo','title','content'];

}
