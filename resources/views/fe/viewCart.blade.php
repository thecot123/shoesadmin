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
                                <li class="breadcrumb-item active" aria-current="page">Shopping Cart</li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb area end -->

    <!-- Shopping Cart Section Begin -->
    <div class="shopping-card spad">
        <div class="container">
            <div class="row">
                @if (is_array(\Session::get('cart')) && count(\Session::get('cart')) > 0)
                <div class="col-lg-12">
                    <div class="cart-table">
                        <table>
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th class="p-name">Product Name</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th><i class="fa fa-times"></i></th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $total = 0;
                                @endphp
                                @if (is_array(\Session::get('cart')) && count(\Session::get('cart')) > 0)
                                    @foreach(\Session::get('cart') as $item)
                                    <tr>
                                        <td class="cart-pic first-row">
                                            <img src="{{ asset('/images/' . $item->product->productImages[0]->photo) }}" alt="{{ $item->product->name }}" style="width:140px;height:auto;">
                                        </td>
                                        <td class="cart-title first-row">
                                            <h5>{{ $item->product->name }}</h5>
                                            <div class="size"><p>Size: <span>{{ $item->size }}</span></p></div>
                                        </td>
                                        @if($item->product->discount != null)
                                        <td class="p-price first-row">${{ number_format($item->product->discount, 2) }}</td>                                       
                                        @else
                                        <td class="p-price first-row">${{ number_format($item->product->price, 2) }}</td>                                      
                                        @endif
                                        <td class="qua-col first-row">
                                            <div class="quantity">
                                                <div class="pro-qty">
                                                    <input type="text" value="{{ $item->quantity }}" data-pid="{{ $item->product->id }}" >
                                                </div>
                                            </div>
                                        </td>
                            
                                        @if($item->product->discount != null)
                                        <td class="total-price first-row">${{ number_format($item->product->discount * $item->quantity, 2) }}</td>                                       
                                        @else
                                        <td class="total-price first-row">${{ number_format($item->product->price * $item->quantity, 2) }}</td>                                      
                                        @endif       
                                        @php
                                        if ($item->product->discount != null) {
                                            $subtotal = $item->product->discount * $item->quantity;
                                        } else {
                                            $subtotal = $item->product->price * $item->quantity;
                                        }
                                        $total += $subtotal;
                                        @endphp                                   
                                        <td class="close-td first-row">
                                            <a href="#" data-pid="{{ $item->product->id }}"><i class="fa fa-times"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                @endif
                            </tbody>
                            
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="cart-buttons">
                                <a href="{{ Route('shop') }}" class="primary-btn continue-shop">Continue Shopping</a>
                                <a href="#" class="primary-btn up-cart update__btn">Update Cart</a>
                            </div>
                            <div class="discount-coupon">
                                <h6>Discount Codes</h6>
                                <form method="post" action="{{ Route('applyCoupon') }}" class="coupon-form">
                                    @csrf
                                    <input type="text" name="coupon_code" placeholder="Enter your code">
                                    <button type="submit" class="site-btn coupon-btn">Apply</button>
                                </form>
                                @if (session('error'))
                                    <div class="alert alert-danger">
                                        {{ session('error') }}
                                    </div>
                                @endif        
                            </div>
                        </div>
                        <div class="col-lg-4 offset-lg-4">
                            <div class="proceed-checkout">
                                @if (\Session::has('discount'))
                                    @php
                                    $discount = \Session::get('discount');
                                    @endphp
                                    <ul>
                                        <li class="subtotal">Subtotal <span>${{ number_format($total, 2) }}</span></li>
                                        <li class="discount">Discount <span>-${{ number_format($discount, 2) }}</span></li>
                                        <li class="cart-total">Total <span>${{ number_format($total - $discount, 2) }}</span></li>
                                    </ul>
                                @else
                                    <ul>
                                        <li class="subtotal">Subtotal <span>${{ number_format($total, 2) }}</span></li>
                                        <li class="cart-total">Total <span>${{ number_format($total, 2) }}</span></li>
                                    </ul>
                                @endif
                                <a href="{{ Route('checkout') }}" class="proceed-btn">PROCEED TO CHECK OUT</a>
                            </div>
                        </div>
                    </div>
                </div>
                @else
                    <div class="cart-empty col-lg-12">
                        <h5>There are no items in the shopping cart.</h5>
                    </div>
                @endif
            </div>
        </div>
    </div>
    <!-- Shopping Cart Section End -->
</div>
@endsection

@section('myjs')
<script>       
    $('.cart-buttons .update__btn').click(function(e) {
        e.preventDefault();
        
        let pids = [];
        let qties = [];
        $('.pro-qty input[type="text"]').each(function(index, value) {
            pids.push($(value).data('pid'));
            qties.push($(value).val());
        });
        let url = "{{ Route('updateCart') }}";
            $.ajax({
                type: 'post',
                url: url,
                data: {
                    pids: pids,
                    qties: qties,
                    _token: '{{ csrf_token() }}',
                }, success: function(data) {
                    if (data.success) {
                        // Cập nhật tổng tiền và reload trang
                        location.reload();
                    }
                }
            });
        });

    $('.close-td a').click(function(e) {
        e.preventDefault();

        const pid = $(this).data('pid');
        let url = "{{ Route('removeCartItem') }}";
        $.ajax({
            type: 'post',
            url: url,
            data: {
                pid: pid,
                _token: '{{ csrf_token() }}',
            }, success: function(data) {
                location.reload();
            }
        });
    });
</script>
@endsection