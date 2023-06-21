<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('/fe/fonts/fontawesome-free-6.4.0-web/css/all.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('/fe/css/home.css') }}">


    <title>Navbar Example</title>
    <style>
    .search-container {
        position: relative;
        width: 300px; /* Adjust the width as needed */
        font-size: 18px; /* Adjust the font size as needed */
        z-index: 999; /* Ensure the search results dialog is displayed in front */
    }

    #searchInput {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    #searchResultsDialog {
        display: none;
        position: absolute;
        top: 100%;
        left: 0;
        width: 100%;
        background-color: white;
        padding: 10px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
        z-index: 999; /* Ensure the dialog box is displayed in front */
    }

    #searchResultsList {
        list-style-type: none;
        padding: 0;
    }

    #searchResultsList li {
        margin-bottom: 5px;
    }
</style>

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container  align-items-center">
            <!-- Location and phone icons with additional text -->
            <div>
                <span class="mr-2">
                    <i class="fas fa-map-marker-alt"></i>
                </span>
                <span class="mr-2 small-text">Vietnam</span>
                <span class="mr-2">
                    <i class="fas fa-phone"></i>
                </span>
                <span class="mr-2 small-text">0123456677</span>
            </div>

            <!-- Logo -->
            <div class="text-center flex-grow-1">
                <img src="{{ asset('/images/logo.png') }}" alt="Logo" class="logo">
            </div>

            <!-- Cart, search icons, and "Sign In" text -->
            <div class="ml-auto d-flex align-items-center">
                <span class="mr-2 small-text" style="padding-right:20px;padding-left:3rem;">Sign In</span>
                <span class="mr-2">
                    <i class="fas fa-shopping-cart" style="padding-right:20px;"></i>
                </span>
             
            </div>
        </div>
    </nav>





    <nav class="navbar navbar-expand-lg navbar-light bg-light">

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>

        </button>



        <div class="collapse navbar-collapse justify-content-center" id="navbarNav">

            <ul class="navbar-nav">
                <li class="nav-item mr-5">
                    <a class="nav-link" href="#">Home</a>
                </li>
                <li class="nav-item dropdown mr-5">
                    <a class="nav-link dropdown-toggle" href="#" id="categoriesDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Categories
                    </a>
                    <div class="dropdown-menu" aria-labelledby="categoriesDropdown">
                        <a class="dropdown-item" href="#">Slippers</a>
                        <a class="dropdown-item" href="#">Sneakers </a>
                        <a class="dropdown-item" href="#">T-shirt</a>
                    </div>
                </li>
                <li class="nav-item dropdown mr-5">
                    <a class="nav-link dropdown-toggle" href="#" id="brandDropdown" role="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        Brand
                    </a>
                    <div class="dropdown-menu" aria-labelledby="brandDropdown">
                        <a class="dropdown-item" href="#">Nike</a>
                        <a class="dropdown-item" href="#">Jordan</a>
                        <a class="dropdown-item" href="#">Adidas</a>
                        <a class="dropdown-item" href="#">Yeezy</a>

                    </div>
                </li>
                <li class="nav-item mr-5">
                    <a class="nav-link" href=" ">Collab</a>
                </li>
                <li class="nav-item mr-5">
                    <a class="nav-link" href="#">Contact</a>
                </li>
                <li class="nav-item mr-5">
    <a class="nav-link" href="{{ route('informfe') }}">Blog</a>
</li>

                <li class="nav-item mr-5">
                    <a class="nav-link" href="#">Sales</a>
                </li>
            </ul>
        </div>
    </nav>

    <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <!-- Fetch indicators dynamically from the database -->
        @foreach ($sliders as $index => $slide)
            <li data-target="#myCarousel" data-slide-to="{{ $index }}" class="{{ $index == 0 ? 'active' : '' }}"></li>
        @endforeach
    </ol>

    <!-- Slides -->
    <div class="carousel-inner">
        <!-- Fetch slides dynamically from the database -->
        @foreach ($sliders as $index => $slide)
            <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                <a href="{{ $slide->link }}">
                <img class="d-block w-100" src="/images/{{ $slide->photo }}" alt="Slide {{ $index + 1 }}">
                    <div class="carousel-caption">
                        <!-- Slide caption from the database -->
                    </div>
                </a>
            </div>
        @endforeach
    </div>
 
    <!-- Controls -->
    <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
 
</div>
  <!-- carousel 2  -->
  <div class="word text-center">
        <div class="">
            <h3>Men</h3>
        </div>
        <a href="" class="mr-2"></a>

        <div class="">
            <h3>Woman</h3>
        </div>
    </div>

    <div class="buttons-container">

        <div class="choosen">
            <button id="menButton" class="btn btn-primary"> </button>
            <a href="" class="mr-4"></a>
            <button id="womenButton" class="btn btn-primary"> </button>
        </div>
    </div>


    <div id="productArea">

        <!-- Men Product Cards -->
        <div id="menProducts">
            <!-- Add Men Product Cards Here -->
            <div class="product-list container" >
                            <div class="row">
                                @foreach($products as $product)
                                @if($product->featured === 'Men')
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
                                                <span class="regular-price"> ${{ $product->discount }}</span>
                                                <span class="old-price"><del> ${{ $product->price }}</del></span>
                                                @else
                                                <span class="regular-price"> ${{ $product->price }}</span>
                                                @endif

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endif
                                @endforeach
                            </div>
                        </div>
        </div>

        <!-- Women Product Cards -->
        <div id="womenProducts" class="product-cards">
            <!-- Add Women Product Cards Here -->
            <div class="product-list">
                            <div class="row">
                                @foreach($products as $product)
                                @if($product->featured === 'Women')
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
                                                <span class="regular-price"> ${{ $product->discount }}</span>
                                                <span class="old-price"><del> ${{ $product->price }}</del></span>
                                                @else
                                                <span class="regular-price"> ${{ $product->price }}</span>
                                                @endif

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endif
                                @endforeach
                            </div>
                        </div>
</div>
    <!-- best seller  -->
    <div class="cover">
    <div class="word-container container">
        <div class="left-word">
            <h1>Best Seller</h1>
        </div>
        <div class="right-word">see all&gt;&gt;</div>
    </div>
    
    <div class="best-seller-area text-center d-flex flex-wrap justify-content-center">
        @foreach ($products as $product)
            @if($product->featured === 'Best')
                <div class="best-seller-zone m-2">
                    <img class="best-seller-image img-fluid" src="{{ asset('/images/' . $product->productImages[0]->photo) }}" alt="Best Seller">
                </div>
            @endif
        @endforeach
    </div>
</div>

 
 <!-- new release  -->
  
    <div class="new-release container-fluid">
    <h1 class="text-center">New Release</h1>
    <div class="product-list">
                            <div class="row">
                                @foreach($products as $product)
                                @if($product->featured === 'New')
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
                                                <span class="regular-price"> ${{ $product->discount }}</span>
                                                <span class="old-price"><del> ${{ $product->price }}</del></span>
                                                @else
                                                <span class="regular-price"> ${{ $product->price }}</span>
                                                @endif

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endif
                                @endforeach
                            </div>
                        </div>
</div>


    <!-- mail  -->
    <div class="email-area">
        <h1>Mail for us</h1>
        <p style="color:grey;">Subcribes to recieve mailing from us when we arrive new sneakers. </p>

        <form>
            <input type="email" id="email-input" placeholder="Enter your email address">
            <button type="submit">Send</button>
        </form>
    </div>

    <footer>
    <div class="container">
        <div class="row">
            <div class="col-md-3 footer-column">
                <img src="{{ asset('/images/flogo-removebg-preview.png') }}" width="100" alt="" style="margin-top: -1rem;">
                <ul>
                    <li style="color: grey;">Address: 123 Street, City, Country</li>
                    <li style="color: grey;">Opening Hours: Mon-Fri, 9am-5pm</li>
                </ul>
            </div>

            <div class="col-md-3 footer-column">
                <h3>Account</h3>
                <ul>
                    <li><a href="#">My Account</a></li>
                    <li><a href="#">Manage Account</a></li>
                    <li><a href="#">My Orders</a></li>
                    <li><a href="#">Track My Order</a></li>
                </ul>
            </div>

            <div class="col-md-3 footer-column">
                <h3>Terms & Conditions</h3>
                <ul>
                    <li><a href="#">Pre-order</a></li>
                    <li><a href="#">Shipping</a></li>
                    <li><a href="#">Exchange & Return</a></li>
                    <li><a href="#">Privacy Policy</a></li>
                </ul>
            </div>

            <div class="col-md-3 footer-column">
                <h3>Social</h3>
                <ul class="social-icons">
                    <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                    <li><a href="#"><i class="fab fa-facebook"></i></a></li>
                </ul>
                <p style="color: grey;">Email: example@example.com</p>
            </div>
        </div>

        <hr>

        <div class="row">
          
            <div class="col-md-6 ">
            
                <div class="icons">
                    <i class="fa-brands fa-cc-paypal"></i>
                    <a href="" class="mr-4"></a>
                    <i class="fa-brands fa-cc-visa"></i>
                    <a href="" class="mr-4"></a>
                    <i class="fa-brands fa-cc-mastercard"></i>
                </div>
            </div>
            <div class="col-md-6 text-md-right mt-3">
                <p>&copy; 2023 Your Company. All rights reserved.</p>
            </div>
        </div>
    </div>
</footer>


    <script src="{{ asset('/vendor/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
 
<script src="{{ asset('/fe/js/home.js') }}"></script>
 




</body>

</html>