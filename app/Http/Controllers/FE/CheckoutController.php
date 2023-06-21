<?php

namespace App\Http\Controllers\FE;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\Brand;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Mail;

class CheckoutController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function checkout(){
        $categories = Category::all();
        $brands = Brand::all();
        return view('fe.checkout',compact('categories','brands'),['title' => 'Check Out']);
    }

    public function saveCart(Request $request){
        if($request->payment_type == 'pay_later'){
            $uid = $request->uid;
            $ord = new Order();
            $ord->user_id = $uid;
            $ord->first_name = $request->first_name;
            $ord->last_name = $request->last_name;
            $ord->email = $request->email;
            $ord->address = $request->address;
            $ord->phone = $request->phone;
            $ord->country = $request->country;
            $ord->city = $request->city;
            $ord->status = 'pending';
            $ord->payment_type = $request->payment_type;
            $ord->save();
    
            $carts = $request->session()->get('cart');
            $details = [];
            $total = 0;
            foreach($carts as $item){
                $productPrice = $item->product->discount != null ? $item->product->discount : $item->product->price;
                $detail = new OrderItem();
                $detail->product_id = $item->product->id;
                $detail->quantity = $item->quantity;
                $detail->size = $item->size;
                $detail->amount = $productPrice;
                $detail->total = $productPrice * $item->quantity;
                $details[] = $detail;
                $total += $detail->total;
            }
    
            $ord->orderItems()->saveMany($details);
            $request->session()->forget('cart');

            //send mail
            $this->sendEmail($ord, $total);

            if($request->session()->has('discount')){
                $request->session()->forget('discount');
            }
            return redirect()->route('shop');   
            
        }
    }

    private function sendEmail($order, $total){
        $email_to = $order->email;
        Mail::send('fe.email', compact('order','total') , function ($message) use ($email_to) {
            $message->from('caovanchien2003@gmail.com','shoes');
            $message->to($email_to, $email_to);
            $message->subject('Order Notification');
        });
    }
}
