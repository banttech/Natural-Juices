@extends('layouts.frontend.app')
@section('content')
    @include('frontend.layouts.slider')
    <style type="text/css">
        .bold-icon{color: #000;}
    </style>
    <section class="product-tabs section-padding position-relative">
        <div class="container">
            <div class="section-title style-2">
                <h3>Popular Products</h3>
                <ul class="nav nav-tabs links" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="nav-tab-one" data-bs-toggle="tab" data-bs-target="#tab-one"
                            type="button" role="tab" aria-controls="tab-one" aria-selected="true" onclick="filterByCat('all')">All</button>
                    </li>
                    @foreach($categories as $key => $category)
                        @if($category->category_level == 2)
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="nav-tab-one" data-bs-toggle="tab" data-bs-target="#tab-one"
                                    type="button" role="tab" aria-controls="tab-one" aria-selected="true" onclick="filterByCat({{$category->id}})">{{ $category->name }}</button>
                            </li>
                        @endif
                    @endforeach
                </ul>
            </div>
            <!--End nav-tabs-->
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="tab-one" role="tabpanel" aria-labelledby="tab-one">
                    <div class="row product-grid-4" id="product_parent">
                        @foreach($products as $key => $product)
                        <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                            <div class="product-cart-wrap mb-30">
                                <div class="product-img-action-wrap">
                                    <div class="product-img product-img-zoom">
                                        <a href="#">
                                            <img class="default-img" src="{{url('/')}}/images/products/{{$product->feature_img[0]->image_name}}" alt="" />
                                            <img class="hover-img" src="{{url('/')}}/images/products/{{$product->feature_img[1]->image_name}}" alt="" />
                                        </a>
                                    </div>
                                    <div class="product-action-1">
                                        <a aria-label="Quick view" class="action-btn" href="{{ url('product/' . $product->url_slug) }}"><i class="fi-rs-eye"></i></a>
                                    </div>
                                    <div class="product-badges product-badges-position product-badges-mrg">
                                        <span class="sale">??{{$product->reg_sel_price - $product->final_sel_price}} OFF</span>
                                    </div>
                                </div>
                                <div class="product-content-wrap">
                                    <div class="product-category">
                                        <a href="shop-grid-right.html">{{$product->category[0]->name}}</a>
                                    </div>
                                    <h2 style="overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 2; line-clamp: 2; -webkit-box-orient: vertical;"><a href="shop-product-right.html">{{ $product->prod_name }}</a></h2>
                                    <div class="product-rate-cover">
                                        <div class="product-rate d-inline-block">
                                            <div class="product-rating" style="width: 80%"></div>
                                        </div>
                                        <span class="font-small ml-5 text-muted"> (3.5)</span>
                                    </div>
                                    <div>
                                        <span class="font-small text-muted"><a
                                                href="#" style="font-weight: bold;">Manual Discount: ??{{$product->prod_manual_discount}}</a></span>
                                    </div>
                                    <div class="product-card-bottom">
                                        <div class="product-price">
                                            <span>??{{ $product->final_sel_price }}</span>
                                            <span class="old-price">??{{$product->reg_sel_price}}<span>
                                        </div>
                                        <div class="add-cart" onclick="addToCart({{$product->id}})">
                                            <a class="add"><i
                                                    class="fi-rs-shopping-cart mr-5"></i>Add </a>
                                        </div>
                                        <!-- href="{{ route('add.to.cart', $product->id) }}" -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Products Tabs-->
    <section class="section-padding pb-5">
        <div class="container">
            <div class="section-title">
                <h3 class="">Premium Quality NaturalJuices Products</h3>
            </div>
            <div class="row">
                <div class="col-lg-3 d-none d-lg-flex">
                    <div class="banner-img style-2">
                        <div class="banner-text" style="position: absolute; padding: 0 50px;">
                            <h2 class="mb-100">Bring nature into your home</h2>
                            <a href="shop-grid-right.html" class="btn btn-xs">Shop Now <i
                                    class="fi-rs-arrow-small-right"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 col-md-12">
                    <div class="tab-content" id="myTabContent-1">
                        <div class="tab-pane fade show active" id="tab-one-1" role="tabpanel"
                            aria-labelledby="tab-one-1">
                            <div class="carausel-4-columns-cover arrow-center position-relative">
                                <div class="slider-arrow slider-arrow-2 carausel-4-columns-arrow"
                                    id="carausel-4-columns-arrows"></div>
                                <div class="carausel-4-columns carausel-arrow-center" id="carausel-4-columns">
                                    @foreach($products as $key => $product)
                                        @if($product->category[0]->name == 'NONI JUICE')
                                            <div class="product-cart-wrap">
                                                <div class="product-img-action-wrap">
                                                    <div class="product-img product-img-zoom">
                                                        <a href="shop-product-right.html">
                                                            <img class="default-img" src="{{url('/')}}/images/products/{{$product->feature_img[0]->image_name}}" alt="" />
                                                            <img class="hover-img" src="{{url('/')}}/images/products/{{$product->feature_img[1]->image_name}}" alt="" />
                                                        </a>
                                                    </div>
                                                    <div class="product-action-1">
                                                        <a aria-label="Quick view" class="action-btn" href="{{ url('product/' . $product->url_slug) }}"> <i class="fi-rs-eye"></i></a>
                                                    </div>
                                                    <div class="product-badges product-badges-position product-badges-mrg">
                                                        <span class="hot">??{{$product->reg_sel_price - $product->final_sel_price}} OFF</span>
                                                    </div>
                                                </div>
                                                <div class="product-content-wrap">
                                                    <div class="product-category">
                                                        <a href="shop-grid-right.html">{{$product->category[0]->name}}</a>
                                                    </div>
                                                    <h2 style="overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 2; line-clamp: 2; -webkit-box-orient: vertical;"><a href="shop-product-right.html">{{ $product->prod_name }}</a></h2>
                                                    <div class="product-rate d-inline-block">
                                                        <div class="product-rating" style="width: 80%"></div>
                                                    </div>
                                                    <div class="product-price mt-10">
                                                        <span>??{{ $product->final_sel_price }} </span>
                                                        <span class="old-price">??{{$product->reg_sel_price}}</span>
                                                    </div>
                                                    <div class="sold mt-15 mb-15">
                                                        <div class="progress mb-5">
                                                            <div class="progress-bar" role="progressbar" style="width: 50%"
                                                                aria-valuemin="0" aria-valuemax="100"></div>
                                                        </div>
                                                        <span class="font-xs text-heading"> Sold: {{ $product->prod_stock_unit }}/{{ $product->prod_stock_unit }}</span>
                                                    </div>
                                                    <a onclick="addToCart({{$product->id}})" class="btn w-100 hover-up"><i
                                                            class="fi-rs-shopping-cart mr-5"></i>Add To Cart</a>
                                                </div>
                                            </div>      
                                        @endif
                                    @endforeach
                                    <!--End product Wrap-->
                                </div>
                            </div>
                        </div>
                        <!--End tab-pane-->
                        <div class="tab-pane fade" id="tab-two-1" role="tabpanel" aria-labelledby="tab-two-1">
                            <div class="carausel-4-columns-cover arrow-center position-relative">
                                <div class="slider-arrow slider-arrow-2 carausel-4-columns-arrow"
                                    id="carausel-4-columns-2-arrows"></div>
                                <div class="carausel-4-columns carausel-arrow-center" id="carausel-4-columns-2">
                                    <div class="product-cart-wrap">
                                        <div class="product-img-action-wrap">
                                            <div class="product-img product-img-zoom">
                                                <a href="shop-product-right.html">
                                                    <img class="default-img"
                                                        src="{{ asset('imgs/shop/product-10-1.jpg') }}"
                                                        alt="" />
                                                    <img class="hover-img"
                                                        src="{{ asset('imgs/shop/product-10-2.jpg') }}"
                                                        alt="" />
                                                </a>
                                            </div>
                                            <div class="product-action-1">
                                                <a aria-label="Quick view" class="action-btn small hover-up"
                                                    data-bs-toggle="modal" data-bs-target="#quickViewModal"> <i
                                                        class="fi-rs-eye"></i></a>
                                                <a aria-label="Add To Wishlist" class="action-btn small hover-up"
                                                    href="shop-wishlist.html"><i class="fi-rs-heart"></i></a>
                                                <a aria-label="Compare" class="action-btn small hover-up"
                                                    href="shop-compare.html"><i class="fi-rs-shuffle"></i></a>
                                            </div>
                                            <div class="product-badges product-badges-position product-badges-mrg">
                                                <span class="hot">Save 15%</span>
                                            </div>
                                        </div>
                                        <div class="product-content-wrap">
                                            <div class="product-category">
                                                <a href="shop-grid-right.html">Hodo Foods</a>
                                            </div>
                                            <h2><a href="shop-product-right.html">Canada Dry Ginger Ale ??? 2 L
                                                    Bottle</a></h2>
                                            <div class="product-rate d-inline-block">
                                                <div class="product-rating" style="width: 80%"></div>
                                            </div>
                                            <div class="product-price mt-10">
                                                <span>??238.85 </span>
                                                <span class="old-price">??245.8</span>
                                            </div>
                                            <div class="sold mt-15 mb-15">
                                                <div class="progress mb-5">
                                                    <div class="progress-bar" role="progressbar" style="width: 50%"
                                                        aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                                <span class="font-xs text-heading"> Sold: 90/120</span>
                                            </div>
                                            <a href="shop-cart.html" class="btn w-100 hover-up"><i
                                                    class="fi-rs-shopping-cart mr-5"></i>Add To Cart</a>
                                        </div>
                                    </div>
                                    <!--End product Wrap-->
                                    <div class="product-cart-wrap">
                                        <div class="product-img-action-wrap">
                                            <div class="product-img product-img-zoom">
                                                <a href="shop-product-right.html">
                                                    <img class="default-img"
                                                        src="{{ asset('imgs/shop/product-15-1.jpg') }}"
                                                        alt="" />
                                                    <img class="hover-img"
                                                        src="{{ asset('imgs/shop/product-15-2.jpg') }}"
                                                        alt="" />
                                                </a>
                                            </div>
                                            <div class="product-action-1">
                                                <a aria-label="Quick view" class="action-btn small hover-up"
                                                    data-bs-toggle="modal" data-bs-target="#quickViewModal"> <i
                                                        class="fi-rs-eye"></i></a>
                                                <a aria-label="Add To Wishlist" class="action-btn small hover-up"
                                                    href="shop-wishlist.html"><i class="fi-rs-heart"></i></a>
                                                <a aria-label="Compare" class="action-btn small hover-up"
                                                    href="shop-compare.html"><i class="fi-rs-shuffle"></i></a>
                                            </div>
                                            <div class="product-badges product-badges-position product-badges-mrg">
                                                <span class="new">Save 35%</span>
                                            </div>
                                        </div>
                                        <div class="product-content-wrap">
                                            <div class="product-category">
                                                <a href="shop-grid-right.html">Hodo Foods</a>
                                            </div>
                                            <h2><a href="shop-product-right.html">Encore Seafoods Stuffed
                                                    Alaskan</a></h2>
                                            <div class="product-rate d-inline-block">
                                                <div class="product-rating" style="width: 80%"></div>
                                            </div>
                                            <div class="product-price mt-10">
                                                <span>??238.85 </span>
                                                <span class="old-price">??245.8</span>
                                            </div>
                                            <div class="sold mt-15 mb-15">
                                                <div class="progress mb-5">
                                                    <div class="progress-bar" role="progressbar" style="width: 50%"
                                                        aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                                <span class="font-xs text-heading"> Sold: 90/120</span>
                                            </div>
                                            <a href="shop-cart.html" class="btn w-100 hover-up"><i
                                                    class="fi-rs-shopping-cart mr-5"></i>Add To Cart</a>
                                        </div>
                                    </div>
                                    <!--End product Wrap-->
                                    <div class="product-cart-wrap">
                                        <div class="product-img-action-wrap">
                                            <div class="product-img product-img-zoom">
                                                <a href="shop-product-right.html">
                                                    <img class="default-img"
                                                        src="{{ asset('imgs/shop/product-12-1.jpg') }}"
                                                        alt="" />
                                                    <img class="hover-img"
                                                        src="{{ asset('imgs/shop/product-12-2.jpg') }}"
                                                        alt="" />
                                                </a>
                                            </div>
                                            <div class="product-action-1">
                                                <a aria-label="Quick view" class="action-btn small hover-up"
                                                    data-bs-toggle="modal" data-bs-target="#quickViewModal"> <i
                                                        class="fi-rs-eye"></i></a>
                                                <a aria-label="Add To Wishlist" class="action-btn small hover-up"
                                                    href="shop-wishlist.html"><i class="fi-rs-heart"></i></a>
                                                <a aria-label="Compare" class="action-btn small hover-up"
                                                    href="shop-compare.html"><i class="fi-rs-shuffle"></i></a>
                                            </div>
                                            <div class="product-badges product-badges-position product-badges-mrg">
                                                <span class="sale">Sale</span>
                                            </div>
                                        </div>
                                        <div class="product-content-wrap">
                                            <div class="product-category">
                                                <a href="shop-grid-right.html">Hodo Foods</a>
                                            </div>
                                            <h2><a href="shop-product-right.html">Gorton???s Beer Battered Fish </a>
                                            </h2>
                                            <div class="product-rate d-inline-block">
                                                <div class="product-rating" style="width: 80%"></div>
                                            </div>
                                            <div class="product-price mt-10">
                                                <span>??238.85 </span>
                                                <span class="old-price">??245.8</span>
                                            </div>
                                            <div class="sold mt-15 mb-15">
                                                <div class="progress mb-5">
                                                    <div class="progress-bar" role="progressbar" style="width: 50%"
                                                        aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                                <span class="font-xs text-heading"> Sold: 90/120</span>
                                            </div>
                                            <a href="shop-cart.html" class="btn w-100 hover-up"><i
                                                    class="fi-rs-shopping-cart mr-5"></i>Add To Cart</a>
                                        </div>
                                    </div>
                                    <!--End product Wrap-->
                                    <div class="product-cart-wrap">
                                        <div class="product-img-action-wrap">
                                            <div class="product-img product-img-zoom">
                                                <a href="shop-product-right.html">
                                                    <img class="default-img"
                                                        src="{{ asset('imgs/shop/product-13-1.jpg') }}"
                                                        alt="" />
                                                    <img class="hover-img"
                                                        src="{{ asset('imgs/shop/product-13-2.jpg') }}"
                                                        alt="" />
                                                </a>
                                            </div>
                                            <div class="product-action-1">
                                                <a aria-label="Quick view" class="action-btn small hover-up"
                                                    data-bs-toggle="modal" data-bs-target="#quickViewModal"> <i
                                                        class="fi-rs-eye"></i></a>
                                                <a aria-label="Add To Wishlist" class="action-btn small hover-up"
                                                    href="shop-wishlist.html"><i class="fi-rs-heart"></i></a>
                                                <a aria-label="Compare" class="action-btn small hover-up"
                                                    href="shop-compare.html"><i class="fi-rs-shuffle"></i></a>
                                            </div>
                                            <div class="product-badges product-badges-position product-badges-mrg">
                                                <span class="best">Best sale</span>
                                            </div>
                                        </div>
                                        <div class="product-content-wrap">
                                            <div class="product-category">
                                                <a href="shop-grid-right.html">Hodo Foods</a>
                                            </div>
                                            <h2><a href="shop-product-right.html">Haagen-Dazs Caramel Cone Ice</a>
                                            </h2>
                                            <div class="product-rate d-inline-block">
                                                <div class="product-rating" style="width: 80%"></div>
                                            </div>
                                            <div class="product-price mt-10">
                                                <span>??238.85 </span>
                                                <span class="old-price">??245.8</span>
                                            </div>
                                            <div class="sold mt-15 mb-15">
                                                <div class="progress mb-5">
                                                    <div class="progress-bar" role="progressbar" style="width: 50%"
                                                        aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                                <span class="font-xs text-heading"> Sold: 90/120</span>
                                            </div>
                                            <a href="shop-cart.html" class="btn w-100 hover-up"><i
                                                    class="fi-rs-shopping-cart mr-5"></i>Add To Cart</a>
                                        </div>
                                    </div>
                                    <!--End product Wrap-->
                                    <div class="product-cart-wrap">
                                        <div class="product-img-action-wrap">
                                            <div class="product-img product-img-zoom">
                                                <a href="shop-product-right.html">
                                                    <img class="default-img"
                                                        src="{{ asset('imgs/shop/product-14-1.jpg') }}"
                                                        alt="" />
                                                    <img class="hover-img"
                                                        src="{{ asset('imgs/shop/product-14-2.jpg') }}"
                                                        alt="" />
                                                </a>
                                            </div>
                                            <div class="product-action-1">
                                                <a aria-label="Quick view" class="action-btn small hover-up"
                                                    data-bs-toggle="modal" data-bs-target="#quickViewModal"> <i
                                                        class="fi-rs-eye"></i></a>
                                                <a aria-label="Add To Wishlist" class="action-btn small hover-up"
                                                    href="shop-wishlist.html"><i class="fi-rs-heart"></i></a>
                                                <a aria-label="Compare" class="action-btn small hover-up"
                                                    href="shop-compare.html"><i class="fi-rs-shuffle"></i></a>
                                            </div>
                                            <div class="product-badges product-badges-position product-badges-mrg">
                                                <span class="hot">Save 15%</span>
                                            </div>
                                        </div>
                                        <div class="product-content-wrap">
                                            <div class="product-category">
                                                <a href="shop-grid-right.html">Hodo Foods</a>
                                            </div>
                                            <h2><a href="shop-product-right.html">Italian-Style Chicken
                                                    Meatball</a></h2>
                                            <div class="product-rate d-inline-block">
                                                <div class="product-rating" style="width: 80%"></div>
                                            </div>
                                            <div class="product-price mt-10">
                                                <span>??238.85 </span>
                                                <span class="old-price">??245.8</span>
                                            </div>
                                            <div class="sold mt-15 mb-15">
                                                <div class="progress mb-5">
                                                    <div class="progress-bar" role="progressbar" style="width: 50%"
                                                        aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                                <span class="font-xs text-heading"> Sold: 90/120</span>
                                            </div>
                                            <a href="shop-cart.html" class="btn w-100 hover-up"><i
                                                    class="fi-rs-shopping-cart mr-5"></i>Add To Cart</a>
                                        </div>
                                    </div>
                                    <!--End product Wrap-->
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="tab-three-1" role="tabpanel" aria-labelledby="tab-three-1">
                            <div class="carausel-4-columns-cover arrow-center position-relative">
                                <div class="slider-arrow slider-arrow-2 carausel-4-columns-arrow"
                                    id="carausel-4-columns-3-arrows"></div>
                                <div class="carausel-4-columns carausel-arrow-center" id="carausel-4-columns-3">
                                    <div class="product-cart-wrap">
                                        <div class="product-img-action-wrap">
                                            <div class="product-img product-img-zoom">
                                                <a href="shop-product-right.html">
                                                    <img class="default-img"
                                                        src="{{ asset('imgs/shop/product-7-1.jpg') }}"
                                                        alt="" />
                                                    <img class="hover-img"
                                                        src="{{ asset('imgs/shop/product-7-2.jpg') }}"
                                                        alt="" />
                                                </a>
                                            </div>
                                            <div class="product-action-1">
                                                <a aria-label="Quick view" class="action-btn small hover-up"
                                                    data-bs-toggle="modal" data-bs-target="#quickViewModal"> <i
                                                        class="fi-rs-eye"></i></a>
                                                <a aria-label="Add To Wishlist" class="action-btn small hover-up"
                                                    href="shop-wishlist.html"><i class="fi-rs-heart"></i></a>
                                                <a aria-label="Compare" class="action-btn small hover-up"
                                                    href="shop-compare.html"><i class="fi-rs-shuffle"></i></a>
                                            </div>
                                            <div class="product-badges product-badges-position product-badges-mrg">
                                                <span class="hot">Save 15%</span>
                                            </div>
                                        </div>
                                        <div class="product-content-wrap">
                                            <div class="product-category">
                                                <a href="shop-grid-right.html">Hodo Foods</a>
                                            </div>
                                            <h2><a href="shop-product-right.html">Perdue Simply Smart Organics
                                                    Gluten Free</a></h2>
                                            <div class="product-rate d-inline-block">
                                                <div class="product-rating" style="width: 80%"></div>
                                            </div>
                                            <div class="product-price mt-10">
                                                <span>??238.85 </span>
                                                <span class="old-price">??245.8</span>
                                            </div>
                                            <div class="sold mt-15 mb-15">
                                                <div class="progress mb-5">
                                                    <div class="progress-bar" role="progressbar" style="width: 50%"
                                                        aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                                <span class="font-xs text-heading"> Sold: 90/120</span>
                                            </div>
                                            <a href="shop-cart.html" class="btn w-100 hover-up"><i
                                                    class="fi-rs-shopping-cart mr-5"></i>Add To Cart</a>
                                        </div>
                                    </div>
                                    <!--End product Wrap-->
                                    <div class="product-cart-wrap">
                                        <div class="product-img-action-wrap">
                                            <div class="product-img product-img-zoom">
                                                <a href="shop-product-right.html">
                                                    <img class="default-img"
                                                        src="{{ asset('imgs/shop/product-8-1.jpg') }}"
                                                        alt="" />
                                                    <img class="hover-img"
                                                        src="{{ asset('imgs/shop/product-8-2.jpg') }}"
                                                        alt="" />
                                                </a>
                                            </div>
                                            <div class="product-action-1">
                                                <a aria-label="Quick view" class="action-btn small hover-up"
                                                    data-bs-toggle="modal" data-bs-target="#quickViewModal"> <i
                                                        class="fi-rs-eye"></i></a>
                                                <a aria-label="Add To Wishlist" class="action-btn small hover-up"
                                                    href="shop-wishlist.html"><i class="fi-rs-heart"></i></a>
                                                <a aria-label="Compare" class="action-btn small hover-up"
                                                    href="shop-compare.html"><i class="fi-rs-shuffle"></i></a>
                                            </div>
                                            <div class="product-badges product-badges-position product-badges-mrg">
                                                <span class="new">Save 35%</span>
                                            </div>
                                        </div>
                                        <div class="product-content-wrap">
                                            <div class="product-category">
                                                <a href="shop-grid-right.html">Hodo Foods</a>
                                            </div>
                                            <h2><a href="shop-product-right.html">Seeds of Change Organic
                                                    Quinoa</a></h2>
                                            <div class="product-rate d-inline-block">
                                                <div class="product-rating" style="width: 80%"></div>
                                            </div>
                                            <div class="product-price mt-10">
                                                <span>??238.85 </span>
                                                <span class="old-price">??245.8</span>
                                            </div>
                                            <div class="sold mt-15 mb-15">
                                                <div class="progress mb-5">
                                                    <div class="progress-bar" role="progressbar" style="width: 50%"
                                                        aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                                <span class="font-xs text-heading"> Sold: 90/120</span>
                                            </div>
                                            <a href="shop-cart.html" class="btn w-100 hover-up"><i
                                                    class="fi-rs-shopping-cart mr-5"></i>Add To Cart</a>
                                        </div>
                                    </div>
                                    <!--End product Wrap-->
                                    <div class="product-cart-wrap">
                                        <div class="product-img-action-wrap">
                                            <div class="product-img product-img-zoom">
                                                <a href="shop-product-right.html">
                                                    <img class="default-img"
                                                        src="{{ asset('imgs/shop/product-9-1.jpg') }}"
                                                        alt="" />
                                                    <img class="hover-img"
                                                        src="{{ asset('imgs/shop/product-9-2.jpg') }}"
                                                        alt="" />
                                                </a>
                                            </div>
                                            <div class="product-action-1">
                                                <a aria-label="Quick view" class="action-btn small hover-up"
                                                    data-bs-toggle="modal" data-bs-target="#quickViewModal"> <i
                                                        class="fi-rs-eye"></i></a>
                                                <a aria-label="Add To Wishlist" class="action-btn small hover-up"
                                                    href="shop-wishlist.html"><i class="fi-rs-heart"></i></a>
                                                <a aria-label="Compare" class="action-btn small hover-up"
                                                    href="shop-compare.html"><i class="fi-rs-shuffle"></i></a>
                                            </div>
                                            <div class="product-badges product-badges-position product-badges-mrg">
                                                <span class="sale">Sale</span>
                                            </div>
                                        </div>
                                        <div class="product-content-wrap">
                                            <div class="product-category">
                                                <a href="shop-grid-right.html">Hodo Foods</a>
                                            </div>
                                            <h2><a href="shop-product-right.html">Signature Wood-Fired
                                                    Mushroom</a></h2>
                                            <div class="product-rate d-inline-block">
                                                <div class="product-rating" style="width: 80%"></div>
                                            </div>
                                            <div class="product-price mt-10">
                                                <span>$238.85 </span>
                                                <span class="old-price">$245.8</span>
                                            </div>
                                            <div class="sold mt-15 mb-15">
                                                <div class="progress mb-5">
                                                    <div class="progress-bar" role="progressbar" style="width: 50%"
                                                        aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                                <span class="font-xs text-heading"> Sold: 90/120</span>
                                            </div>
                                            <a href="shop-cart.html" class="btn w-100 hover-up"><i
                                                    class="fi-rs-shopping-cart mr-5"></i>Add To Cart</a>
                                        </div>
                                    </div>
                                    <!--End product Wrap-->
                                    <div class="product-cart-wrap">
                                        <div class="product-img-action-wrap">
                                            <div class="product-img product-img-zoom">
                                                <a href="shop-product-right.html">
                                                    <img class="default-img"
                                                        src="{{ asset('imgs/shop/product-13-1.jpg') }}"
                                                        alt="" />
                                                    <img class="hover-img"
                                                        src="{{ asset('imgs/shop/product-13-2.jpg') }}"
                                                        alt="" />
                                                </a>
                                            </div>
                                            <div class="product-action-1">
                                                <a aria-label="Quick view" class="action-btn small hover-up"
                                                    data-bs-toggle="modal" data-bs-target="#quickViewModal"> <i
                                                        class="fi-rs-eye"></i></a>
                                                <a aria-label="Add To Wishlist" class="action-btn small hover-up"
                                                    href="shop-wishlist.html"><i class="fi-rs-heart"></i></a>
                                                <a aria-label="Compare" class="action-btn small hover-up"
                                                    href="shop-compare.html"><i class="fi-rs-shuffle"></i></a>
                                            </div>
                                            <div class="product-badges product-badges-position product-badges-mrg">
                                                <span class="best">Best sale</span>
                                            </div>
                                        </div>
                                        <div class="product-content-wrap">
                                            <div class="product-category">
                                                <a href="shop-grid-right.html">Hodo Foods</a>
                                            </div>
                                            <h2><a href="shop-product-right.html">Simply Lemonade with Raspberry
                                                    Juice</a></h2>
                                            <div class="product-rate d-inline-block">
                                                <div class="product-rating" style="width: 80%"></div>
                                            </div>
                                            <div class="product-price mt-10">
                                                <span>??238.85 </span>
                                                <span class="old-price">??245.8</span>
                                            </div>
                                            <div class="sold mt-15 mb-15">
                                                <div class="progress mb-5">
                                                    <div class="progress-bar" role="progressbar" style="width: 50%"
                                                        aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                                <span class="font-xs text-heading"> Sold: 90/120</span>
                                            </div>
                                            <a href="shop-cart.html" class="btn w-100 hover-up"><i
                                                    class="fi-rs-shopping-cart mr-5"></i>Add To Cart</a>
                                        </div>
                                    </div>
                                    <!--End product Wrap-->
                                    <div class="product-cart-wrap">
                                        <div class="product-img-action-wrap">
                                            <div class="product-img product-img-zoom">
                                                <a href="shop-product-right.html">
                                                    <img class="default-img"
                                                        src="{{ asset('imgs/shop/product-14-1.jpg') }}"
                                                        alt="" />
                                                    <img class="hover-img"
                                                        src="{{ asset('imgs/shop/product-14-2.jpg') }}"
                                                        alt="" />
                                                </a>
                                            </div>
                                            <div class="product-action-1">
                                                <a aria-label="Quick view" class="action-btn small hover-up"
                                                    data-bs-toggle="modal" data-bs-target="#quickViewModal"> <i
                                                        class="fi-rs-eye"></i></a>
                                                <a aria-label="Add To Wishlist" class="action-btn small hover-up"
                                                    href="shop-wishlist.html"><i class="fi-rs-heart"></i></a>
                                                <a aria-label="Compare" class="action-btn small hover-up"
                                                    href="shop-compare.html"><i class="fi-rs-shuffle"></i></a>
                                            </div>
                                            <div class="product-badges product-badges-position product-badges-mrg">
                                                <span class="hot">Save 15%</span>
                                            </div>
                                        </div>
                                        <div class="product-content-wrap">
                                            <div class="product-category">
                                                <a href="shop-grid-right.html">Hodo Foods</a>
                                            </div>
                                            <h2><a href="shop-product-right.html">Organic Quinoa, Brown, & Red
                                                    Rice</a></h2>
                                            <div class="product-rate d-inline-block">
                                                <div class="product-rating" style="width: 80%"></div>
                                            </div>
                                            <div class="product-price mt-10">
                                                <span>??238.85 </span>
                                                <span class="old-price">??245.8</span>
                                            </div>
                                            <div class="sold mt-15 mb-15">
                                                <div class="progress mb-5">
                                                    <div class="progress-bar" role="progressbar" style="width: 50%"
                                                        aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                                <span class="font-xs text-heading"> Sold: 90/120</span>
                                            </div>
                                            <a href="shop-cart.html" class="btn w-100 hover-up"><i
                                                    class="fi-rs-shopping-cart mr-5"></i>Add To Cart</a>
                                        </div>
                                    </div>
                                    <!--End product Wrap-->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End tab-content-->
                </div>
                <!--End Col-lg-9-->
            </div>
        </div>  
    </section>
    <!--End Best Sales-->
    <section class="section-padding mb-30">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-lg-4 col-md-6 mb-sm-5 mb-md-0">
                    <h4 class="section-title style-1 mb-30 animated animated">Top Selling</h4>
                    <div class="product-list-small animated animated">
                        @foreach($products as $key => $product)
                            @if($key < 3)
                                <article class="row align-items-center hover-up">
                                    <figure class="col-md-4 mb-0">
                                        <a href="{{ url('product/' . $product->url_slug) }}"><img src="images/products/{{ $product->feature_img[0]->image_name }}"
                                                alt="" /></a>
                                    </figure>
                                    <div class="col-md-8 mb-0">
                                        <h6>
                                            <a href="shop-product-right.html">{{ $product->prod_name }}</a>
                                        </h6>
                                        <div class="product-rate-cover">
                                            <div class="product-rate d-inline-block">
                                                <div class="product-rating" style="width: 90%"></div>
                                            </div>
                                            <span class="font-small ml-5 text-muted"> (4.0)</span>
                                        </div>
                                        <div class="product-price">
                                            <span>??{{ $product->final_sel_price }}</span>
                                            <span class="old-price">??{{$product->reg_sel_price}}</span>
                                        </div>
                                    </div>
                                </article>
                            @endif
                        @endforeach
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 mb-md-0">
                    <h4 class="section-title style-1 mb-30 animated animated">Popular Products</h4>
                    <div class="product-list-small animated animated">
                        @foreach($products as $key => $product)
                            @if($key < 3)
                                <article class="row align-items-center hover-up">
                                    <figure class="col-md-4 mb-0">
                                        <a href="{{ url('product/' . $product->url_slug) }}">
                                            <img class="default-img" src="{{url('/')}}/images/products/{{$product->feature_img[0]->image_name}}" alt="" />
                                        </a>
                                    </figure>
                                    <div class="col-md-8 mb-0">
                                        <h6>
                                            <a href="shop-product-right.html">{{ $product->prod_name }}</a>
                                        </h6>
                                        <div class="product-rate-cover">
                                            <div class="product-rate d-inline-block">
                                                <div class="product-rating" style="width: 90%"></div>
                                            </div>
                                            <span class="font-small ml-5 text-muted"> (4.0)</span>
                                        </div>
                                        <div class="product-price">
                                            <span>??{{ $product->final_sel_price }}</span>
                                            <span class="old-price">??{{$product->reg_sel_price}}</span>
                                        </div>
                                    </div>
                                </article>
                            @endif
                        @endforeach
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 mb-sm-5 mb-md-0 d-none d-lg-block">
                    <h4 class="section-title style-1 mb-30 animated animated">Recently Added</h4>
                    <div class="product-list-small animated animated">
                         @foreach($products as $key => $product)
                            @if($key < 3)
                                <article class="row align-items-center hover-up">
                                    <figure class="col-md-4 mb-0">
                                        <a href="{{ url('product/' . $product->url_slug) }}"><img src="images/products/{{ $product->feature_img[0]->image_name }}"
                                                alt="" /></a>
                                    </figure>
                                    <div class="col-md-8 mb-0">
                                        <h6>
                                            <a href="shop-product-right.html">{{ $product->prod_name }}</a>
                                        </h6>
                                        <div class="product-rate-cover">
                                            <div class="product-rate d-inline-block">
                                                <div class="product-rating" style="width: 90%"></div>
                                            </div>
                                            <span class="font-small ml-5 text-muted"> (4.0)</span>
                                        </div>
                                        <div class="product-price">
                                            <span>??{{ $product->final_sel_price }}</span>
                                            <span class="old-price">??{{$product->reg_sel_price}}</span>
                                        </div>
                                    </div>
                                </article>
                            @endif
                        @endforeach
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6 mb-sm-5 mb-md-0 d-none d-xl-block">
                    <h4 class="section-title style-1 mb-30 animated animated">Top Rated</h4>
                    <div class="product-list-small animated animated">
                         @foreach($products as $key => $product)
                            @if($key < 3)
                                <article class="row align-items-center hover-up">
                                    <figure class="col-md-4 mb-0">
                                        <a href="{{ url('product/' . $product->url_slug) }}"><img src="images/products/{{ $product->feature_img[0]->image_name }}"
                                                alt="" /></a>
                                    </figure>
                                    <div class="col-md-8 mb-0">
                                        <h6>
                                            <a href="shop-product-right.html">{{ $product->prod_name }}</a>
                                        </h6>
                                        <div class="product-rate-cover">
                                            <div class="product-rate d-inline-block">
                                                <div class="product-rating" style="width: 90%"></div>
                                            </div>
                                            <span class="font-small ml-5 text-muted"> (4.0)</span>
                                        </div>
                                        <div class="product-price">
                                            <span>??{{ $product->final_sel_price }}</span>
                                            <span class="old-price">??{{$product->reg_sel_price}}</span>
                                        </div>
                                    </div>
                                </article>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--End 4 columns-->

    <!-- Shop by Categories Start -->
    <section class="popular-categories section-padding">
        <div class="container">
            <div class="section-title">
                <div class="title">
                    <h3>Shop by Categories</h3>
                    <a class="show-all" href="#">
                        All Categories
                        <i class="fi-rs-angle-right"></i>
                    </a>
                </div>
                <div class="slider-arrow slider-arrow-2 flex-right carausel-8-columns-arrow"
                    id="carausel-8-columns-arrows"></div>
            </div>
            <div class="carausel-8-columns-cover position-relative">
                <div class="carausel-8-columns" id="carausel-8-columns">
                    @foreach($categories as $key => $category)
                        @if($category->category_level == 3)
                            <div class="card-1" style="height: 200px;">
                                <figure class="img-hover-scale overflow-hidden" style="border-radius: 50%;">
                                    <a href="{{ url('category/' . $category->url_slug) }}"><img src="images/categories/{{ $category->home_banner_img }}"
                                            alt="" /></a>
                                </figure>
                                <h6 style="font-size: 12px !important;">
                                    <a href="{{ url('category/' . $category->url_slug) }}">{{$category->name}}</a>
                                </h6>
                            </div>
                        @endif
                    @endforeach

                </div>
            </div>
        </div>
    </section>
    <!-- Shop By Categories End -->

      <!-- Shop by brand Start -->

    <section class="popular-categories section-padding">
        <div class="container">
            <div class="section-title">
                <div class="title">
                    <h3>Shop by Brands</h3>
                </div>
            </div>
            <div class="shop_detail">
                <div class="scrollmenu">
                     <ul class="shop_list" style="display: flex;">
                        @foreach($brands as $key => $brand)
                            <li>
                              <i class="fa fa-pagelines"></i>
                              <a href="{{ url('brand/' . $brand->url_slug) }}" style="color: #fff;">{{$brand->name}}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>   
            </div>      
        </div>
    </section>

      <!-- Shop by brand end -->

    <!--End category slider-->
    <section class="newsletter mb-15">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="position-relative newsletter-inner">
                            <div class="newsletter-content">
                                <h2 class="mb-20">
                                    Stay home & get your daily <br />
                                    needs from our shop
                                </h2>
                                <p class="mb-45">Start You'r Daily Shopping with <span class="text-brand">Nest
                                        Mart</span></p>
                                <form class="form-subcriber d-flex">
                                    <input type="email" placeholder="Your emaill address" />
                                    <button class="btn" type="submit">Subscribe</button>
                                </form>
                            </div>
                            <img src="{{ asset('imgs/banner/banner-9.png') }}" alt="newsletter" />
                        </div>
                    </div>
                </div>
            </div>
    </section>
    <section class="featured section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-lg-1-3 col-md-3 col-12 col-sm-6 mb-md-4 mb-xl-0">
                        <div class="banner-left-icon d-flex align-items-center wow fadeIn animated">
                            <div class="banner-icon">
                                <img src="{{ url('frontend/assets/imgs/theme/car.png') }}" alt="" />
                            </div>
                            <div class="banner-text">
                                <h3 class="icon-box-title">Free UK Delivery</h3>

                                <p style="font-size: 13px;">FREE UK Shipping On All Orders. No Minimum Cart Value.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-1-3 col-md-3 col-12 col-sm-6">
                        <div class="banner-left-icon d-flex align-items-center wow fadeIn animated">
                            <div class="banner-icon">
                                <img src="{{ url('frontend/assets/imgs/theme/cart.png') }}" alt="" />
                            </div>
                            <div class="banner-text">
                                <h3 class="icon-box-title">Repeat Same Order</h3>
                                <p style="font-size: 13px;">Skip the Search &amp; Repeat Same Order From Your User Dashboard.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-1-3 col-md-3 col-12 col-sm-6">
                        <div class="banner-left-icon d-flex align-items-center wow fadeIn animated">
                            <div class="banner-icon">
                                <img src="{{ url('frontend/assets/imgs/theme/next_day_car.png') }}" alt="" />
                            </div>
                            <div class="banner-text">
                                <h3 class="icon-box-title">Same Day Free Delivery in UK</h3>
                                <p style="font-size: 13px;">Order Before 2 PM For Same Day/Next Day Shipping For in Stock Items.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-1-3 col-md-3 col-12 col-sm-6">
                        <div class="banner-left-icon d-flex align-items-center wow fadeIn animated">
                            <div class="banner-icon">
                                <img src="{{ url('frontend/assets/imgs/theme/bottles.png') }}" alt="" />
                            </div>
                            <div class="banner-text">
                                <h3 class="icon-box-title">Save Big With Multiple Packs</h3>
                                <p style="font-size: 13px;">Save Upto 50% OFF By Choosing Different Packs Available on Product Page.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
    <!-- End Free Delivery UK Section -->
    <section class="section-padding pb-5">
        <div class="container">
            <div class="section-title">
                <h3 class="">Blogs</h3>
                <!-- <a class="show-all" href="shop-grid-right.html">
                    All Deals
                    <i class="fi-rs-angle-right"></i>
                </a> -->
            </div>
            <div class="row">
                @foreach($blogs as $key => $blog)
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="product-cart-wrap style-2">
                        <div class="product-img-action-wrap">
                            <div class="product-img">
                                <a href="#">
                                    <img src="images/blogPosts/{{ $blog->feature_image }}" alt="" />                                 
                                </a>
                            </div>
                        </div>
                        <div class="product-content-wrap">
                            <div class="deals-content" style="height: 190px;">
                                <h2 style="overflow: hidden; text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 4; line-clamp: 4; -webkit-box-orient: vertical; height: 80px;"><a href="#">{{$blog->title}}</a></h2>
                                <div>
                                    <span class="font-small text-muted">Category: <a href="{{ url('single_category_blog/' . $blog->category) }}">{{$blog->blog_category->cat_name }}</a></span>
                                </div>
                                <div class="product-card-bottom" style="margin-top: 5px;">
                                    <div>
                                        <span class="font-small text-muted">By: <span style="color: #3BB77E;">Natural Juices Editor</span></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    <section class="section-padding pb-5">
        <div class="container">
            <div class="section-title">
                <h3 class="">Testimonials</h3>
                 <a class="show-all" href="#">
                    View All
                    <i class="fi-rs-angle-right"></i>
                </a>
            </div>
            <div class="row">
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="product-cart-wrap style-2">
                        <div class="product-content-wrap" style="margin-top: 0px;">
                            <div class="deals-content" style="height: 300px;">
                                <h2><a href="#">DIET ELEMENTS TO ENHANCE</a></h2>
                                <hr />
                                <p><i class="fa fa-quote-right bold-icon"></i> Lorem ipsum dolor sit, amet consectetur adipisicing elit. Laborum exercitationem porro praesentium, assumenda facilis excepturi iure repellat eius pariatur asperiores! <i class="fa fa-quote-right bold-icon"></i></p>
                                <div class="product-card-bottom" style="margin-top: 5px;">
                                    <div>
                                        <span class="font-small text-muted">By: <span style="color: #3BB77E;">Chris</span></span>
                                    </div>
                                </div>
                                <div class="product-rate-cover">
                                    <span class="mr-5">Rating: </span>
                                    <div class="product-rate d-inline-block">
                                        <div class="product-rating" style="width: 70%"></div>
                                    </div>
                                    <span class="font-small ml-5 text-muted"> (3.5)</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="product-cart-wrap style-2">
                        <div class="product-content-wrap" style="margin-top: 0px;">
                            <div class="deals-content" style="height: 300px;">
                                <h2><a href="#">DIET ELEMENTS TO ENHANCE</a></h2>
                                <hr />
                                <p><i class="fa fa-quote-right bold-icon"></i> Lorem ipsum dolor sit, amet consectetur adipisicing elit. Laborum exercitationem porro praesentium, assumenda facilis excepturi iure repellat eius pariatur asperiores! <i class="fa fa-quote-right bold-icon"></i></p>
                                <div class="product-card-bottom" style="margin-top: 5px;">
                                    <div>
                                        <span class="font-small text-muted">By: <span style="color: #3BB77E;">Chris</span></span>
                                    </div>
                                </div>
                                <div class="product-rate-cover">
                                    <span class="mr-5">Rating: </span>
                                    <div class="product-rate d-inline-block">
                                        <div class="product-rating" style="width: 70%"></div>
                                    </div>
                                    <span class="font-small ml-5 text-muted"> (3.5)</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="product-cart-wrap style-2">
                        <div class="product-content-wrap" style="margin-top: 0px;">
                            <div class="deals-content" style="height: 300px;">
                                <h2><a href="#">DIET ELEMENTS TO ENHANCE</a></h2>
                                <hr />
                                <p><i class="fa fa-quote-right bold-icon"></i> Lorem ipsum dolor sit, amet consectetur adipisicing elit. Laborum exercitationem porro praesentium, assumenda facilis excepturi iure repellat eius pariatur asperiores! <i class="fa fa-quote-right bold-icon"></i></p>
                                <div class="product-card-bottom" style="margin-top: 5px;">
                                    <div>
                                        <span class="font-small text-muted">By: <span style="color: #3BB77E;">Chris</span></span>
                                    </div>
                                </div>
                                <div class="product-rate-cover">
                                    <span class="mr-5">Rating: </span>
                                    <div class="product-rate d-inline-block">
                                        <div class="product-rating" style="width: 70%"></div>
                                    </div>
                                    <span class="font-small ml-5 text-muted"> (3.5)</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-4 col-md-6">
                    <div class="product-cart-wrap style-2">
                        <div class="product-content-wrap" style="margin-top: 0px;">
                            <div class="deals-content" style="height: 300px;">
                                <h2><a href="#">DIET ELEMENTS TO ENHANCE</a></h2>
                                <hr />
                                <p><i class="fa fa-quote-right bold-icon"></i> Lorem ipsum dolor sit, amet consectetur adipisicing elit. Laborum exercitationem porro praesentium, assumenda facilis excepturi iure repellat eius pariatur asperiores! <i class="fa fa-quote-right bold-icon"></i></p>
                                <div class="product-card-bottom" style="margin-top: 5px;">
                                    <div>
                                        <span class="font-small text-muted">By: <span style="color: #3BB77E;">Chris</span></span>
                                    </div>
                                </div>
                                <div class="product-rate-cover">
                                    <span class="mr-5">Rating: </span>
                                    <div class="product-rate d-inline-block">
                                        <div class="product-rating" style="width: 70%"></div>
                                    </div>
                                    <span class="font-small ml-5 text-muted"> (3.5)</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <script type="text/javascript">
        function filterByCat(id) {
            let route = "{{ route('filterByCategory') }}";
            let token = "{{ csrf_token()}}";

            $.ajax({
                url: route,
                type: 'POST',
                data: {
                    _token:token,
                    id: id
                },
                success: function(response) {
                    if(response == false){
                        swal("No Record Found!", "", "info");
                    }else{
                        $('#product_parent').html('');
                        $('#product_parent').html(response);
                    }
                    
                },
                error: function(xhr) {
                    //Do Something to handle error
                }
            });
        }

        function addToCart(id) {
            let route = "{{ route('add.to.cart') }}";
            let token = "{{ csrf_token()}}";

            $.ajax({
                url: route,
                type: 'GET',
                data: {
                    id: id
                },
                success: function(response) {
                    let res = $.parseJSON(response);
                    swal("Added To Cart!", "", "success");
                    $('#parent_head_cart').html('');
                    $('#parent_head_cart').html(res[0]);
                    $('#cart_head_count').text('');
                    $('#cart_head_count').text(res[1]);
                },
                error: function(xhr) {
                    console.log('error');
                }
            });
        }
    </script>
@endsection
