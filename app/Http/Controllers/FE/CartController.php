<?php

namespace App\Http\Controllers\FE;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use App\Models\CartItem;
use App\Models\Coupon;


class CartController extends Controller
{
    public function addCart(Request $request)
    {
        try {
            $pid = $request->pid;
            $quantity = $request->quantity;
            $size = $request->size;

            $cart = [];
            if ($request->session()->has('cart')) {
                $cart = $request->session()->get('cart');
            }

            $prod = Product::find($pid);

            if (isset($cart[$pid])) {
                $cartItem = $cart[$pid];
                $cartItem->quantity += $quantity;
                $cartItem->size = $size;
            } else {
                $cartItem = new CartItem($prod, $quantity,$size);
            }

            $cart[$pid] = $cartItem;
            $request->session()->put('cart', $cart);

            return 1;
        } catch (\Exception $th) {
            return 0;
        }
    }

    public function updateCartQty(Request $request)
    {
        $productId = $request->input('productId');
        $quantity = $request->input('quantity');

        if ($request->session()->has('cart')) {
            $cart = $request->session()->get('cart');
            if (isset($cart[$productId])) {
                $cart[$productId]->quantity = $quantity;
                $request->session()->put('cart', $cart);
            }
        }

        return response()->json(['success' => true]);
    }
 
     public function clearCart(Request $request){
         if($request->session()->has('cart')){
             $request->session()->forget('cart');
         }
     }
 
     public function viewCart(Request $request)
     {
        $categories = Category::all();
        $brands = Brand::all();
        return view('fe.viewCart',compact('categories','brands'),['title' => 'View Cart']);
         
     }
 
    public function updateCart(Request $request)
    {
        $pids = $request->pids;
        $qties = $request->qties;
        $cart = $request->session()->get('cart');
        $discount = $request->session()->get('discount'); 

        $total = 0; 

        for ($i = 0; $i < count($pids); $i++) {
            $productId = $pids[$i];
            $quantity = $qties[$i];

            if (isset($cart[$productId])) {
                $cart[$productId]->quantity = $quantity;

                $product = $cart[$productId]->product;
                $price = $product->discount ? $product->discount : $product->price;
                $subtotal = $price * $quantity;

                $cart[$productId]->subtotal = $subtotal;
                $total += $subtotal;
            }
        }

        if ($discount) {
            $total -= $discount;
        }

        $request->session()->put('cart', $cart);

        return response()->json(['success' => true]);
    }
 
     public function removeCartItem(Request $request){
         $pid = $request->pid;
         $cart = $request->session()->get('cart');
         unset($cart[$pid]);
         $request->session()->put('cart',$cart);   
 
     }

    public function applyCoupon(Request $request)
    {
        $couponCode = $request->input('coupon_code');
        $coupon = Coupon::where('code', $couponCode)->first();

        if ($coupon) {
            $currentDate = now();
            $expiryDate = $coupon->expiry_date;
    
            if ($expiryDate && $currentDate > $expiryDate) {
                $request->session()->forget('discount');
                return redirect()->back()->with('error', 'The coupon has expired.');
            }
    
            $discountAmount = $coupon->discount_amount;
            $request->session()->put('discount', $discountAmount);
            return redirect()->back()->with('success', 'Coupon applied successfully.');
        } else {
            $request->session()->forget('discount');
            return redirect()->back()->with('error', 'Invalid coupon code.');
        }
    }
}
