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
                <div class="banner-text">
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
    <h3>Weekly Offers</h3>
        <div class="row">
            @foreach($offerCategories as $key => $offerCategory)
                <h5>{{$offerCategory->name}}</h5>
                @foreach($offerCategory->offers as $key => $offer)
                        <div class="col-lg-4 col-md-6">
                            <div class="banner-img wow animate__animated animate__fadeInUp syrup_box" data-wow-delay="0">
                                <img class="default-img" src="images/offers/{{ $offer->offerImages[0]->img_name }}" alt="" />
                                <div class="banner-text">
                                    <a href="shop-grid-right.html" class="btn btn-xs">Shop Now <i class="fi-rs-arrow-small-right"></i></a>
                                </div>
                            </div>
                        </div>
                @endforeach
            @endforeach
        </div>
    </section>
    <!--End banners-->