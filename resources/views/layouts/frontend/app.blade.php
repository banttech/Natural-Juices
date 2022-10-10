<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8" />
    <title>Nest - Multipurpose eCommerce HTML Template</title>
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:title" content="" />
    <meta property="og:type" content="" />
    <meta property="og:url" content="" />
    <meta property="og:image" content="" />
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('imgs/theme/favicon.svg') }}" />
    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('css/main.css?v=5.5') }}" />
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<body>
    <!-- Quick view -->
    <div class="modal fade custom-modal" id="quickViewModal" tabindex="-1" aria-labelledby="quickViewModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6 col-sm-12 col-xs-12 mb-md-0 mb-sm-5">
                            <div class="detail-gallery">
                                <span class="zoom-icon"><i class="fi-rs-search"></i></span>
                                <!-- MAIN SLIDES -->
                                <div class="product-image-slider">
                                    <figure class="border-radius-10">
                                        <img src="{{ asset('imgs/shop/product-16-2.jpg') }}" alt="product image" />
                                    </figure>
                                    <figure class="border-radius-10">
                                        <img src="{{ asset('imgs/shop/product-16-1.jpg') }}" alt="product image" />
                                    </figure>
                                    <figure class="border-radius-10">
                                        <img src="{{ asset('imgs/shop/product-16-3.jpg') }}" alt="product image" />
                                    </figure>
                                    <figure class="border-radius-10">
                                        <img src="{{ asset('imgs/shop/product-16-4.jpg') }}" alt="product image" />
                                    </figure>
                                    <figure class="border-radius-10">
                                        <img src="{{ asset('imgs/shop/product-16-5.jpg') }}" alt="product image" />
                                    </figure>
                                    <figure class="border-radius-10">
                                        <img src="{{ asset('imgs/shop/product-16-6.jpg') }}" alt="product image" />
                                    </figure>
                                    <figure class="border-radius-10">
                                        <img src="{{ asset('imgs/shop/product-16-7.jpg') }}" alt="product image" />
                                    </figure>
                                </div>
                                <!-- THUMBNAILS -->
                                <div class="slider-nav-thumbnails">
                                    <div><img src="{{ asset('imgs/shop/thumbnail-3.jpg') }}" alt="product image" />
                                    </div>
                                    <div><img src="{{ asset('imgs/shop/thumbnail-4.jpg') }}" alt="product image" />
                                    </div>
                                    <div><img src="{{ asset('imgs/shop/thumbnail-5.jpg') }}" alt="product image" />
                                    </div>
                                    <div><img src="{{ asset('imgs/shop/thumbnail-6.jpg') }}" alt="product image" />
                                    </div>
                                    <div><img src="{{ asset('imgs/shop/thumbnail-7.jpg') }}" alt="product image" />
                                    </div>
                                    <div><img src="{{ asset('imgs/shop/thumbnail-8.jpg') }}" alt="product image" />
                                    </div>
                                    <div><img src="{{ asset('imgs/shop/thumbnail-9.jpg') }}" alt="product image" />
                                    </div>
                                </div>
                            </div>
                            <!-- End Gallery -->
                        </div>
                        <div class="col-md-6 col-sm-12 col-xs-12">
                            <div class="detail-info pr-30 pl-30">
                                <span class="stock-status out-stock"> Sale Off </span>
                                <h3 class="title-detail"><a href="shop-product-right.html" class="text-heading">Seeds of
                                        Change Organic Quinoa, Brown</a></h3>
                                <div class="product-detail-rating">
                                    <div class="product-rate-cover text-end">
                                        <div class="product-rate d-inline-block">
                                            <div class="product-rating" style="width: 90%"></div>
                                        </div>
                                        <span class="font-small ml-5 text-muted"> (32 reviews)</span>
                                    </div>
                                </div>
                                <div class="clearfix product-price-cover">
                                    <div class="product-price primary-color float-left">
                                        <span class="current-price text-brand">$38</span>
                                        <span>
                                            <span class="save-price font-md color3 ml-15">26% Off</span>
                                            <span class="old-price font-md ml-15">$52</span>
                                        </span>
                                    </div>
                                </div>
                                <div class="detail-extralink mb-30">
                                    <div class="detail-qty border radius">
                                        <a href="#" class="qty-down"><i class="fi-rs-angle-small-down"></i></a>
                                        <input type="text" name="quantity" class="qty-val" value="1"
                                            min="1">
                                        <a href="#" class="qty-up"><i class="fi-rs-angle-small-up"></i></a>
                                    </div>
                                    <div class="product-extra-link2">
                                        <button type="submit" class="button button-add-to-cart"><i
                                                class="fi-rs-shopping-cart"></i>Add to cart</button>
                                    </div>
                                </div>
                                <div class="font-xs">
                                    <ul>
                                        <li class="mb-5">Vendor: <span class="text-brand">Nest</span></li>
                                        <li class="mb-5">MFG:<span class="text-brand"> Jun 4.2022</span></li>
                                    </ul>
                                </div>
                            </div>
                            <!-- Detail Info -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('layouts.partials.header')
    @include('layouts.partials.navbar')
   
    <!--End header-->
    <main class="main">
        @yield('content')
    </main>
    <footer class="main">
        <section class="section-padding footer-mid">
            <div class="container pt-15 pb-20">
                <div class="row">
                    <div class="col">
                        <div class="widget-about font-md mb-md-3 mb-lg-3 mb-xl-0">
                            <div class="logo mb-30">
                                <a href="index.html" class="mb-15"><img src="{{ asset('imgs/theme/logo.png') }}" alt="logo" /></a>
                                <p class="font-lg text-heading">Awesome grocery store website template</p>
                            </div>
                            <ul class="contact-infor">
                                <li><img src="{{ asset('imgs/theme/icons/icon-location.svg') }}"
                                        alt="" /><strong>Address: </strong> <span>NATURAL JUICES & VITAMINS LTD. BRAEMAR HOUSE 30 KINGS AVE SUNBURY ON THAMES MIDDLESEX TW16 7QE</span></li>
                                <li><img src="{{ asset('imgs/theme/icons/icon-contact.svg') }}"
                                        alt="" /><strong>Call
                                        Us:</strong><span>0207 205 2477</span>
                                </li>
                                <li><img src="{{ asset('imgs/theme/icons/icon-email-2.svg') }}"
                                        alt="" /><strong>Email:</strong><span>contact@naturaljuices.co.uk</span></li>
                                <li><img src="{{ asset('imgs/theme/icons/icon-clock.svg') }}"
                                        alt="" /><strong>Hours:</strong><span>9am - 8pm, Mon - Sat</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="footer-link-widget col">
                        <h4 class="widget-title">COMPANY INFO</h4>
                        <ul class="footer-list mb-sm-5 mb-md-0">
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">Wellness Blog</a></li>
                            <li><a href="#">Terms of Use</a></li>
                            <li><a href="#">Testimonials</a></li>
                            <li><a href="#">Cookie Policy</a></li>
                        </ul>
                    </div>
                    <div class="footer-link-widget col">
                        <h4 class="widget-title">ACCOUNT</h4>
                        <ul class="footer-list mb-sm-5 mb-md-0">
                            <li><a href="#">Customer Register</a></li>
                            <li><a href="#">Customer Login</a></li>
                            <li><a href="#">Forgot Password</a></li>
                        </ul>
                    </div>
                    <div class="footer-link-widget col">
                        <h4 class="widget-title">NEED HELP ?</h4>
                        <ul class="footer-list mb-sm-5 mb-md-0">
                            <li><a href="#">Track Order</a></li>
                            <li><a href="#">FAQ</a></li>
                            <li><a href="#">Contact Us</a></li>
                        </ul>
                    </div>
                    <div class="footer-link-widget widget-install-app col">
                        <h4 class="mb-20 mt-4">Secured Payment Gateways</h4>
                        <img class="wow fadeIn animated" src="{{ asset('imgs/theme/payment-method.png') }}"
                            alt="" />
                    </div>
                </div>
            </div>
        </section>
        <div class="container pb-30">
            <div class="row align-items-center">
                <div class="col-12 mb-30">
                    <div class="footer-bottom"></div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6">
                    <p class="font-sm mb-0">&copy; 2022, <strong class="text-brand">Nest</strong> - HTML Ecommerce
                        Template <br />All rights reserved</p>
                </div>
                <div class="col-xl-4 col-lg-6 text-center d-none d-xl-block">
                    <div class="hotline d-lg-inline-flex mr-30">
                        <img src="{{ asset('imgs/theme/icons/phone-call.svg') }}" alt="hotline" />
                        <p>1900 - 6666<span>Working 8:00 - 22:00</span></p>
                    </div>
                    <div class="hotline d-lg-inline-flex">
                        <img src="{{ asset('imgs/theme/icons/phone-call.svg') }}" alt="hotline" />
                        <p>1900 - 8888<span>24/7 Support Center</span></p>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6 text-end d-none d-md-block">
                    <div class="mobile-social-icon">
                        <h6>Follow Us</h6>
                        <a href="#"><img src="{{ asset('imgs/theme/icons/icon-facebook-white.svg') }}"
                                alt="" /></a>
                        <a href="#"><img src="{{ asset('imgs/theme/icons/icon-twitter-white.svg') }}"
                                alt="" /></a>
                        <a href="#"><img src="{{ asset('imgs/theme/icons/icon-instagram-white.svg') }}"
                                alt="" /></a>
                        <a href="#"><img src="{{ asset('imgs/theme/icons/icon-pinterest-white.svg') }}"
                                alt="" /></a>
                        <a href="#"><img src="{{ asset('imgs/theme/icons/icon-youtube-white.svg') }}"
                                alt="" /></a>
                    </div>
                    <p class="font-sm">Up to 15% discount on your first subscribe</p>
                </div>
            </div>
        </div>
    </footer>
    <!-- Preloader Start -->
    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="text-center">
                    <img src="{{ asset('imgs/theme/loading.gif') }}" alt="" />
                </div>
            </div>
        </div>
    </div>
    <!-- Vendor JS-->
    <!-- Vendor JS-->
    <script src="{{ url('frontend/assets/js/vendor/modernizr-3.6.0.min.js') }}"></script>
    <script src="{{ url('frontend/assets/js/vendor/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ url('frontend/assets/js/vendor/jquery-migrate-3.3.0.min.js') }}"></script>
    <script src="{{ url('frontend/assets/js/vendor/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ url('frontend/assets/js/plugins/slick.js') }}"></script>
    <script src="{{ url('frontend/assets/js/plugins/jquery.syotimer.min.js') }}"></script>
    <script src="{{ url('frontend/assets/js/plugins/wow.js') }}"></script>
    <script src="{{ url('frontend/assets/js/plugins/perfect-scrollbar.js') }}"></script>
    <script src="{{ url('frontend/assets/js/plugins/magnific-popup.js') }}"></script>
    <script src="{{ url('frontend/assets/js/plugins/select2.min.js') }}"></script>
    <script src="{{ url('frontend/assets/js/plugins/waypoints.js') }}"></script>
    <script src="{{ url('frontend/assets/js/plugins/counterup.js') }}"></script>
    <script src="{{ url('frontend/assets/js/plugins/jquery.countdown.min.js') }}"></script>
    <script src="{{ url('frontend/assets/js/plugins/images-loaded.js') }}"></script>
    <script src="{{ url('frontend/assets/js/plugins/isotope.js') }}"></script>
    <script src="{{ url('frontend/assets/js/plugins/scrollup.js') }}"></script>
    <script src="{{ url('frontend/assets/js/plugins/jquery.vticker-min.js') }}"></script>
    <script src="{{ url('frontend/assets/js/plugins/jquery.theia.sticky.js') }}"></script>
    <script src="{{ url('frontend/assets/js/plugins/jquery.elevatezoom.js') }}"></script>
    <!-- Template  JS -->
    <script src="{{ url('frontend/assets/js/main.js?v=5.5') }}"></script>
    <script src="{{ url('frontend/assets/js/shop.js?v=5.5') }}"></script>

    @if(Session::has('register_success'))

        <script type="text/javascript">
            Swal.fire(
              'Registration Successful',
              'Wellcome to natural juices',
              'success'
            )
        </script>

    @endif

</body>

</html>
