<?php

namespace App\Http\Controllers\FE;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Slider;
use App\Models\Inform;
class HomepageController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $sliders = Slider::all();
       
        return view('fe.homepage', compact('products','sliders'));
    }
   public function inform()
    {
        $inform = Inform::all();
        return view('fe.inform',compact('inform'));
    }
}
