@extends('fe.layout.layout')

@section('contents')
<div class="wrapper box-layout">
    <!-- breadcrumb area start -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-wrap">
                        <nav aria-label="breadcrumb">
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ Route('home') }}">Home</a></li>
                                <li class="breadcrumb-item"><a href="{{ Route('shop') }}">Shop</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Check Out</li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb area end -->

    <!-- Checkout Cart Section Begin -->
    <div class="checkout-section spad">
        <div class="container">
            <form method="post" action="{{ Route('saveCart') }}" class="checkout-form">
                @csrf
                <input type="hidden" name="uid" value="{{  Auth::user()->id }}">
                <div class="row">
                    <div class="col-lg-6">
                        <h4>Billing Details</h4>
                        <div class="row">
                            <div class="col-lg-6">
                                <label for="fir">First Name <span>*</span></label>
                                <input type="text" id="fir" name="first_name" value="{{  Auth::user()->name }}" required>
                            </div>
                            <div class="col-lg-6">
                                <label for="last">Last Name <span>*</span></label>
                                <input type="text" id="last" name="last_name" value="{{  Auth::user()->last_name }}" required>
                            </div>
                            <div class="col-lg-12">
                                <label for="cun">Country <span>*</span></label>
                                <input type="text" id="cun" name="country" required>
                            </div>
                            <div class="col-lg-12">
                                <label for="town">Town / City <span>*</span></label>
                                <input type="text" id="town" name="city" required>
                            </div>
                            <div class="col-lg-12">
                                <label for="street">Street Address <span>*</span></label>
                                <input type="text" id="street" class="street-first" name="address" required>
                            </div>
                            <div class="col-lg-6">
                                <label for="email">Email <span>*</span></label>
                                <input type="text" id="email" name="email" value="{{  Auth::user()->email }}" required>
                            </div>
                            <div class="col-lg-6">
                                <label for="phone">Phone <span>*</span></label>
                                <input type="text" id="phone" name="phone" required>
                            </div>
                            
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="place-order">
                            <h4>Your Order</h4>
                            <div class="order-total">
                                <ul class="order-table">
                                    @php
                                    $total = 0;
                                    $discount = session('discount', 0);
                                    @endphp
                                    <li>Product <span>Total</span></li>
                                    @if (\Session::has('cart'))
                                        @foreach(\Session::get('cart') as $item)
                                            @php
                                            $productPrice = $item->product->discount != null ? $item->product->discount : $item->product->price;
                                            $subtotal = $productPrice * $item->quantity;
                                            $total += $subtotal;
                                            @endphp
                                            <li>
                                                {{$item->product->name}} (size: {{$item->size}}) x {{$item->quantity}}
                                                <span>${{ number_format($subtotal, 2) }}</span>
                                            </li>
                                        @endforeach
                                    @endif

                                    <li class="fw-normal">Subtotal <span>${{ number_format($total,2) }}</span></li>
                                    @if ($discount > 0)
                                        <li class="fw-normal">Discount <span>- ${{number_format($discount, 2)}}</span></li>
                                        <li class="total-price">Total <span>${{number_format($total - $discount, 2)}}</span></li>
                                    @else
                                        <li class="total-price">Total <span>${{number_format($total, 2)}}</span></li>
                                    @endif
                                </ul>
                                <div class="payment-check">
                                    <div class="pc-item">
                                        <label for="pc-check">
                                            <p>Pay later</p>
                                            <input type="radio" id="pc-check" name="payment_type" value="pay_later" checked>
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    <div class="pc-item">
                                        <label for="pc-paypal">
                                            <p>Online payment</p> 
                                            <input type="radio" id="pc-paypal" name="payment_type" value="online_payment">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                </div>
                                <div class="order-btn">
                                    <button type="submit" class="site-btn place-btn">Place Order</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- Checkout Cart Section End -->       
</div>
@endsection

