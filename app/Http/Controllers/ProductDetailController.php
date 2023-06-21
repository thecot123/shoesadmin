<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductDetail;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductDetailController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $prdtel = ProductDetail::all();
        return view('product', compact('prdtel'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $prdtel = ProductDetail::all();
        $product = Product::all();
        return view('productdetail.create', compact('prdtel','product'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $id = $request->input('id');

    // Tiếp tục xử lý dựa trên $selectedProductId

    // Ví dụ: Lấy thông tin sản phẩm từ $selectedProductId
    $product = Product::findOrFail($id);
        $request->validate([
             
        
            

        ]);


        $productDetail = new ProductDetail();
        $productDetail->fill([
            'product_id' => $product->id,
            'color' => $request->color,
            'quantity' => $request->quantity,
            'size' => $request->size,
        ]);
        $productDetail->save();

        return redirect('/product')->withSuccess('Product created successfully.');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
