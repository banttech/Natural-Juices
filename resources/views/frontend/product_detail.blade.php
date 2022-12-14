@extends('layouts.frontend.app')
@section('content')
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
.hidden { display: block; }

.exzoom {
  box-sizing: border-box; }
  .exzoom * {
    box-sizing: border-box; }
  .exzoom .exzoom_img_box {
    background: #eee;
    position: relative; }
    .exzoom .exzoom_img_box .exzoom_main_img {
      display: block;
      width: 100%; }
    
  .exzoom .exzoom_preview {
    margin: 0;
    position: absolute;
    top: 0;
    overflow: hidden;
    z-index: 999;
    background-color: #fff;
    border: 1px solid #ddd;
    display: none; }
    .exzoom .exzoom_preview .exzoom_preview_img {
      position: relative;
      max-width: initial !important;
      max-height: initial !important;
      left: 0;
      top: 0; }
  .exzoom .exzoom_nav {
    margin-top: 10px;
    overflow: hidden;
    position: relative;
    left: 15px; }
    .exzoom .exzoom_nav .exzoom_nav_inner {
      position: absolute;
      left: 0;
      top: 0;
      margin: 0; }
      .exzoom .exzoom_nav .exzoom_nav_inner span {
        border: 1px solid #ddd;
        overflow: hidden;
        position: relative;
        float: left; }
        .exzoom .exzoom_nav .exzoom_nav_inner span.current {
          border: 1px solid #3BB77E ; }
        .exzoom .exzoom_nav .exzoom_nav_inner span img {
          max-width: 100%;
          max-height: 100%;
          position: relative; }
  .exzoom .exzoom_btn {
    position: relative;
    margin: 0; }
    .exzoom .exzoom_btn a {
      display: block;
      width: 15px;
      border: 1px solid #ddd;
      height: 60px;
      line-height: 60px;
      background: #eee;
      text-align: center;
      font-size: 18px;
      position: absolute;
      left: 0;
      top: -62px;
      text-decoration: none;
      color: #999; }
    .exzoom .exzoom_btn a:hover {
      background: #3BB77E ;
      color: #fff; }
    .exzoom .exzoom_btn a.exzoom_next_btn {
      left: auto;
      right: 0; }
  .exzoom .exzoom_zoom {
    position: absolute;
    left: 0;
    top: 0;
    display: none;
    z-index: 5;
    cursor: pointer; }
  @media screen and (max-width: 768px) {
    .exzoom .exzoom_zoom_outer {
      display: none; } }
  .exzoom .exzoom_img_ul_outer {
    border: 1px solid #ddd;
    position: absolute;
    overflow: hidden; }
    .exzoom .exzoom_img_ul_outer .exzoom_img_ul {
      padding: 0;
      margin: 0;
      overflow: hidden;
      position: absolute; }
      .exzoom .exzoom_img_ul_outer .exzoom_img_ul li {
        list-style: none;
        display: inline-block;
        text-align: center;
        float: left; }
        .exzoom .exzoom_img_ul_outer .exzoom_img_ul li img {
          width: 100%; }
          .slct-pks {
    font-size: 14px;
    font-weight: bold;
}
.pack h3 {
    margin: 8px 0;
}
.custom-select.size {
    width: 57%;
    border-radius: inherit;
    /*padding: 12px 0px;*/
    height: 46px;
    padding-left: 10px;
    padding-right: 20px;
    border-radius: 0;
    font-weight: normal;
    font-size: 1.4rem;
    color: #333;
    border: 2px solid #3BB77E !important;
    border-radius: 5px;
}
.custom-select.size {
    font-weight: normal;
    font-size: 1rem;
    color: #333;
}
.pack{margin-bottom: 15px}
.money_saving_pack{display: flex; justify-content: space-between; align-items: center;}
.money_saving_pack p{font-weight: bold;}
.text-bold{color: #000; font-weight: bold;}
.noni-juice-raberry{background: #EB4960; color: #fff; width: fit-content; padding: 5px 16px; border-radius: 7px;}
.detail-info .product-price{margin: 15px 0 15px 0;}



  </style>
	<main class="main">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="{{url('/')}}" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                    <span></span> <a href="{{ url('category/' .$product->category[0]->url_slug) }}">{{$product->category[0]->name}}</a> <span></span> {{$product->prod_name}}
                </div>
            </div>
        </div>
        <div class="container mb-30">
            <div class="row">
                <div class="col-xl-11 col-lg-12 m-auto">
                    <div class="row">
                        <div class="col-xl-9">
                            <div class="product-detail accordion-detail">
                                <div class="row mb-50 mt-30">
                                    <div class="col-md-5 col-sm-12 col-xs-12 mb-md-0 mb-sm-5">
                                        <div class="detail-gallery">
                                            <div class="exzoom hidden" id="exzoom">
                                            <div class="exzoom_img_box">
                                                <ul class='exzoom_img_ul'>
                                                    @foreach($product->feature_img as $key => $img)
                                                        <li><img src="{{url('/')}}/images/products/{{ $img->image_name }}"/></li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                            <div class="exzoom_nav"></div>
                                            <p class="exzoom_btn">
                                                <a href="javascript:void(0);" class="exzoom_prev_btn"> < </a>
                                                <a href="javascript:void(0);" class="exzoom_next_btn"> > </a>
                                            </p>
                                        </div>
                                        </div>
                                        <!-- End Gallery -->
                                    </div>
                                    <div class="col-md-7 col-sm-12 col-xs-12">
                                        <div class="detail-info pr-30 pl-30">
                                            <span class="stock-status out-stock"> ??{{$product->reg_sel_price - $product->final_sel_price}} OFF </span>
                                            <h2 class="title-detail">{{ $product->prod_name }}</h2>
                                            <div class="product-detail-rating">
                                                <div class="product-rate-cover text-end">
                                                    <div class="product-rate d-inline-block">
                                                        <div class="product-rating" style="width: 90%"></div>
                                                    </div>
                                                    <span class="font-small ml-5 text-muted"> (32 reviews)</span>
                                                </div>
                                            </div>
                                            <div class="clearfix product-price-cover">
                                                <div class="product-price primary-color float-left" id="prod-price-and-off-price">
                                                    <span class="current-price text-brand">??{{ $product->final_sel_price }}</span>
                                                    <span>
                                                    	<?php $percentOff = ($product->final_sel_price * 100) / $product->reg_sel_price ?>
                                                        <span class="save-price font-md color3 ml-15">{{ 100 - $percentOff }}% Off</span>
                                                        <span class="old-price font-md ml-15">??{{$product->reg_sel_price}}</span>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="mb-15">
                                                <h6 class="noni-juice-raberry">Noni Juice with Rasberry Falvour</h6>
                                            </div>
                                            <div class="short-desc mb-30">
                                                <?php  
                                                    $string = strip_tags($product->prod_description);
                                                    if (strlen($string) > 350) {
                                                        // truncate string
                                                        $stringCut = substr($string, 0, 350);
                                                        $endPoint = strrpos($stringCut, ' ');
                                                        $string = $endPoint? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
                                                        $string .= '... <a href="#Description-tab">Read More</a>';
                                                    }
                                                    echo $string;
                                                ?>
                                            </div>
                                            <div class="pack">
                                                <h3 class="slct-pks">Select Your Money Saving Multipack</h3>
                                                <span id="choose_pack_error_msg"></span>
                                                <div class="money_saving_pack">
                                                    <select name="pack_id" class="custom-select size" id="packdisplay" onchange="filterByProductPack(this.value);">
                                                        <option selected="true" disabled="disabled">Select</option>
                                                        @foreach($product->product_packs as $key => $product_pack)
                                                            <option value="{{$product_pack->id}}">{{$product_pack->pack_name}}</option>
                                                        @endforeach
                                                    </select>
                                                    <p><span id="prod_stock">{{ $product->prod_stock_unit }}</span><span class="text-brand"> In Stock</span></p>
                                                </div>
                                            </div>
                                            <div class="detail-extralink mb-20">
                                                <div class="detail-qty border radius">
                                                    <a href="#" class="qty-down"><i class="fi-rs-angle-small-down"></i></a>
                                                    <input type="text" name="quantity" class="qty-val" value="1" min="1" max="12">
                                                    <a href="#" class="qty-up"><i class="fi-rs-angle-small-up"></i></a>
                                                </div>
                                                <div class="product-extra-link2">
                                                    <button type="submit" class="button button-add-to-cart" onclick="addToCart({{$product->id}})"><i class="fi-rs-shopping-cart"></i>Add to cart</button>
                                                </div>
                                            </div>
                                            <div class="mb-20">
                                                <p>Ready to shop in <span class="text-bold">??22.99 </span>to <span class="text-bold">India </span>in <span class="text-bold">7-10 business days</span></p>
                                            </div>
                                            <div class="font-xs">
                                                <ul class="mr-50 float-start">
                                                    <li class="mb-5">Size: <span class="text-brand">500 mL per Bottle</span></li>
                                                    <li class="mb-5">MFG:<span class="text-brand"> Jun 4.2022</span></li>
                                                    <li>LIFE: <span class="text-brand">70 days</span></li>
                                                </ul>
                                                <ul class="float-start">
                                                    <li class="mb-5">SKU: <span class="text-brand">FWM15VKT</span></li>
                                                    <?php $tags =  explode(',', $product->seo_tags); ?>
                                                    <li class="mb-5">Tags:
                                                    	@foreach($tags as $key => $tag)
                                                    		<span class="text-brand">{{ $tag }}</span>@if($key < count($tags) - 1), @endif
                                                    	@endforeach 
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <!-- Detail Info -->
                                    </div>
                                </div>
                                <div class="product-info">
                                    <div class="tab-style3">
                                        <ul class="nav nav-tabs text-uppercase">
                                            <li class="nav-item">
                                                <a class="nav-link active" id="Description-tab" data-bs-toggle="tab" href="#Description">Description</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="Additional-info-tab" data-bs-toggle="tab" href="#Supplements-facts">Supplements Facts</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="Vendor-info-tab" data-bs-toggle="tab" href="#Manufacturer-info">Manufacturer Info</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="Reviews-tab" data-bs-toggle="tab" href="#Reviews">Reviews (3)</a>
                                            </li>
                                        </ul>
                                        <div class="tab-content shop_info_tab entry-main-content">
                                            <div class="tab-pane fade show active" id="Description">
                                                <div class="">
                                                    <?=$product->meta_description?>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="Supplements-facts">
                                                <table class="font-md">
                                                    <tbody>
                                                        <tr class="stand-up">
                                                            <th>Stand Up</th>
                                                            <td>
                                                                <p>35???L x 24???W x 37-45???H(front to back wheel)</p>
                                                            </td>
                                                        </tr>
                                                        <tr class="folded-wo-wheels">
                                                            <th>Folded (w/o wheels)</th>
                                                            <td>
                                                                <p>32.5???L x 18.5???W x 16.5???H</p>
                                                            </td>
                                                        </tr>
                                                        <tr class="folded-w-wheels">
                                                            <th>Folded (w/ wheels)</th>
                                                            <td>
                                                                <p>32.5???L x 24???W x 18.5???H</p>
                                                            </td>
                                                        </tr>
                                                        <tr class="door-pass-through">
                                                            <th>Door Pass Through</th>
                                                            <td>
                                                                <p>24</p>
                                                            </td>
                                                        </tr>
                                                        <tr class="frame">
                                                            <th>Frame</th>
                                                            <td>
                                                                <p>Aluminum</p>
                                                            </td>
                                                        </tr>
                                                        <tr class="weight-wo-wheels">
                                                            <th>Weight (w/o wheels)</th>
                                                            <td>
                                                                <p>20 LBS</p>
                                                            </td>
                                                        </tr>
                                                        <tr class="weight-capacity">
                                                            <th>Weight Capacity</th>
                                                            <td>
                                                                <p>60 LBS</p>
                                                            </td>
                                                        </tr>
                                                        <tr class="width">
                                                            <th>Width</th>
                                                            <td>
                                                                <p>24???</p>
                                                            </td>
                                                        </tr>
                                                        <tr class="handle-height-ground-to-handle">
                                                            <th>Handle height (ground to handle)</th>
                                                            <td>
                                                                <p>37-45???</p>
                                                            </td>
                                                        </tr>
                                                        <tr class="wheels">
                                                            <th>Wheels</th>
                                                            <td>
                                                                <p>12??? air / wide track slick tread</p>
                                                            </td>
                                                        </tr>
                                                        <tr class="seat-back-height">
                                                            <th>Seat back height</th>
                                                            <td>
                                                                <p>21.5???</p>
                                                            </td>
                                                        </tr>
                                                        <tr class="head-room-inside-canopy">
                                                            <th>Head room (inside canopy)</th>
                                                            <td>
                                                                <p>25???</p>
                                                            </td>
                                                        </tr>
                                                        <tr class="pa_color">
                                                            <th>Color</th>
                                                            <td>
                                                                <p>Black, Blue, Red, White</p>
                                                            </td>
                                                        </tr>
                                                        <tr class="pa_size">
                                                            <th>Size</th>
                                                            <td>
                                                                <p>M, S</p>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="tab-pane fade" id="Manufacturer-info">
                                                <div class="vendor-logo d-flex mb-30">
                                                    <img src="assets/imgs/vendor/vendor-18.svg" alt="" />
                                                    <div class="vendor-name ml-15">
                                                        <h6>
                                                            <a href="vendor-details-2.html">Noodles Co.</a>
                                                        </h6>
                                                        <div class="product-rate-cover text-end">
                                                            <div class="product-rate d-inline-block">
                                                                <div class="product-rating" style="width: 90%"></div>
                                                            </div>
                                                            <span class="font-small ml-5 text-muted"> (32 reviews)</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <ul class="contact-infor mb-50">
                                                    <li><img src="assets/imgs/theme/icons/icon-location.svg" alt="" /><strong>Address: </strong> <span>5171 W Campbell Ave undefined Kent, Utah 53127 United States</span></li>
                                                    <li><img src="assets/imgs/theme/icons/icon-contact.svg" alt="" /><strong>Contact Seller:</strong><span>(+91) - 540-025-553</span></li>
                                                </ul>
                                                <div class="d-flex mb-55">
                                                    <div class="mr-30">
                                                        <p class="text-brand font-xs">Rating</p>
                                                        <h4 class="mb-0">92%</h4>
                                                    </div>
                                                    <div class="mr-30">
                                                        <p class="text-brand font-xs">Ship on time</p>
                                                        <h4 class="mb-0">100%</h4>
                                                    </div>
                                                    <div>
                                                        <p class="text-brand font-xs">Chat response</p>
                                                        <h4 class="mb-0">89%</h4>
                                                    </div>
                                                </div>
                                                <p>
                                                    Noodles & Company is an American fast-casual restaurant that offers international and American noodle dishes and pasta in addition to soups and salads. Noodles & Company was founded in 1995 by Aaron Kennedy and is headquartered in Broomfield, Colorado. The company went public in 2013 and recorded a $457 million revenue in 2017.In late 2018, there were 460 Noodles & Company locations across 29 states and Washington, D.C.
                                                </p>
                                            </div>
                                            <div class="tab-pane fade" id="Reviews">
                                                <!--Comments-->
                                                <div class="comments-area">
                                                    <div class="review_heading mb-40">
                                                        <h4 class="mb-10">Ratings & Reviews</h4>
                                                        <p>The views expressed below are the opinion of NaturalJuices.co.uk's customers. Natural Juices and Vitamins Ltd. does not endorse these views. nor should they be regarded as health claims or madical advice.</p>
                                                    </div>
                                                    <div class="review_btn">
                                                        <div class="text_review">Reviews</div>
                                                        <div class="btn_review"><button  type="button" data-bs-toggle="modal" data-bs-target="#myModal">Write a review</button></div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-8">
                                                            <h4 class="mb-30">Customer questions & answers</h4>
                                                            <div class="comment-list">
                                                                <div class="single-comment justify-content-between d-flex mb-30">
                                                                    <div class="user justify-content-between d-flex">
                                                                        <div class="thumb text-center">
                                                                            <img src="assets/imgs/blog/author-2.png" alt="" />
                                                                            <a href="#" class="font-heading text-brand">Sienna</a>
                                                                        </div>
                                                                        <div class="desc">
                                                                            <div class="d-flex justify-content-between mb-10">
                                                                                <div class="d-flex align-items-center">
                                                                                    <span class="font-xs text-muted">December 4, 2022 at 3:12 pm </span>
                                                                                </div>
                                                                                <div class="product-rate d-inline-block">
                                                                                    <div class="product-rating" style="width: 100%"></div>
                                                                                </div>
                                                                            </div>
                                                                            <h5>Title Area</h5>
                                                                            <p class="mb-10">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus, suscipit exercitationem accusantium obcaecati quos voluptate nesciunt facilis itaque modi commodi dignissimos sequi repudiandae minus ab deleniti totam officia id incidunt? <a href="#" class="reply">Reply</a></p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="single-comment justify-content-between d-flex mb-30 ml-30">
                                                                    <div class="user justify-content-between d-flex">
                                                                        <div class="thumb text-center">
                                                                            <img src="assets/imgs/blog/author-3.png" alt="" />
                                                                            <a href="#" class="font-heading text-brand">Brenna</a>
                                                                        </div>
                                                                        <div class="desc">
                                                                            <div class="d-flex justify-content-between mb-10">
                                                                                <div class="d-flex align-items-center">
                                                                                    <span class="font-xs text-muted">December 4, 2022 at 3:12 pm </span>
                                                                                </div>
                                                                                <div class="product-rate d-inline-block">
                                                                                    <div class="product-rating" style="width: 80%"></div>
                                                                                </div>
                                                                            </div>
                                                                            <p class="mb-10">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus, suscipit exercitationem accusantium obcaecati quos voluptate nesciunt facilis itaque modi commodi dignissimos sequi repudiandae minus ab deleniti totam officia id incidunt? <a href="#" class="reply">Reply</a></p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="single-comment justify-content-between d-flex">
                                                                    <div class="user justify-content-between d-flex">
                                                                        <div class="thumb text-center">
                                                                            <img src="assets/imgs/blog/author-4.png" alt="" />
                                                                            <a href="#" class="font-heading text-brand">Gemma</a>
                                                                        </div>
                                                                        <div class="desc">
                                                                            <div class="d-flex justify-content-between mb-10">
                                                                                <div class="d-flex align-items-center">
                                                                                    <span class="font-xs text-muted">December 4, 2022 at 3:12 pm </span>
                                                                                </div>
                                                                                <div class="product-rate d-inline-block">
                                                                                    <div class="product-rating" style="width: 80%"></div>
                                                                                </div>
                                                                            </div>
                                                                            <p class="mb-10">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus, suscipit exercitationem accusantium obcaecati quos voluptate nesciunt facilis itaque modi commodi dignissimos sequi repudiandae minus ab deleniti totam officia id incidunt? <a href="#" class="reply">Reply</a></p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <h4 class="mb-30">Customer reviews</h4>
                                                            <div class="d-flex mb-30">
                                                                <div class="product-rate d-inline-block mr-15">
                                                                    <div class="product-rating" style="width: 90%"></div>
                                                                </div>
                                                                <h6>4.8 out of 5</h6>
                                                            </div>
                                                            <div class="progress">
                                                                <span>5 star</span>
                                                                <div class="progress-bar" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">50%</div>
                                                            </div>
                                                            <div class="progress">
                                                                <span>4 star</span>
                                                                <div class="progress-bar" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
                                                            </div>
                                                            <div class="progress">
                                                                <span>3 star</span>
                                                                <div class="progress-bar" role="progressbar" style="width: 45%" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100">45%</div>
                                                            </div>
                                                            <div class="progress">
                                                                <span>2 star</span>
                                                                <div class="progress-bar" role="progressbar" style="width: 65%" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100">65%</div>
                                                            </div>
                                                            <div class="progress mb-30">
                                                                <span>1 star</span>
                                                                <div class="progress-bar" role="progressbar" style="width: 85%" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100">85%</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--comment form-->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-60">
                                    <div class="col-12">
                                        <h2 class="section-title style-1 mb-30">Suggested Products</h2>
                                    </div>
                                    <div class="col-12">
                                        <div class="row related-products">
                                            @foreach($relatedProducts as $key => $relatedProduct)
                                                @if($key < 4)
    	                                            <div class="col-lg-3 col-md-4 col-12 col-sm-6">
    	                                                <div class="product-cart-wrap hover-up">
    	                                                    <div class="product-img-action-wrap">
    	                                                        <div class="product-img product-img-zoom">
    	                                                            <a href="shop-product-right.html" tabindex="0">
    	                                                                <img class="default-img" src="{{url('/')}}/images/products/{{$relatedProduct->feature_img[0]->image_name}}" alt="" />
    	                                                            </a>
    	                                                        </div>
    	                                                        <div class="product-action-1">
    	                                                            <a aria-label="Quick view" class="action-btn small hover-up" href="{{ url('product/' . $relatedProduct->url_slug) }}"> <i class="fi-rs-eye"></i></a>
    	                                                        </div>
    	                                                        <div class="product-badges product-badges-position product-badges-mrg">
    	                                                            <span class="hot"> ??{{$relatedProduct->reg_sel_price - $relatedProduct->final_sel_price}} OFF</span>
    	                                                        </div>
    	                                                    </div>
                                                             <div class="mb-15" style="padding: 3px 15px;">
                                                                <h6 class="noni-juice-raberry">Noni Juice with Rasberry Falvour</h6>
                                                            </div>
    	                                                    <div class="product-content-wrap">
    	                                                        <h2><a href="shop-product-right.html" tabindex="0">{{ $relatedProduct->prod_name }}</a></h2>
    	                                                        <div class="rating-result" title="90%">
    	                                                            <span> </span>
    	                                                        </div>
    	                                                        <div class="product-price">
    	                                                            <span>??{{$relatedProduct->reg_sel_price}} </span>
    	                                                            <span class="old-price">??{{$relatedProduct->final_sel_price}}</span>
    	                                                        </div>
    	                                                    </div>
    	                                                </div>
    	                                            </div>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 primary-sidebar sticky-sidebar mt-30">
                            <!-- Product sidebar Widget -->
                            <div class="sidebar-widget product-sidebar mb-30 p-30 bg-grey border-radius-10">
                                <h5 class="section-title style-1 mb-30">Customers Also Like</h5>
                                @foreach($relatedProducts as $key => $relatedProduct)
                                    @if($key < 3)
                                        <div class="single-post clearfix">
                                            <div class="image">
                                                <img src="{{url('/')}}/images/products/{{$product->feature_img[0]->image_name}}" alt="#" />
                                            </div>
                                            <div class="content pt-10">
                                                <h5><a href="shop-product-detail.html">{{ $product->prod_name }}</a></h5>
                                                <p class="price mb-0 mt-5">??{{ $product->final_sel_price }}</p>
                                                <div class="product-rate">
                                                    <div class="product-rating" style="width: 90%"></div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
        </div>
    </main>


    <div class="modal" id="myModal">
    <div class="modal-dialog">
    <div class="modal-content">
      <!-- Modal Header -->
     <!--  <div class="modal-header">
        <h4 class="modal-title">Modal Heading</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div> -->
    <div class="container">
        <div class="main_display">
                   <div class="product_img" style="width: 30%;margin: 10px;">
                <img src="http://banttechenergies.com/images/products/16650531740.jpg">
                <h6 style="font-size: 18px;text-align: center;padding-top: 8px;">Naturaljuices LoveNoni Organic Certified 100% Pure Noni Juice</h6>
              </div> 
            <div class="product_detail" style="width: 70%;margin: 10px;border: 2px solid #3BB77E;padding: 10px;">
                <div class="main_heading" style="display:flex;">
                <h6 style="color:#3BB77E ;font-size: 18px;">My Review for Naturaljuices LoveNoni Organic Certified 100% Pure Noni Juice</h6>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <section class='rating-widget'>
                    <!-- Rating Stars Box -->
                    <div class='rating-stars'>
                      <ul id='stars'>
                        <li class='star' title='Poor' data-value='1'>
                          <i class='fa fa-star fa-fw'></i>
                        </li>
                        <li class='star' title='Fair' data-value='2'>
                          <i class='fa fa-star fa-fw'></i>
                        </li>
                        <li class='star' title='Good' data-value='3'>
                          <i class='fa fa-star fa-fw'></i>
                        </li>
                        <li class='star' title='Excellent' data-value='4'>
                          <i class='fa fa-star fa-fw'></i>
                        </li>
                        <li class='star' title='WOW!!!' data-value='5'>
                          <i class='fa fa-star fa-fw'></i>
                        </li>
                      </ul>
                    </div>
                    <h6 style="padding-top: 8px;">(Auto selected based on following rating)</h6>
                    </section>
                    
                <div class="form-group col-md-12">
                    <h6 style="padding-top: 20px;font-size: 18px;color:#3BB77E; margin-bottom: 6px;">Review Title*</span></h6>
                    <input class="form-control" name="fname" type="text" placeholder="Review Title" />
                </div>
                <div class="form-group col-md-12">
                    <h6 style="padding-top: 20px;font-size: 18px;color:#3BB77E; margin-bottom: 6px;">Review Description*</h6>
                    <input class="form-control" name="fname" type="text" placeholder="Review Description" />
                </div>
                 <div class="card title_box" style="height: 100px;background:#3BB77E ;">
                    <div style="display: flex;padding-top: 32px;">
                          <div class="product_detail" style="width:20%">
                            <p style="color: #fff;">Product</p> 
                          </div>
                           <div class="product_rating" style="width:80%;padding-left: 100px;">
                                <!-- Rating Stars Box -->
                                <div class='rating-stars'>
                                  <ul id='stars'>
                                    <li class='star' title='Poor' data-value='1'>
                                      <i class='fa fa-star fa-fw'></i>
                                    </li>
                                    <li class='star' title='Fair' data-value='2'>
                                      <i class='fa fa-star fa-fw'></i>
                                    </li>
                                    <li class='star' title='Good' data-value='3'>
                                      <i class='fa fa-star fa-fw'></i>
                                    </li>
                                    <li class='star' title='Excellent' data-value='4'>
                                      <i class='fa fa-star fa-fw'></i>
                                    </li>
                                    <li class='star' title='WOW!!!' data-value='5'>
                                      <i class='fa fa-star fa-fw'></i>
                                    </li>
                                  </ul>
                                </div> 
                           </div>
                    </div>
                 </div>
                 <div class="card title_box" style="height: 100px;background:#3BB77E ;">
                         <div style="display: flex;padding-top: 32px;">
                          <div class="product_detail" style="width:20%">
                            <p style="color: #fff;">Quality</p> 
                          </div>
                           <div class="product_rating" style="width:80%;padding-left: 100px;">
                                <!-- Rating Stars Box -->
                                <div class='rating-stars'>
                                  <ul id='stars'>
                                    <li class='star' title='Poor' data-value='1'>
                                      <i class='fa fa-star fa-fw'></i>
                                    </li>
                                    <li class='star' title='Fair' data-value='2'>
                                      <i class='fa fa-star fa-fw'></i>
                                    </li>
                                    <li class='star' title='Good' data-value='3'>
                                      <i class='fa fa-star fa-fw'></i>
                                    </li>
                                    <li class='star' title='Excellent' data-value='4'>
                                      <i class='fa fa-star fa-fw'></i>
                                    </li>
                                    <li class='star' title='WOW!!!' data-value='5'>
                                      <i class='fa fa-star fa-fw'></i>
                                    </li>
                                  </ul>
                                </div> 
                           </div>
                    </div> 
                </div>
                 <div class="card title_box" style="height: 100px;background:#3BB77E ;">
                         <div style="display: flex;padding-top: 32px;">
                          <div class="product_detail" style="width:20%">
                            <p style="color: #fff;">Value</p> 
                          </div>
                           <div class="product_rating" style="width:80%;padding-left: 100px;">
                                <!-- Rating Stars Box -->
                                <div class='rating-stars'>
                                  <ul id='stars'>
                                    <li class='star' title='Poor' data-value='1'>
                                      <i class='fa fa-star fa-fw'></i>
                                    </li>
                                    <li class='star' title='Fair' data-value='2'>
                                      <i class='fa fa-star fa-fw'></i>
                                    </li>
                                    <li class='star' title='Good' data-value='3'>
                                      <i class='fa fa-star fa-fw'></i>
                                    </li>
                                    <li class='star' title='Excellent' data-value='4'>
                                      <i class='fa fa-star fa-fw'></i>
                                    </li>
                                    <li class='star' title='WOW!!!' data-value='5'>
                                      <i class='fa fa-star fa-fw'></i>
                                    </li>
                                  </ul>
                                </div> 
                           </div>
                    </div>
                </div>
                <div style="display:flex;justify-content: space-between;">
                    <div class="review_submit">
                     <button>Submit Review</button>
                    </div>
                    <div class="review_close">
                     <button>Close</button>
                    </div>
                </div>
              </div>
                </div>
            </div>
        </div>
    </div>


<script type="text/javascript">
    function addToCart(id) {
        let route = "{{ route('add.to.cart') }}";
        let token = "{{ csrf_token()}}";
        let packId = $('#packdisplay').val() == null ? 0 : $('#packdisplay').val();

        $.ajax({
            url: route,
            type: 'GET',
            data: {
                id: id,
                packId: packId,
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

    function filterByProductPack(id) {
        let route = "{{ route('filter.by.product.pack') }}";
        let token = "{{ csrf_token()}}";

        $.ajax({
            url: route,
            type: 'GET',
            data: {
                _token:token,
                id: id
            },
            success: function(response) {
                let res = $.parseJSON(response);
                $('#prod-price-and-off-price').html('');
                $('#prod-price-and-off-price').html(res[0]);
                $('#prod_stock').text('');
                $('#prod_stock').text(res[1]);
            },
            error: function(xhr) {
                console.log('Some Error Occured!')
            }
        });
    }

    $(document).ready(function(){
  
      /* 1. Visualizing things on Hover - See next part for action on click */
      $('#stars li').on('mouseover', function(){
        var onStar = parseInt($(this).data('value'), 10); // The star currently mouse on
       
        // Now highlight all the stars that's not after the current hovered star
        $(this).parent().children('li.star').each(function(e){
          if (e < onStar) {
            $(this).addClass('hover');
          }
          else {
            $(this).removeClass('hover');
          }
        });
        
      }).on('mouseout', function(){
        $(this).parent().children('li.star').each(function(e){
          $(this).removeClass('hover');
        });
    });
  
    /* 2. Action to perform on click */
    $('#stars li').on('click', function(){
        var onStar = parseInt($(this).data('value'), 10); // The star currently selected
        var stars = $(this).parent().children('li.star');
        
        for (i = 0; i < stars.length; i++) {
          $(stars[i]).removeClass('selected');
        }
        
        for (i = 0; i < onStar; i++) {
          $(stars[i]).addClass('selected');
        }
        
        // JUST RESPONSE (Not needed)
        var ratingValue = parseInt($('#stars li.selected').last().data('value'), 10);
        var msg = "";
        if (ratingValue > 1) {
            msg = "Thanks! You rated this " + ratingValue + " stars.";
        }
        else {
            msg = "We will improve ourselves. You rated this " + ratingValue + " stars.";
        }
        responseMessage(msg);
        
      });
    });
</script>
@endsection