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
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</head>
<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/6349247b54f06e12d89a23cb/1gfard0p5';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->
<style>
.cookie-container {
    display: flex;
    align-content: center;
    align-items: center;
    padding: 1rem 2rem;
    background: #dedede;
    color: rgba(0, 0, 0, 0.6);
    position: fixed;
    bottom: 0;
    font-size: 1rem;
    gap: 2rem;
    opacity: 1;
    visibility: visible;
    flex-wrap: wrap;
    z-index: 999;
}

.cookie-container.hide {
    opacity: 0;
    visibility: hidden;
}



.cookie-container .cookie-text {
    flex: 8 768px;
}

.cookie-container .agree {
    flex: 1 350px;
    text-align: center;
    display: flex;
}

.agree button {
    width: 150px;
    height: 40px;
    margin-left: 10px;
    display: flex;
    align-items: center;
    justify-content: center;
    border: solid 2px #3BB77E;
    border-radius: 50px;
    color: #fff;
    text-decoration: none;
    font-weight: bold;
    transition: all 0.2s;
    background-color: #3BB77E;
}

.agree button:hover {
    background: #fff;
        color: #3BB77E;
}
</style>

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
                        <div>
                            <img class="wow fadeIn animated" src="{{ asset('imgs/theme/paypal.png') }}"
                            alt="" style="width: 50px; height: 36px;" />
                            <img class="wow fadeIn animated" src="{{ asset('imgs/theme/visa.jpg') }}"
                            alt="" />
                            <img class="wow fadeIn animated" src="{{ asset('imgs/theme/pay4.jpg') }}"
                            alt="" />
                            <img class="wow fadeIn animated" src="{{ asset('imgs/theme/mastercard-logo.png') }}"
                            alt="" style="width: 50px; height: 58px;" />
                            <img class="wow fadeIn animated" src="{{ asset('imgs/theme/visa-debit-logo.png') }}"
                            alt="" style="width: 50px; height: 31px;" />
                        </div>

                        <div class="d-flex" style="margin-top: 20px;">
                            <a href="#">
                                <img class="wow fadeIn animated" src="{{ asset('imgs/theme/organic-food-federation.png') }}"
                                alt="" style="width: 85px; height: auto;" />
                                <p>GB-ORG-04</p>
                            </a>
                            <a href="#" style="margin-left: 15px;">
                                <img class="wow fadeIn animated" src="{{ asset('imgs/theme/usda-organic-logo-min.png') }}"
                                alt="" style="width: 85px; height: auto;" />
                                <p>GB-ORG-04</p>
                            </a>
                            <a href="#" style="margin-left: 15px;">
                                <img class="wow fadeIn animated" src="{{ asset('imgs/theme/soil-association-organic-symbol-min.png') }}"
                                alt="" style="width: 85px; height: auto;" />
                                <p>GB-ORG-04</p>
                            </a>
                        </div>
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
                    <p class="font-sm mb-0">Copyright © 2019 <strong class="text-brand">Natural Juices & Vitamins Ltd, Company Reg. No. 07539535 VAT No. 151772511</strong> All Rights Reserved.
                        <br /></p>
                        <strong style="font-size: 12px;">"We use cookies to give you the best possible experience on our site. By continuing to use the site you agree to our use of cookies. <a href="#">Find out more."</a></strong>
                </div>
                <div class="col-xl-4 col-lg-6 text-center d-none d-xl-block">
                    <div class="hotline d-lg-inline-flex mr-30">
                        <img src="{{ asset('imgs/theme/icons/phone-call.svg') }}" alt="hotline" />
                        <p style="font-size: 21px;">02072 - 052477<span>Working 8:00 - 22:00</span></p>
                    </div>
                    <div class="hotline d-lg-inline-flex">
                        <img src="{{ asset('imgs/theme/icons/phone-call.svg') }}" alt="hotline" />
                        <p style="font-size: 21px;">02088 - 941315<span>24/7 Support Center</span></p>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6 text-end d-none d-md-block">
                    <div class="mobile-social-icon">
                        <h6>Follow Us</h6>
                        <a href="https://www.facebook.com/NaturalJuicesUK" target="_blank"><img src="{{ asset('imgs/theme/icons/icon-facebook-white.svg') }}"
                                alt="" /></a>
                        <a href="https://twitter.com/naturaljuices" target="_blank"><img src="{{ asset('imgs/theme/icons/icon-twitter-white.svg') }}"
                                alt="" /></a>
                        <a href="https://www.linkedin.com/company/natural-juices-direct" target="_blank"><img src="{{ asset('imgs/theme/icons/icon-linkedin.svg') }}"
                                alt="" /></a>
                    </div>
                    <p class="font-sm">Up to 15% discount on your first subscribe</p>
                </div>
            </div>
        </div>
    </footer>
    <!-- End Footer -->

    <div class="text-section" style="margin: 0 150px; margin-top: 50px">
        <strong>Digestive well-being for entire family -</strong>
        We at Natural Juices UK, have the most remarkable line of quality liquid health supplements and vitamins. Our teams are working 24X7, completely dedicated to the pursuit of sourcing the natural juices that foster the digestive wellness of your body. These products are rich with the best vitamins, minerals and antioxidants.
        <br /><br />
        If you're in the market for the best
        <a href="#">Liquid Supplements</a>
        , you're at the right place. We help common people to achieve wholesome diet, without putting a big hole in your wallet. It works even if you have no understanding of nutritional supplements.
        <br /><br />
        Designed for daily use, our collection of natural juices will give you the best health you’ve ever had.
        <br /><br />
        <strong>Our philosophy - </strong>
         What goes into your body is important. Especially, when you receive only a 3rd of the nutritional requirements with a normal diet. That's far less than what our bodies actually need.
         <br /><br />
        As people age they face difficulty in eating and sometimes prefer easy diets which decreases their sources of good nutrition. In fact, bad nutrition habits could also lead to osteoporosis, high blood pressure, and heart diseases. Now, is it possible to change the whole diet? With most people it can be difficult to say the least!
        <br /><br />
        Usually, your body needs just a little kick-start. You need a way to supercharge your diet. As good health is a serious matter, you have to be on your toes and move fast.
        <br /><br />
        <strong>Is there a solution? - </strong>
         Enter the world of 
         <a href="#">Liquid Health Supplements</a>
         . Each sip of these natural juices is humming with life nutrients vital for your well-being. As they're in liquid form, nutrients can easily be absorbed by the body in as little as 20 minutes.
        <br /><br />
        <strong>But why liquid supplements?</strong>
        <br />
        Your digestive system needs a quick break from the processed & rich food we consume in everyday life. As a result of poor food choices over many years, the digestive functions become weak which means you need these 
        <b>natural liquid supplements</b>
         to "pre-digest” them for you. Scientifically, this is the best way to receive maximum benefits from your diet.
        <br /><br />
        <strong>It's pretty much essential - </strong>
        Modern environments slow down the natural self-purification mechanisms of your body. Liquid supplements help you remove accumulated toxins in the body to achieve a state of balance.They also help reduce the stress on the body through avoiding common toxins such as dairy, caffeine and alcohol.
        <br /><br />
        Now, health authorities recommend a daily goal of 6-8 servings of fruits and vegetables.The best part is, with the help of our products, you can reach that goal with ease and without pain!
        <br /><br />
        <strong>Our world-class <a href="#">Liquid Supplements</a></strong>
        <br />
        <ul style="list-style: disc; margin-left: 40px;">
            <li>contain a high amount of antioxidants. This helps to keep the body healthy and young, fighting against signs of aging while preventing diseases like cancer and diabetes.</li>
            <li>Helps you improve your daily diet and gain better bone health.</li>
            <li>Improve blood cholesterol levels, along with other heart-friendly benefits.</li>
        </ul>
        <br />
        <strong>You finally feel like treating your body well -</strong>
         How about feeling healthy, happy, and energized all the time. Finally, feel like you're doing something good for your body while defeating the problems like Obesity, Osteoporosis, Diabetes, and Constipation.
        <br /><br />
        <strong>Highest quality products -</strong>
         We have highly targeted solutions for all your specific needs. Consider this,
        <br /><br />
         If you're not new to the field of natural liquid health supplements, you must've heard about 
         <a href="#">Noni Juice</a>
         . It comes from a ripe 
         <a href="#">Noni fruit</a>
         . We offer 
         <a href="#">100% Pure Certified Organic Noni Juice</a>
         , which is an all-natural product that helps your body stay strong. It is available at just £13.99 per 500mL Bottle. And it gets better, you can choose different packs and get upto 50% OFF! That works out as low as £7.08 a bottle. A high quality product at that price. Once you start using it, the sheer quality of the product will amaze you.
        <br /><br />
        <strong>Highest repeat customer rate - </strong>
         The way we see it, credibility is important. We ensure that we get our supplements from a reputable source. That's where we score over the competitors. And it works. We love our customers and work hard to develop a strong bond with them. That's why we have a high number of repeat customers.
        <br /><br />
        Before we leave you to go through the website and find the product that suits your needs, you should know about our highest standards of customer service. With a high score of 70%, our repeat customer percentage/year figure speaks for itself.
        <br /><br />
        <strong>Okay, where should I start? -</strong>
         I think you're ready to dive into this liquid wonderland and we've made it easier for you. If you are looking to enhance your diet, simply:
         <ol style="list-style: auto; margin-left: 40px;">
            <li>Add one of the many chosen products to your cart.</li>

            <li>Enter your chosen date at checkout &amp; enjoy <b>FREE UK delivery</b>.</li>

            <li>In fact, we ship most orders the same day if you order before 2PM. Now that is super fast!</li>

            <li>Raise a bottle &amp; let's drink to your new health!</li>
        </ol>
        <strong>Don’t just take our word for it. Check out what people are saying about us :-</strong>
        <br /><br />
        "Love your Noni Juice..Did great wonders for me..Thanks."
        <br />
        "I was very happy with my purchase and I feel a lot better since I started drinking it I have a lot more energy"
        <br />
        "Excellent value for money product, efficient sales and super quick delivery with excellent updates on delivery progress."
        <br />
        "Whenever I need a product from your  company I know it will be delivered on time, it will be a good price and the item will be of good quality, I will order more in the future."
        <br />
        "Very satisfied. Goods delivered very quickly and exactly as described."
        <br /><br />
        <strong>Primary brands that we work with - </strong>
        <a href="#" title="Dynamic Health Products">Dynamic Health Laboratories</a>
        , a New York State Corporation established in 1994 (also licensed by the United States Department of Agriculture) is one of our proud partners. The products are Certified Kosher& Halal as well.
        <br /><br />
        They specialize in liquid dietary supplements. Best price and high quality are two traits that stand out in each product. Their global team scours the world to bring you the best products from the highest quality ingredients.Products that stand out are Organic Noni Juice, Women's Choice Noni Juice, Noni Juice Men’s Vitality Formula, Organic Aloe Vera Juice, Organic Goji Gold, Organic Mangosteen Gold, and Organic Acai Gold.
        <br /><br />
        With a healthy food-first policy,
        <a href="#" title="BetterYou Products">BetterYou</a> 
        is an innovative natural health company specialising in products that act as supplements for key nutrients lost through a tough lifestyle. BetterYou is well-known to produce the most researched products available within our market today.
        <br />
        <ul style="list-style: disc; margin-left: 40px;">
            <li><a href="#" title="BetterYou Boost B12 Vitamin Oral Spray">Boost B12 Vitamin Oral Spray</a> is an award winning formulation ideal for those with busy active schedules and frequent travellers that require a ‘Boost’ of energy throughout their day.</li>
            <li><a href="#" title="BetterYou Dlux 3000 Vitamin D Oral Spray">Dlux 3000 Vitamin D Oral Spray</a> is scientifically proven to deliver the vital vitamins straight into your bloodstream. This is another award winning spray by BetterYou that helps to supplement essential Vitamin D3 to sun starved citizen’s of the UK!</li>
        </ul>
        <a href="#" title="Renew Life Products">Renew Life</a>
        , another well-known respected brand used by Doctor’s and Health practioners all over the world that offers superior-quality digestive wellness supplements. These are natural supplements with no artificial ingredients, colours, or other preservatives.
        <br /><br />
        <a href="#" title="Renew Life Ultimate Flora Critical Care">Renew Life Ultimate Flora Critical Care</a>
         Probiotic is a high-potency formula for adults. It's an effective daily probiotic that supports overall digestive balance so you can feel much better and more energized. It contains active cultures from 10 different strains in a ‘once a day’ serving that helps ensure a healthy micro-bacterial environment in the intestinal tract.
        <br /><br />
        <a href="#" title="LifePlan Products">LifePlan</a>
         offers an extensive range of natural vitamins products that are carefully sourced and manufactured to maximise benefits to our customers. The company has its products range depending upon ingredients and health concerns. The product range covers almost all the essential vitamins, minerals and oils required for the human body.
         <br />
         They offer world class products like Wheatgrass Juice that helps
         <br />
        <ul style="list-style: disc; margin-left: 40px;">
            <li>to aid detoxification and weight loss.</li>
            <li>to support the digestive system.</li>
            <li>to boost the immune system to help prevent diseases including the common cold, fever &amp; cough.</li>
            <li>to improve the appearance of skin and prevent greying of hair.<br>
              <br>
            </li>
        </ul>
        <strong>FAQs</strong>
        <br /><br />
        <strong>How should I store these <a href="#" title="Liquid Supplements Category Page">Liquid Supplements</a>?</strong>
        <br /><br />
        <strong>Are there any adverse reaction/ side-effects?</strong>
        <br />
        The liquid supplements that we sell are safe, non-toxic and are generally well tolerated.  As with any food product, some people may experience allergic reactions. If you experience any adverse reaction, you should stop taking the supplement and consult a healthcare professional.
        <br /><br />
        <strong>Can I return a product?</strong>
        <br />
        Although, it has never happened, if for some reason, you're not happy with any product you purchase from us, simply return it and we will refund you in full. You do not need to give us any reason for cancelling your purchase.
        <br /><br />
        How do I contact customer service?
        <br />
        We love to hear from you and getting in touch is really easy. You can call us on 02072052477 | 02088941315  and for outside UK : +442088941315
        <br /><br />
        A world of nutrients and a healthy lifestyle is waiting for you. Get clicking!
    
    </div>

<div class="cookie-container hide">
    <p class="cookie-text">
        We use cookies and similar technologies that are necessary to operate the website. Additional cookies are used to perform analysis of website usage. By continuing to use our website, consent to our use of cookies. For more information, please read our <a href="#"> Privacy Policy.</a>
    </p>
    <div class="agree">
    <button>Accept Cookies</button>
    <button>Deny Cookies</button>
        </div>
</div>

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

<script >
const cookieContainer = document.querySelector(".cookie-container");
const agreeBtn = document.querySelector(".agree");

setTimeout(() => {
  cookieContainer.classList.remove("hide");
}, 1000);

agreeBtn.addEventListener("click", () => {
  cookieContainer.classList.add("hide");
});


</script>
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
