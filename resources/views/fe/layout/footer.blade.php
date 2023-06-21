<!-- footer area start -->
<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-3 footer-column">
                <img src="{{ asset('/images/flogo-removebg-preview.png') }}" width="100" alt=""
                    style="margin-top: -1rem;">
                <ul>
                    <li style="color: grey;">Address: 123 Street, City, Country</li>
                    <li style="color: grey;">Opening Hours: Mon-Sun, 8am-6pm</li>
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
                    <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                </ul>
                <p style="color: grey;">Email: example@example.com</p>
            </div>
        </div>

        <hr>

        <div class="row">

            <div class="col-md-6 ">

                <div class="icons">
                    <i class="fa fa-credit-card"></i>
                    <a href="" class="mr-4"></a>
                    <i class="fa fa-cc-visa"></i>
                    <a href="" class="mr-4"></a>
                    <i class="fa fa-cc-mastercard"></i>
                </div>
            </div>
            <div class="col-md-6 text-md-right mt-3">
                <p>&copy; 2023 Your Company. All rights reserved.</p>
            </div>
        </div>
    </div>
</footer>
<!-- footer area end -->

<!-- Scroll to top start -->
<div class="scroll-top not-visible">
    <i class="fa fa-angle-up"></i>
</div>
<!-- Scroll to Top End -->


<!-- Jquery Min Js -->
<script src="{{ asset('/fe/js/vendor/jquery-3.3.1.min.js') }}"></script>
<!-- Popper Min Js -->
<script src="{{ asset('/fe/js/vendor/popper.min.js') }}"></script>
<!-- Bootstrap Min Js -->
<script src="{{ asset('/fe/js/vendor/bootstrap.min.js') }}"></script>
<!-- Carousel Min Js -->
<script src="{{ asset('/fe/js/vendor/owl.carousel.min.js') }}"></script>
<script src="{{ asset('/fe/js/vendor/jquery.slicknav.js') }}"></script>
<script src="{{ asset('/fe/js/vendor/jquery.countdown.min.js') }}"></script>
<script src="{{ asset('/fe/js/vendor/jquery.nice-select.min.js') }}"></script>
<!-- Plugins Js-->
<script src="{{ asset('/fe/js/plugins.js') }}"></script>
<!-- Active Js -->
<script src="{{ asset('/fe/js/main.js') }}"></script>
@yield('myjs')