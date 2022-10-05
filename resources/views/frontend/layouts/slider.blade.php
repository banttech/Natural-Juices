<section class="home-slider style-2 position-relative mb-50">
    <div class="container">
        <div class="row">
            <div class="col-xl-8 col-lg-12">
                <div class="home-slide-cover">
                    <div class="hero-slider-1 style-4 dot-style-1 dot-style-1-position-1">
                        @foreach($homePageAds as $key => $homePageAd)
                        <div class="single-hero-slider single-animation-wrap"
                            style="background-image: url({{ url('images/home-ads/' . $homePageAd->image_name) }})">
                        </div>
                        @endforeach
                    </div>
                    <div class="slider-arrow hero-slider-1-arrow"></div>
                </div>
            </div>
            <div class="col-lg-4 d-none d-xl-block">
                <div class="banner-img style-3 animated animated">
                    <div class="banner-text mt-50">
                        <img src="{{ url('images/home-offer/' . $homePageOffer->image_name) }}" alt="" />

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--End hero slider-->
<section class="banners mb-25">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                    <div class="tab-content" id="myTabContent-1">
                        <div class="tab-pane fade show active" id="tab-one-1" role="tabpanel"
                            aria-labelledby="tab-one-1">
                            <div class="carausel-4-columns-cover arrow-center position-relative">
                                <div class="slider-arrow slider-arrow-2 carausel-4-columns-arrow"
                                    id="carausel-4-columns-arrows"></div>
                                <div class="carausel-4-columns carausel-arrow-center" id="carausel-4-columns">
                                    <div class="product-cart-wrap">
                                        <div class="product-img-action-wrap">
                                            <div class="product-img product-img-zoom">
                                                <a href="shop-product-right.html">
                                                    <img class="default-img"
                                                        src="{{ asset('imgs/shop/product-1-1.jpg') }}"
                                                        alt="" />
                                                    <!-- <img class="hover-img"
                                                        src="{{ asset('imgs/shop/product-1-2.jpg') }}"
                                                        alt="" /> -->
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <!--End product Wrap-->
                                </div>
                            </div>
                        </div>
                        <!--End tab-pane-->
                        
                    </div>
                    <!--End tab-content-->
                </div>
            <!-- <div class="col-lg-4 col-md-6">
                <div class="banner-img">
                    <img src="{{ asset('imgs/banner/banner-1.png') }}" alt="" />
                    <div class="banner-text">
                        <h4>
                            Make your Breakfast <br />Healthy and Easy
                        </h4>
                        <a href="shop-grid-right.html" class="btn btn-xs">Shop Now <i
                                class="fi-rs-arrow-small-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="banner-img">
                    <img src="{{ asset('imgs/banner/banner-2.png') }}" alt="" />
                    <div class="banner-text">
                        <h4>
                            Make your Breakfast<br />
                            Healthy and Easy
                        </h4>
                        <a href="shop-grid-right.html" class="btn btn-xs">Shop Now <i
                                class="fi-rs-arrow-small-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 d-md-none d-lg-flex">
                <div class="banner-img mb-sm-0">
                    <img src="{{ asset('imgs/banner/banner-3.png') }}" alt="" />
                    <div class="banner-text">
                        <h4>The best Organic <br />Products Online</h4>
                        <a href="shop-grid-right.html" class="btn btn-xs">Shop Now <i
                                class="fi-rs-arrow-small-right"></i></a>
                    </div>
                </div>
            </div> -->
        </div>
    </div>
</section>
<!--End banners-->
