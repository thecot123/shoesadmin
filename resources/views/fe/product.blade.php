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
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Shop</li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb area end -->

    <!-- page wrapper start -->
    <div class="page-main-wrapper ">
        <div class="container">
            <div class="row">
                <!-- sidebar start -->
                <div class="col-lg-3 order-2 order-lg-1">
                    <div class="shop-sidebar-wrap mt-md-28 mt-sm-28">
                        <!-- category start -->
                        <div class="sidebar-widget mb-30">
                            <div class="sidebar-title mb-10">
                                <h3>Category</h3>
                            </div>
                            <div class="sidebar-widget-body">
                                <ul>
                                    @foreach($categories as $category)
                                    @php
                                    $productCount = $category->products->count();
                                    @endphp

                                    <li>
                                        <a href="{{ route('shop.category_or_brand', ['name' => $category->name]) }}"
                                            class="brand">
                                            <i class="fa fa-angle-right"></i>
                                            {{ $category->name }}
                                        </a>

                                        <span class="product-count">({{ $productCount }})</span>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <!-- category end -->
                        <!-- brand start -->
                        <div class="sidebar-widget mb-30">
                            <div class="sidebar-title mb-10">
                                <h3>Brand</h3>
                            </div>
                            <div class="sidebar-widget-body">
                                <ul>
                                    @foreach($brands as $brand)
                                    @php
                                    $productCount = $brand->products->count();
                                    @endphp

                                    <li>
                                        <a href="{{ route('shop.category_or_brand', ['name' => $brand->name]) }}"
                                            class="brand">
                                            <i class="fa fa-angle-right"></i>
                                            {{ $brand->name }}
                                        </a>

                                        <span class="product-count">({{ $productCount }})</span>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                        <!-- brand end -->
                        
                        <!-- pricing filter start -->
                        <div class="sidebar-widget mb-30">
                            <div class="sidebar-title mb-10">
                                <h3>filter by price</h3>
                            </div>

                            <div class="sidebar-widget-body">
                                <div class="price-range-wrap">
                                    <div class="price-range" data-min="0" data-max="1000"
                                        data-min-value="{{ str_replace('$', '',request('priceMin')) }}"
                                        data-max-value="{{ str_replace('$', '',request('priceMax')) }}"></div>
                                    <div class="range-slider">
                                        <div class="d-flex justify-content-between">

                                            <div class="price-input d-flex align-items-center">
                                                <input type="text" id="minamount" name="priceMin" class="filter-input">-
                                                <input type="text" id="maxamount" name="priceMax" class="filter-input">
                                            </div>
                                            <button type="submit" class="filter-btn">filter</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <!-- pricing filter end -->

                        <form action="">    
                            <!-- size filter start -->       
                            <div class="sidebar-widget mb-30">
                                <div class="sidebar-title mb-10">
                                    <h3>Size</h3>
                                </div>
                                <div class="sidebar-widget-body">
                                    <div class="fw-size-choose">
                                        <div class="sc-item">
                                            <input type="radio" id="34-size" name="size" value="34" onchange="this.form.submit();"
                                                {{ request('size')=='34' ? 'checked' : '' }} class="filter-input">
                                            <label for="34-size" class="{{ request('size') == '34' ? 'active' : '' }}">34</label>
                                        </div>
                                        <div class="sc-item">
                                            <input type="radio" id="35-size" name="size" value="35" onchange="this.form.submit();"
                                                {{ request('size') == '35' ? 'checked' : '' }} class="filter-input">
                                            <label for="35-size" class="{{ request('size') == '35' ? 'active' : '' }}">35</label>
                                        </div>
                                        <div class="sc-item">
                                            <input type="radio" id="36-size" name="size" value="36" onchange="this.form.submit();"
                                                {{ request('size') == '36' ? 'checked' : '' }} class="filter-input">
                                            <label for="36-size" class="{{ request('size') == '36' ? 'active' : '' }}">36</label>
                                        </div>
                                        <div class="sc-item">
                                            <input type="radio" id="37-size" name="size" value="37" onchange="this.form.submit();"
                                                {{ request('size') == '37' ? 'checked' : '' }} class="filter-input">
                                            <label for="37-size" class="{{ request('size') == '37' ? 'active' : '' }}">37</label>
                                        </div>
                                        <div class="sc-item">
                                            <input type="radio" id="38-size" name="size" value="38" onchange="this.form.submit();"
                                                {{ request('size') == '38' ? 'checked' : '' }} class="filter-input">
                                            <label for="38-size" class="{{ request('size') == '38' ? 'active' : '' }}">38</label>
                                        </div>
                                        <div class="sc-item">
                                            <input type="radio" id="39-size" name="size" value="39" onchange="this.form.submit();"
                                                {{ request('size') == '39' ? 'checked' : '' }} class="filter-input">
                                            <label for="39-size" class="{{ request('size') == '39' ? 'active' : '' }}">39</label>
                                        </div>
                                        <div class="sc-item">
                                            <input type="radio" id="40-size" name="size" value="40" onchange="this.form.submit();"
                                                {{ request('size') == '40' ? 'checked' : '' }} class="filter-input">
                                            <label for="40-size" class="{{ request('size') == '40' ? 'active' : '' }}">40</label>
                                        </div>
                                        <div class="sc-item">
                                            <input type="radio" id="41-size" name="size" value="41" onchange="this.form.submit();"
                                                {{ request('size') == '41' ? 'checked' : '' }} class="filter-input">
                                            <label for="41-size" class="{{ request('size') == '41' ? 'active' : '' }}">41</label>
                                        </div>
                                        <div class="sc-item">
                                            <input type="radio" id="42-size" name="size" value="42" onchange="this.form.submit();"
                                                {{ request('size') == '42' ? 'checked' : '' }} class="filter-input">
                                            <label for="42-size" class="{{ request('size') == '42' ? 'active' : '' }}">42</label>
                                        </div>
                                        <div class="sc-item">
                                            <input type="radio" id="43-size" name="size" value="43" onchange="this.form.submit();"
                                                {{ request('size') == '43' ? 'checked' : '' }} class="filter-input">
                                            <label for="43-size" class="{{ request('size') == '43' ? 'active' : '' }}">43</label>
                                        </div>
                                        <div class="sc-item">
                                            <input type="radio" id="44-size" name="size" value="44" onchange="this.form.submit();"
                                                {{ request('size') == '44' ? 'checked' : '' }} class="filter-input">
                                            <label for="44-size" class="{{ request('size') == '44' ? 'active' : '' }}">44</label>
                                        </div>
                                        <div class="sc-item">
                                            <input type="radio" id="45-size" name="size" value="45" onchange="this.form.submit();"
                                                {{ request('size') == '45' ? 'checked' : '' }} class="filter-input">
                                            <label for="45-size" class="{{ request('size') == '45' ? 'active' : '' }}">45</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- size filter end -->
        
                            <!-- color start -->

                            <div class="sidebar-widget mb-30">
                                <div class="sidebar-title mb-10">
                                    <h3>Color</h3>
                                </div>
                                <div class="sidebar-widget-body">
                                    <div class="fw-color-choose">
                                        <div class="cs-item">
                                            <input type="radio" name="color" id="cs-black" value="black"
                                                onchange="this.form.submit();" {{ request('color')=='black'
                                                ? 'checked' : '' }} class="filter-input">
                                            <label for="cs-black"
                                                class="cs-black {{ request('color') == 'black' ? 'font-weight-bold' : '' }}">black</label>
                                        </div>
                                        <div class="cs-item">
                                            <input type="radio" name="color" id="cs-white" value="white"
                                                onchange="this.form.submit();" {{ request('color')=='white'
                                                ? 'checked' : '' }} class="filter-input">
                                            <label for="cs-white"
                                                class="cs-white {{ request('color') == 'white' ? 'font-weight-bold' : '' }}">white</label>
                                        </div>
                                        <div class="cs-item">
                                            <input type="radio" name="color" id="cs-blue" value="blue"
                                                onchange="this.form.submit();" {{ request('color')=='blue'
                                                ? 'checked' : '' }} class="filter-input">
                                            <label for="cs-blue"
                                                class="cs-blue {{ request('color') == 'blue' ? 'font-weight-bold' : '' }}">blue</label>
                                        </div>
                                        <div class="cs-item">
                                            <input type="radio" name="color" id="cs-yellow" value="yellow"
                                                onchange="this.form.submit();" {{ request('color')=='yellow'
                                                ? 'checked' : '' }} class="filter-input">
                                            <label for="cs-yellow"
                                                class="cs-yellow {{ request('color') == 'yellow' ? 'font-weight-bold' : '' }}">yellow</label>
                                        </div>
                                        <div class="cs-item">
                                            <input type="radio" name="color" id="cs-red" value="red"
                                                onchange="this.form.submit();" {{ request('color')=='red'
                                                ? 'checked' : '' }} class="filter-input">
                                            <label for="cs-red"
                                                class="cs-red {{ request('color') == 'red' ? 'font-weight-bold' : '' }}">red</label>
                                        </div>
                                        <div class="cs-item">
                                            <input type="radio" name="color" id="cs-brown" value="brown"
                                                onchange="this.form.submit();" {{ request('color')=='brown'
                                                ? 'checked' : '' }} class="filter-input">
                                            <label for="cs-brown"
                                                class="cs-brown {{ request('color') == 'brown' ? 'font-weight-bold' : '' }}">brown</label>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            <!-- color end -->
                        </form>                                    
                    </div>
                </div>
                <!-- sidebar end -->

                <!-- product main wrap start -->
                <div class="col-lg-9 order-1 order-lg-2">
                    <div id="demo" class="carousel slide" data-ride="carousel">
                        <ul class="carousel-indicators">
                            @foreach($banners as $key => $banner)
                            <li data-target="#demo" data-slide-to="{{ $key }}"
                                class="{{ $key == 0 ? 'active' : '' }}"></li>
                            @endforeach
                        </ul>
                        <div class="carousel-inner">
                            @foreach($banners as $key => $banner)
                            <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                <img src="{{ asset('/images/' . $banner->photo) }}" alt="banner{{ $key + 1 }}"
                                    width="100%" height="240px">
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <!-- product view wrapper area start -->
                    <div class="shop-product-wrapper pt-34">
                        <div class="product-show-option">
                            <div class="row">
                                <div class="col-lg-7 col-md-7">
                                    <form action="">
                                        <div class="select-option">
                                            <select name="sort_by" class="sorting" onchange="this.form.submit();">
                                                <option {{ request('sort_by')=='latest' ? 'selected' : '' }}
                                                    value="lastest">Sorting: Lastest</option>
                                                <option {{ request('sort_by')=='oldest' ? 'selected' : '' }}
                                                    value="oldest">Sorting: Oldest</option>
                                                <option {{ request('sort_by')=='name-ascending' ? 'selected' : '' }}
                                                    value="name-ascending">Sorting: Name A-Z</option>
                                                <option {{ request('sort_by')=='name-descending' ? 'selected' : ''
                                                    }} value="name-descending">Sorting: Name Z-A</option>
                                                <option {{ request('sort_by')=='price-ascending' ? 'selected' : ''
                                                    }} value="price-ascending">Sorting: Price Ascending</option>
                                                <option {{ request('sort_by')=='price-descending' ? 'selected' : ''
                                                    }} value="price-descending">Sorting: Price Decrease</option>
                                            </select>
                                            <select name="show" class="p-show" onchange="this.form.submit();">
                                                <option {{ request('show')=='6' ? 'selected' : '' }} value="6">Show:
                                                    6</option>
                                                <option {{ request('show')=='12' ? 'selected' : '' }} value="12">
                                                    Show: 12</option>
                                                <option {{ request('show')=='15' ? 'selected' : '' }} value="15">
                                                    Show: 15</option>
                                            </select>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-lg-5 col-md-5 text-right">
                                    <!-- <p>Show 01-09 of 36 Product</p> -->
                                </div>
                            </div>
                        </div>

                        <div class="product-list">
                            <div class="row">
                                @foreach($products as $product)
                                <div class="col-lg-4 col-md-4 col-sm-6">
                                    <div class="product-item fix mb-30">
                                        <div class="product-thumb">
                                            <p>
                                                <img src="{{ asset('/images/' . $product->productImages[0]->photo) }}"
                                                    class="img-{{ $product->id }}" alt="" width="100%"
                                                    height="240px">
                                            </p>
                                            @if($product->featured != null)
                                            <div class="product-label">
                                                <span>{{ $product->featured }}</span>
                                            </div>
                                            @endif
                                            <div class="product-action-link">
                                                <a href="{{ url('shop/product/'.$product->id.'-'.$product->slug) }}">
                                                    <span data-toggle="tooltip" data-placement="left" 
                                                    title="Quick view"><i class="fa fa-search"></i>
                                                    </span>
                                                </a>
                                            </div>
                                            <div class="add-cart">
                                                <a href="#" data-pid="{{ $product->id }}">
                                                    + Add to Cart
                                                    <div style="display:none;">
                                                        <input type="text" name="default-size"
                                                            value="{{ $product->productDetails[0]->size }}"
                                                            class="size-input">
                                                    </div>
                                                </a>

                                            </div>

                                        </div>
                                        <div class="product-content">
                                            <h4>{{ $product->name }}</h4>

                                            <div class="pricebox">
                                                @if($product->discount != null)
                                                <span class="regular-price"> ${{ number_format($product->discount,2 ) }}</span>
                                                <span class="old-price"><del> ${{ number_format($product->price,2 ) }}</del></span>
                                                @else
                                                <span class="regular-price"> ${{ number_format($product->price,2 ) }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                @if(count($products) === 0)
                                    <div class="col-lg-4 col-md-4 col-sm-6">
                                        <div class="no-products">
                                            <p>No results found.</p>
                                        </div>
                                    </div>
                                    
                                @endif
                            </div>
                        </div>
                        <div class="pagination">
                            {{ $products->links() }}
                        </div>
                        <!-- page wrapper end -->

                    </div>
                </div>

            </div>

        </div>
    </div>
    <!-- page wrapper end -->
</div>
@endsection

@section("myjs")
<script>
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
            },success: function (data) {
                location.reload();
            }
        });
    });
</script>
@endsection
