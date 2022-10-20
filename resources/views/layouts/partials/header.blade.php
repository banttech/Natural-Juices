@php
$categories = DB::table('categories')->where('parent_id', null)->get();
$brands = DB::table('brands')->get();
@endphp

<style>

</style>
<!-- <style>
.dropbtn {
  background-color: #3498DB;
  color: white;
  padding: 16px;
  font-size: 16px;
  border: none;
  cursor: pointer;
}

.dropbtn:hover, .dropbtn:focus {
  background-color: #2980B9;
}

.dropdown {
  position: relative;
  display: inline-block;
  width: 100%;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #fff;
  top: 50px;
  min-width: 100%;
  overflow: auto;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: flex;
  align-items: center;
}
.dropdown-content a img{width:60px;margin-right:5px}
.dropdown a:hover {background-color: #ddd;}

.show {display: block;}
</style>
<script>
/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
</script> -->
<!-- <style>
 .container{
width: 60px;
margin: 30px auto;
}
#singlebox{

width: 100%;
}

</style>

<script src="fm,selectator.jquery.js"></script>
<script>
$('#singlebox').selectator();
$('#multibox').selectator();
</script> -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <header class="header-area header-style-1 header-height-2">
        <div class="mobile-promotion">
            <span>Grand opening, <strong>up to 15%</strong> off all items. Only <strong>3 days</strong> left</span>
        </div>
        @if (!Auth::check())
            <div class="header-top header-top-ptb-1 d-none d-lg-block" style="background: #3BB77E; color: #fff;">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-12">
                            <div class="text-center">
                                <!-- <div id="news-flash" class="d-inline-block"> -->
                                    <ul style="display: flex; justify-content: space-around; align-items: center; font-weight: bold;">
                                        <li>Welcome to Natural Juices</li>
                                        <li><a href="{{ route('register') }}" style="color: #fff;">Register & Get 10% OFF</a></li>
                                    </ul>
                                <!-- </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        <div class="header-middle header-middle-ptb-1 d-none d-lg-block">
            <div class="container">
                <div class="header-wrap">
                    <div class="logo logo-width-1">
                        <a href="{{ url('/') }}"><img src="{{ asset('imgs/theme/logo.png') }}" alt="logo" /></a>
                    </div>
                    <div class="header-right">
                        <div class="search-style-2">
                            <form action="#">
                                <select class="select-active">
                                    <option value="all">All Categories</option>
                                    @foreach($categories as $key => $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                <select id="id_select2_example" style="width:100%;">
                                    <option value=""></option> 
                                    <option value="1" data-img_src="http://banttechenergies.com/images/products/16661633751.jpg" data-price="Rs 5600">Python programming</option> 
                                    <option value="2" data-img_src="http://banttechenergies.com/images/products/16650531741.jpg" data-price="Rs 5600">Java programming</option>
                                    <option value="3" data-img_src="http://banttechenergies.com/images/products/16661635641.jpg" data-price="Rs 5600">C programming</option>  
                                </select>

                               <!--  <select name="membership" id="membership" style="width: 100%;border: none;">
                                  <option value="free" selected>Search products here...</option>
                                  <option value="bronze"  style="background-image:url('http://banttechenergies.com/images/products/16661083920.jpg');">Product image</option>
                                  <option value="silver" >Product title </option>
                                  <option value="Gold">Product price</option>
                                </select>  -->
                                <!-- <div class="dropdown">
                                    <button onclick="myFunction()" class="dropbtn">Dropdown</button>
                                    <div id="myDropdown" class="dropdown-content">
                                        <a href="#home"><img src="http://banttechenergies.com/images/offers/16661624520.jpg">Home<span>rs 4000</span></a>
                                        <a href="#about">About</a>
                                        <a href="#contact">Contact</a>
                                    </div>
                                    </div> -->
                                 <!-- <input type="text" placeholder="Search products here..." />  -->
                            </form>
                        </div>
                        <div class="header-action-right">
                            <div class="header-action-2">
                                <div class="header-action-icon-2">
                                    <a class="mini-cart-icon" href="{{ url('/viewCart') }}">
                                        <img alt="Nest" src="{{ asset('imgs/theme/icons/icon-cart.svg') }}" />
                                        <span class="pro-count blue" id="cart_head_count">
                                            @if(session('cart'))
                                                {{ count(session('cart')) }}
                                                @else
                                                    {{0}}
                                            @endif
                                        </span>
                                    </a>
                                    <a href="{{ url('/viewCart') }}"><span class="lable">Cart</span></a>
                                    <div class="cart-dropdown-wrap cart-dropdown-hm2">
                                        <ul id="parent_head_cart">
                                             @if(session('cart'))
                                                @foreach(session('cart') as $id => $details)
                                                    <li>
                                                        <div class="shopping-cart-img">
                                                            <a href="shop-product-right.html"><img alt="Nest"
                                                                    src="{{ url('/') }}/images/products/{{$details['image']}}" /></a>
                                                        </div>
                                                        <div class="shopping-cart-title">
                                                            <h4><a href="#">{{ $details['name'] }}</a></h4>
                                                            <h4><span>{{$details['quantity']}} × </span>$800.00</h4>
                                                        </div>
                                                        <div class="shopping-cart-delete">
                                                            <a href="#"><i class="fi-rs-cross-small"></i></a>
                                                        </div>
                                                    </li>
                                                @endforeach
                                                @else
                                                    <li><div>Nothing in the cart</div></li>
                                            @endif
                                        </ul>
                                        @if(session('cart'))
                                            <div class="shopping-cart-footer">
                                                <div class="shopping-cart-total">
                                                    <!-- <h4>Total <span>$4000.00</span></h4> -->
                                                </div>
                                                <div class="shopping-cart-button">
                                                    <a href="shop-cart.html" class="outline">View cart</a>
                                                    <a href="shop-checkout.html">Checkout</a>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="header-action-icon-2">
                                    <a href="#">
                                        <img class="svgInject" alt="Nest"
                                            src="{{ asset('imgs/theme/icons/icon-user.svg') }}" />
                                    </a>
                                    <a href="#">
                                        @if (Auth::check())
                                            <span class="lable ml-0">Hi, <?php echo(Auth::user()->name); ?></span>
                                            @else
                                                <span class="lable ml-0">Account</span>
                                        @endif
                                    </a>
                                    <div class="cart-dropdown-wrap cart-dropdown-hm2 account-dropdown">
                                        <ul>
                                            
                                            @if (Auth::check())
                                                <li>
                                                    <a href="{{ route('myDashboard') }}"><i class="fi fi-rs-dashboard mr-10"></i>My Dashboard</a>
                                                </li>
                                                <li>
                                                    <a href="#"><i class="fi fi-rs-location-alt mr-10"></i>My Orders</a>
                                                </li>
                                                <li>
                                                    <a href="#"><i class="fi fi-rs-eye mr-10"></i>My Reviews</a>
                                                </li>
                                                <!-- <i class="fi fi-eye"></i> -->
                                                <li>
                                                    <a href="{{ url('/myProfile') }}"><i class="fi fi-rs-user mr-10"></i>My Profile</a>
                                                </li>
                                                <li>
                                                    <a href="{{ url('changePassword') }}"><i class="fi fi-rs-lock mr-10"></i>Change Password</a>
                                                </li>
                                                <li>
                                                    <a href="{{ url('/manageAddress') }}"><i class="fi fi-rs-home mr-10"></i>Manage Address</a>
                                                </li>
                                                <li>
                                                    <a href="{{ route('logout') }}"><i class="fi fi-rs-sign-out mr-10"></i>Logout</a>
                                                </li>
                                            @else
                                                <li><a href="{{ route('register') }}"><i class="fi fi-rs-sign-out mr-10"></i>Sign
                                                    up</a></li>
                                                <li><a href="{{ route('login') }}"><i class="fi fi-rs-sign-out mr-10"></i>Login</a></li>
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-bottom header-bottom-bg-color sticky-bar">
            <div class="container">
                <div class="header-wrap header-space-between position-relative">
                    <div class="logo logo-width-1 d-block d-lg-none">
                        <a href="index.html"><img src="{{ asset('imgs/theme/logo.svg') }}" alt="logo" /></a>
                    </div>
                    <div class="header-nav d-none d-lg-flex">
                        <div class="main-categori-wrap d-none d-lg-block">
                            <a class="categories-button-active" href="#">
                                <span class="fi-rs-apps"></span> <span class="et">Browse</span> All Brands
                                <i class="fi-rs-angle-down"></i>
                            </a>
                            <div class="categories-dropdown-wrap categories-dropdown-active-large font-heading">
                                <div class="d-flex categori-dropdown-inner">
                                    <ul style="display: flex; justify-content: center; align-items: center; width: 100%;">
                                        @foreach($brands as $key => $brand)
                                            <li>
                                                <a href="#"> 
                                                    <img src="{{ url('images/brands/' . $brand->home_logo) }}" alt="" />{{ $brand->name }}
                                                </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="main-menu main-menu-padding-1 main-menu-lh-2 d-none d-lg-block font-heading">
                            <nav>
                                <ul>
                                    <li class="hot-deals"><img src="{{ asset('imgs/theme/icons/icon-hot.svg') }}"
                                            alt="hot deals" /><a href="#">Deals</a></li>
                                    <li>
                                        <a href="#">LIQUID SUPPLEMENTS</a>
                                    </li>
                                    <li>
                                        <a href="#">CAPSULES</a>
                                    </li>
                                    <li>
                                        <a href="#">SPRAYS</a>
                                    </li>
                                    <li>
                                        <a href="#">MISCELLANEOUS</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                   <div class="hotline d-none d-lg-flex">
                        <img src="{{ asset('imgs/theme/icons/icon-headphone.svg') }}" alt="hotline" />
                        <nav class="d_d_contain" role="navigation">
                            <ul>
                                <li><a href="#" class="service_24">24/7 Help</a>
                                <ul class="dropdown" style="width: 46% !important;">
                                    <div class="main_dropdown">
                                        <div class="dropdown_left" style="width: 60%;">
                                            <div class="dropdown_inner_left">
                                                <div class="dropdown_list">
                                                    <li style="font-weight: bold;font-size: 16px;"><a style="">Contact Us</a><span class="header__right-arrow">→</span></li>
                                                    <li><i class="fa fa-commenting" aria-hidden="true"></i><a>Chat</a></li>
                                                    <li><i class="fa fa-envelope" aria-hidden="true"></i><a> Email </a></li>
                                                    <li><i class="fa fa-thumbs-up" aria-hidden="true"></i><a> Website Feedback </a></li>
                                                    <li style="font-weight:bold;font-size: 16px;padding-top: 10px;"><a> New Orders </a></li>
                                                    <li><i class="fa fa-phone" aria-hidden="true"></i><a>  0207-205-2477  </a></li>
                                                </div>
                                            </div>
                                            <div class="dropdown_inner_right">
                                                <div class="dropdown_list">
                                                    <li style="font-weight: bold;font-size: 16px;"><a>Helpful Links </a></li>
                                                    <li><a>Track Your Order </a></li>
                                                    <li><a> FAQs </a></li>
                                                </div>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="dropdown_right" style="width: 40%;">
                                            <div class="dropdown_inner">
                                                <div class="dropdwn_tag">EXPERT ADVICE</div>
                                                <div class="dropdwn_content">
                                                    <h5>Have a product question?</h5>
                                                    <h6>Connect with our natural product experts</h6>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </ul>
                                </li>
                            </ul>
                        </nav>
                        <!-- <p><span>24/7 Help</span></p> -->
                    </div>
                    <div class="header-action-icon-2 d-block d-lg-none">
                        <div class="burger-icon burger-icon-white">
                            <span class="burger-icon-top"></span>
                            <span class="burger-icon-mid"></span>
                            <span class="burger-icon-bottom"></span>
                        </div>
                    </div>
                    <div class="header-action-right d-block d-lg-none">
                        <div class="header-action-2">
                            <div class="header-action-icon-2">
                                <a href="shop-wishlist.html">
                                    <img alt="Nest" src="{{ asset('imgs/theme/icons/icon-heart.svg') }}" />
                                    <span class="pro-count white">4</span>
                                </a>
                            </div>
                            <div class="header-action-icon-2">
                                <a class="mini-cart-icon" href="shop-cart.html">
                                    <img alt="Nest" src="{{ asset('imgs/theme/icons/icon-cart.svg') }}" />
                                    <span class="pro-count white">2</span>
                                </a>
                                <div class="cart-dropdown-wrap cart-dropdown-hm2">
                                    <ul>
                                        <li>
                                            <div class="shopping-cart-img">
                                                <a href="shop-product-right.html"><img alt="Nest"
                                                        src="{{ asset('imgs/shop/thumbnail-3.jpg') }}" /></a>
                                            </div>
                                            <div class="shopping-cart-title">
                                                <h4><a href="shop-product-right.html">Plain Striola Shirts</a></h4>
                                                <h3><span>1 × </span>$800.00</h3>
                                            </div>
                                            <div class="shopping-cart-delete">
                                                <a href="#"><i class="fi-rs-cross-small"></i></a>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="shopping-cart-img">
                                                <a href="shop-product-right.html"><img alt="Nest"
                                                        src="{{ asset('imgs/shop/thumbnail-4.jpg') }}" /></a>
                                            </div>
                                            <div class="shopping-cart-title">
                                                <h4><a href="shop-product-right.html">Macbook Pro 2022</a></h4>
                                                <h3><span>1 × </span>$3500.00</h3>
                                            </div>
                                            <div class="shopping-cart-delete">
                                                <a href="#"><i class="fi-rs-cross-small"></i></a>
                                            </div>
                                        </li>
                                    </ul>
                                    <div class="shopping-cart-footer">
                                        <div class="shopping-cart-total">
                                            <h4>Total <span>$383.00</span></h4>
                                        </div>
                                        <div class="shopping-cart-button">
                                            <a href="shop-cart.html">View cart</a>
                                            <a href="shop-checkout.html">Checkout</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>