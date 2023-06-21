<header>
  <div class="header-top-area bg-gray text-center text-md-left">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-5">
                <div class="header-call-action">
                    <a href="mailto:info@gmail.com?subject=support">
                        <i class="fa fa-envelope"></i>
                        cotrinhhientai@gmail.com
                    </a>
                    <a href="#" class="dis">
                        <i class="fa fa-phone"></i>
                        +84123456789
                    </a>
                </div>
            </div>
            <div class="col-lg-6 col-md-7">
                <div class="header-top-right float-md-right float-none">
                    <nav>
                        <ul>
                            <li>
                                <a href="{{ Route('login') }}">login</a>
                            </li>
                            <li>
                                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
  </div>
  <div class="header-middle-area header-middle-style-2 pt-20 pb-20">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-2">
                <div class="brand-logo">
                    <a href="{{ Route('homepage') }}">
                        <img src="{{ asset('/images/logo.png') }}" alt="brand logo">
                    </a>
                </div>
            </div> <!-- end logo area -->
            <div class="col-lg-9">
                <div class="header-middle-right">
                    <div class="header-middle-shipping mb-20">
                        <div class="single-block-shipping">
                            <div class="shipping-icon">
                                <i class="fa fa-clock-o"></i>
                            </div>
                            <div class="shipping-content">
                                <h5>Working time</h5>
                                <span>Mon - Sun: 8.00 AM - 6.00 PM</span>
                            </div>
                        </div> <!-- end single shipping -->
                        <div class="single-block-shipping">
                            <div class="shipping-icon">
                                <i class="fa fa-truck"></i>
                            </div>
                            <div class="shipping-content">
                                <h5>free shipping</h5>
                                <span>On order over $399</span>
                            </div>
                        </div> <!-- end single shipping -->
                        <div class="single-block-shipping">
                            <div class="shipping-icon">
                                <i class="fa fa-money"></i>
                            </div>
                            <div class="shipping-content">
                                <h5>money back 100%</h5>
                                <span>Within 30 Days after delivery</span>
                            </div>
                        </div> <!-- end single shipping -->
                    </div>
                    <form action="{{ Route('shop') }}" method="get">
                      <div class="header-middle-block">
                          <div class="header-middle-searchbox">
                              <input type="text" name="search" placeholder="Search...">
                              <button type="submit" class="search-btn"><i class="fa fa-search"></i></button>
                          </div>
                      </div>
                    </form>
                    
                </div>
            </div>
            <div class="col-lg-1">
              @php
              $totalQuantity = 0;
              $cartItems = session('cart');
              if ($cartItems) {
                foreach ($cartItems as $cartItem) {
                  $totalQuantity += $cartItem->quantity;
                }
              }
              @endphp

              <div class="cart-icon">
                <a href="{{ Route('viewCart') }}" style="font-size: 20px;color:$000;">
                    <i class="fa fa-shopping-cart"></i>
                    <span>{{ $totalQuantity }}</span>
                </a>
              </div>
            </div>
        </div>
    </div>
</div>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>

    </button>
    <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item mr-5">
                <a class="nav-link" href="{{ Route('homepage') }}">Home</a>
            </li>
            <li class="nav-item mr-5">
                <a class="nav-link" href="{{ Route('shop') }}">Shop</a>
            </li>
            <li class="nav-item dropdown mr-5">
                <a class="nav-link dropdown-toggle" href="#" id="categoriesDropdown" role="button"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Categories
                </a>
                <div class="dropdown-menu" aria-labelledby="categoriesDropdown">
                    @foreach($categories as $category)
                      <a class="dropdown-item" href="{{ route('shop.category_or_brand', ['name' => $category->name]) }}">{{$category->name}}</a>
                    @endforeach
                </div>
            </li>
            <li class="nav-item dropdown mr-5">
                <a class="nav-link dropdown-toggle" href="#" id="brandDropdown" role="button" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    Brand
                </a>
                <div class="dropdown-menu" aria-labelledby="brandDropdown">
                    @foreach($brands as $brand)
                    <a class="dropdown-item" href="{{ route('shop.category_or_brand', ['name' => $brand->name]) }}">{{$brand->name}}</a>
                    @endforeach
                </div>
            </li>
            <li class="nav-item mr-5">
                <a class="nav-link" href="#">Collab</a>
            </li>
            <li class="nav-item mr-5">
                <a class="nav-link" href="#">Contact</a>
            </li>
            <li class="nav-item mr-5">
                <a class="nav-link" href="#">Blog</a>
            </li>
            <li class="nav-item mr-5">
                <a class="nav-link" href="#">Sales</a>
            </li>
        </ul>
    </div>
</nav>

</header>

