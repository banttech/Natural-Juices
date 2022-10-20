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
                <div class="banner-text mt-0">
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
    <h3 class="text-center">Weekly Offers</h3>
    <div class="row">
        @foreach($offerCategories as $key => $offerCategory)
            <h5 style="margin: 20px 0 12px 0px; padding-left: 28px; text-decoration: underline;">{{$offerCategory->name}}</h5>
            <div class="container">
                <div class="main_banner" style="width: 100%;">
                    @foreach($offerCategory->offers as $key => $offer)
                        @if($key == 0)
                            <div style="width: 60%;float: left;height: 500px;" >
                                <img class="default-img_banner" src="images/offers/{{ $offer->offerImages[0]->img_name }}" alt="" width="" style="object-fit: fill;">
                            </div>
                        @endif
                        <div style="width: 40%;float: left;">
                            @if($key == 1)
                                <div style="width: 100%;height: 250px;">
                                 <img class="default-img_banner" src="images/offers/{{ $offer->offerImages[0]->img_name }}" alt="" width="100%" style="object-fit: fill;">
                                </div>
                            @endif
                            @if($key == 2)
                                <div style="width: 100%;height: 250px;">
                                 <img class="default-img_banner" src="images/offers/{{ $offer->offerImages[0]->img_name }}" alt="" width="100%" style="object-fit: fill;">
                                </div>
                            @endif       
                        </div>
                    @endforeach
                </div>
                <div style="clear: both;"></div>
            </div>
        @endforeach
   
       </section>
    <!--End banners-->