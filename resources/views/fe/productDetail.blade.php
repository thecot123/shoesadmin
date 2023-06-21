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
                                <li class="breadcrumb-item active" aria-current="page">Product Detail</li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb area end -->

    <!-- Product Shop Section Begin -->
    <div class="page-main-wrapper pb-20">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="product-pic-zoom">
                        <img class="product-big-img" src="{{ asset('/images/' . $product->productImages[0]->photo) }}"
                            alt="">

                    </div>
                    <div class="product-thumbs">
                        <div class="product-thumbs-track ps-slider owl-carousel">
                            @foreach($product->productImages as $index => $productImage)
                            <div class="pt{{ $index === 0 ? ' active' : '' }}"
                                data-imgbigurl="{{ asset('/images/' . $productImage->photo) }}">
                                <img src="{{ asset('/images/' . $productImage->photo) }}" alt="" width="183.33px"
                                    height="183.33px">
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="product-details">
                        <div class="pd-title">
                            <span></span>
                            <h3>{{ $product->name }}</h3>
                            <a href="#" class="heart-icon"><i class="icon_heart_alt"></i></a>
                        </div>
                        <div class="pd-rating">
                            @for($i = 1; $i <=5; $i++) @if($i <=$avgRating) <i class="fa fa-star"></i>
                                @else
                                <i class="fa fa-star-o"></i>
                                @endif
                                @endfor
                                <span>({{ count($product->productComments)}})</span>
                        </div>
                        <div class="pd-desc">
                            <p>{{ $product->description }}</p>
                            @if($product->discount != null)
                            <h4>${{ number_format($product->discount,2) }} <span>${{ number_format($product->price,2) }}</span></h4>
                            @else
                            <h4>${{ number_format($product->price,2) }}</h4>
                            @endif
                        </div>
                        <div class="pd-color">
                            <h6>Color</h6>
                            <div class="pd-color-choose">
                                @foreach(array_unique(array_column($product->productDetails->toArray(),'color')) as $key => $productColor)
                                <div class="cc-item">
                                    <input type="radio" name="color" id="cc-{{ $productColor }}" value="{{ $productColor }}" @if($key === 0) checked @endif>
                                    <label for="cc-{{ $productColor }}" class="cc-{{ $productColor }}"></label>
                                </div>
                                @endforeach
                            </div>
                        </div>   
                        
                        <div class="pd-size-choose">
                            @foreach(array_unique(array_column($product->productDetails->toArray(),'size')) as $key => $productSize)
                            <div class="sc-item">
                                <input type="radio" name="size" id="sm-{{ $productSize }}" value="{{ $productSize }}" @if($key === 0) checked @endif>
                                <label for="sm-{{ $productSize }}">{{ $productSize }}</label>
                            </div>
                            @endforeach
                        </div>
                        
                        <div class="quantities">
                            <div class="quantity">
                                <div class="pro-qty">
                                    <input type="text" class="quantity-input" value="1">
                                </div>
                                <a href="#" class="primary-btn pd-cart" data-pid="{{ $product->id }}" >Add To Cart</a>
                            </div>
                        </div>


                        <ul class="pd-tags">
                            <li><span>CATEGORIES</span>:{{ $product->category->name }}</li>
                        </ul>

                        <div class="pd-share">
                            <div class="p-code">Sku : {{ $product->sku }}</div>
                            <!-- <div class="pd-social">
                                <a href="#"><i class="fas fa-facebook"></i></a>
                                <a href="#"><i class="fas fa-twitter"></i></a>
                                <a href="#"><i class="fas fa-linkedin"></i></a>
                            </div> -->
                        </div>
                    </div>
                </div>

                <div class="product-tab">
                    <div class="tab-item pl-10">
                        <ul class="nav" role="tablist">
                            <li><a href="#tab-1" class="active" data-toggle="tab" role="tab">DESCRIPTION</a>
                            </li>
                            <li><a href="#tab-2" data-toggle="tab" role="tab">SPECIFICATIONS</a></li>
                            <li><a href="#tab-3" data-toggle="tab" role="tab">Customer Reviews ({{
                                    count($product->productComments) }})</a></li>
                        </ul>
                    </div>
                    <div class="tab-item-content">
                        <div class="tab-content">
                            <div class="tab-pane fade-in active pl-10" id="tab-1" role="tabpanel">
                                <div class="product-content">
                                    <div class="row">
                                        <div class="col-lg-7">
                                            <h5>Introduction</h5>
                                            <p>{{ $product->description }}</p>
                                            <h5>Features</h5>
                                            <p>{{ $product->content }}</p>
                                        </div>
                                        <!-- <div class="col-lg-5">
                                            <img src="img/product-single/tab-desc.jpg" alt="">
                                        </div> -->
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade pl-10" id="tab-2" role="tabpanel">
                                <div class="specification-table">
                                    <table>
                                        <tr>
                                            <td class="p-category">Customer Rating</td>
                                            <td>
                                                <div class="pd-rating">
                                                    @for($i = 1; $i <=5; $i++) @if($i <=$avgRating) <i
                                                        class="fa fa-star"></i>
                                                        @else
                                                        <i class="fa fa-star-o"></i>
                                                        @endif
                                                        @endfor
                                                        <span>({{ count($product->productComments) }})</span>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="p-category">Price</td>
                                            <td>
                                                @if($product->discount != null)
                                                    <div class="p-price">${{ $product->discount }}</div>                                       
                                                @else
                                                    <div class="p-price">${{ $product->price }}</div>                                       
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="p-category">Add To Cart</td>
                                            <td>
                                                <div class="cart-add">+ add to cart</div>
                                            </td>

                                        </tr>
                                        <tr>
                                            <td class="p-category">Availability</td>
                                            <td>
                                                <div class="p-stock">{{ $product->quantity }} in stock</div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="p-category">Size</td>
                                            <td>
                                                <div class="p-size">
                                                    @foreach(array_unique(array_column($product->productDetails->toArray(),'size'))
                                                    as $productSize)
                                                    <span> {{ $productSize }} </span>
                                                    @endforeach
                                                </div> 
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="p-category">Color</td>
                                            <td >
                                                @foreach(array_unique(array_column($product->productDetails->toArray(),'color'))
                                                as $productColor)
                                                <div class="cc-item">
                                                    <input type="radio" name="color" id="cc-{{ $productColor }}">
                                                    <label for="cc-{{ $productColor }}" class="cc-{{ $productColor }}"></label>
                                                </div>
                                                @endforeach
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="p-category">Sku</td>
                                            <td>
                                                <div class="p-code">{{ $product->sku }}</div>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="tab-3" role="tabpanel">
                                <div class="customer-review-option pl-10">
                                    <h4>{{ count($product->productComments) }} Comment</h4>
                                    <div class="comment-option">
                                        @foreach($product->productComments as $productComment)
                                        <div class="co-item">
                                            <!-- avatar -->

                                            <div class="avatar-text">
                                                <div class="at-rating">
                                                    @for($i = 1; $i <=5; $i++) @if($i <=$productComment->rating) <i
                                                        class="fa fa-star"></i>
                                                        @else
                                                        <i class="fa fa-star-o"></i>
                                                        @endif
                                                        @endfor
                                                </div>
                                                <h5>{{ $productComment->name }} <span>{{ date('M d, Y',
                                                        strtotime($productComment->created_at)) }}</span></h5>
                                                <div class="at-reply">{{ $productComment->messages }}</div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>                       
                                    <div class="leave-comment">
                                        <h4>Leave a comment</h4>
                                        <form method="post" action="" class="comment-form">
                                            @csrf
                                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                                            <input type="hidden" name="user_id"
                                                value="{{ \Illuminate\Support\Facades\Auth::user()->id ?? null}}">

                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <input type="text" placeholder="Name" name="name">
                                                </div>
                                                <div class="col-lg-6">
                                                    <input type="text" placeholder="Email" name="email">

                                                </div>
                                                <div class="col-lg-12">
                                                    <textarea name="messages" id="" placeholder="Messages"></textarea>
                                                    <div class="personal-rating">
                                                        <h6>Your Rating</h6>
                                                        <div class="rate">
                                                            <input type="radio" id="star5" name="rating" value="5" />
                                                            <label for="star5" title="text">5 stars</label>
                                                            <input type="radio" id="star4" name="rating" value="4" />
                                                            <label for="star4" title="text">4 stars</label>
                                                            <input type="radio" id="star3" name="rating" value="3" />
                                                            <label for="star3" title="text">3 stars</label>
                                                            <input type="radio" id="star2" name="rating" value="2" />
                                                            <label for="star2" title="text">2 stars</label>
                                                            <input type="radio" id="star1" name="rating" value="1" />
                                                            <label for="star1" title="text">1 star</label>
                                                        </div>
                                                    </div>
                                                    <button type="submit" class="site-btn">Send message</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Product Shop Section End -->

    <!-- Related Products Section Begin -->                                                
    <div class="related-products-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title mb-30">
                        <div class="title-icon">
                            <i class="fa fa-desktop"></i>
                        </div>
                        <h3>related products</h3>
                    </div>   
                </div>                                              
            </div>
            <div class="row">
                @foreach($relatedProducts as $relatedProduct)
                <div class="col-lg-3 col-sm-6">                   
                        <div class="product-item fix mb-30">
                            <div class="product-thumb">
                                <p>
                                    <img src="{{ asset('/images/' . $relatedProduct->productImages[0]->photo) }}" class="img-{{ $relatedProduct->id }}" alt="" width="100%" height="240px">
                                </p>
                                @if($relatedProduct->featured != null)
                                <div class="product-label">
                                    <span>{{ $relatedProduct->featured }}</span>
                                </div>
                                @endif
                                <div class="product-action-link">
                                    <a href="{{ url('shop/product/'.$relatedProduct->id.'-'.$relatedProduct->slug) }}" >
                                        <span data-toggle="tooltip" data-placement="left" title="Quick view"><i class="fa fa-search"></i>
                                        </span> 
                                    </a>
                                </div>                                               
                                <div class="add-cart">
                                    <a href="#" data-pid="{{ $relatedProduct->id }}">
                                        + Add to Cart
                                        <div style="display:none;">
                                            <input type="text" name="default-size" value="{{ $relatedProduct->productDetails[0]->size }}" class="size-input"> 
                                        </div>
                                    </a>      
                                </div>
                                
                            </div>
                            <div class="product-content">
                                <h4>{{ $relatedProduct->name }}</h4>
                                <div class="pricebox">
                                    @if($relatedProduct->discount != null)
                                        <span class="regular-price"> ${{ number_format($relatedProduct->discount,2) }}</span>
                                        <span class="old-price"><del> ${{ number_format($relatedProduct->price,2) }}</del></span>                                       
                                    @else
                                        <span class="regular-price"> ${{ number_format($relatedProduct->price,2) }}</span>                                       
                                    @endif
                                    
                                    
                                </div>
                            </div>
                        </div>                               
                </div>
                @endforeach 
                <div class="featured-carousel-active slick-padding slick-arrow-style">   
                    
                </div>
            </div>
            </div>
        </div>
        
    </div>
    <!-- Related Products Section End -->
</div>
@endsection

@section('myjs')
<script>
    window.addEventListener('DOMContentLoaded', (event) => {
        const sizeRadios = document.querySelectorAll('.pd-size-choose input[type="radio"]');
        sizeRadios.forEach((radio, index) => {
            radio.addEventListener('change', () => {
                sizeRadios.forEach((otherRadio) => {
                    const label = document.querySelector(`label[for="${otherRadio.id}"]`);
                    if (otherRadio.checked) {
                        label.classList.add('active');
                    } else {
                        label.classList.remove('active');
                    }
                });
            });

            if (index === 0 && radio.checked) {
                const label = document.querySelector(`label[for="${radio.id}"]`);
                label.classList.add('active');
            }
        });
    });

    window.addEventListener('DOMContentLoaded', (event) => {
        const colorRadios = document.querySelectorAll('.pd-color input[type="radio"]');
        colorRadios.forEach((radio, index) => {
            radio.addEventListener('change', () => {
                colorRadios.forEach((otherRadio) => {
                    const label = document.querySelector(`label[for="${otherRadio.id}"]`);
                    if (otherRadio.checked) {
                        label.classList.add('active');
                    } else {
                        label.classList.remove('active');
                    }
                });
            });

            if (index === 0 && radio.checked) {
                const label = document.querySelector(`label[for="${radio.id}"]`);
                label.classList.add('active');
            }
        });
    });

    $('.quantities .quantity a').click(function (e) {
        e.preventDefault();

        let pid = $(this).data('pid');
        let quantity = $('.quantity-input').val();
        let size = $('.pd-size-choose input[type="radio"]:checked').val();

        let url = "{{ Route('addCart') }}";
        $.ajax({
            type: 'post',
            url: url,
            data: {
                pid: pid,
                quantity: quantity,
                size: size,
                _token: '{{ csrf_token() }}',
            }, success: function (data) {
                location.reload();
            }
        });
    });

    $('.add-cart a').click(function (e) {
        e.preventDefault();

        let pid = $(this).data('pid');
        let quantity = 1;
        let size = $(this).closest('.add-cart').find('.size-input').val();

        let url = "{{ Route('addCart') }}";
        $.ajax({
            type: 'post',
            url: url,
            data: {
                pid: pid,
                quantity: quantity,
                size: size,
                _token: '{{ csrf_token() }}',
            }
        });
    });
</script>
@endsection