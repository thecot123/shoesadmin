<?php

namespace App\Http\Controllers\FE;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Banner;
use App\Models\ProductComment;



class ProductController extends Controller
{
    public function show($id){
        $categories = Category::all();
        $brands = Brand::all();
        $product = Product::findOrFail($id);

        $avgRating = 0;
        $sumRating = array_sum(array_column($product->productComments->toArray(),'rating'));
        $countRating = count($product->productComments);
        if($countRating != 0){
            $avgRating = $sumRating/$countRating;
        }

        $relatedProducts = Product::where('category_id', $product->category_id)->limit(4)->get();
        
        return view('fe.productDetail',compact('product','avgRating','relatedProducts','categories','brands'),['title' => 'Product Detail']);
    }

    public function postComment(Request $request){
        ProductComment::create($request->all());

        return redirect()->back();
    }

    public function index(Request $request)
    {
        $perPage = $request->show ?? 6;
        $sortBy = $request->sort_by ?? 'lastest';
        $search = $request->search ?? '';
        $products = Product::where('name','like', '%' .$search .'%');

        $products = $this->filter($products, $request);
        $products= $this->sortAndPagination($products,$sortBy,$perPage);

        $categories = Category::all();
        $brands = Brand::all();
        $banners = Banner::all();

        return view('fe.product',compact('products','categories','brands','banners'),['title' => 'Shop']);
    }

    public function categoryOrBrand($name, Request $request)
    {
        $categories = Category::all();
        $brands = Brand::all();
        $banners = Banner::all();
        
        // Get product
        $perPage = $request->show ?? 3;
        $sortBy = $request->sortBy ?? 'lastest';

        $category = Category::where('name', $name)->first();
        $brand = Brand::where('name', $name)->first();

        if ($category) {
            $products = $category->products()->getQuery();
        } elseif ($brand) {
            $products = $brand->products()->getQuery();
        }

        $products = $this->filter($products, $request);

        $products = $this->sortAndPagination($products, $sortBy, $perPage);

        return view('fe.product', compact('categories', 'products', 'brands', 'banners'),['title' => 'Shop']);
    }

    public function sortAndPagination($products, $sortBy,$perPage){
        switch ($sortBy){
            case 'lastest':
                $products = $products->orderBy('id');
                break;
            case 'oldest':
                $products = $products->orderByDesc('id');
                break;
            case 'name-ascending':
                $products = $products->orderBy('name');
                break;
            case 'name-descending':
                $products = $products->orderByDesc('name');
                break;    
            case 'price-ascending':
                $products = $products->orderBy('price');
                break;
            case 'price-descending':
                $products = $products->orderByDesc('price');
                break;  
            default:
                $products = $products->orderBy('id');   
        }

        $products = $products->paginate($perPage);
        $products->appends(['sort_by' => $sortBy, 'show' =>$perPage]);

        return $products;
    }

    public function filter($products, Request $request){
        //Brand
        $brands = $request->brand ?? [];
        $brand_ids = array_keys($brands);
        $products = $brand_ids != null ? $products->whereIn('brand_id', $brand_ids) : $products;
        //Price
        $priceMin = $request->price_min;
        $priceMax = $request->price_max;
        $products = ($priceMin != null && $priceMax != null) ? $products->whereBetween('price', [$priceMin, $priceMax]) : $products;

        // Size
        $size = $request->size;
        $products = $size != null 
            ? $products->whereHas('productDetails', function($query) use ($size){
                return $query->where('size', $size)->where('quantity', '>', 0);
            })
            : $products;

        //color
        $color = $request->color;
        $products = $color != null 
            ? $products->whereHas('productDetails', function($query) use ($color){
                return $query->where('color', $color)->where('quantity', '>', 0);
        })
            : $products;

        return $products;
    }
}
