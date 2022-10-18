@foreach($products as $key => $product)
                            <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                                <div class="product-cart-wrap mb-30">
                                    <div class="product-img-action-wrap">
                                        <div class="product-img product-img-zoom">
                                            <a href="shop-product-right.html">
                                                <img src="images/products/{{ $product->feature_img[0]->image_name }}" class="img-sm img-thumbnail" alt=""  />
                                                <!-- <img class="hover-img" src="{{ asset('imgs/shop/product-2-2.jpg') }}"
                                                    alt="" /> -->
                                            </a>
                                        </div>
                                        <div class="product-action-1">
                                            <a class="action-btn" href="{{ url('product/' . $product->id) }}"><i class="fi-rs-eye"></i></a>
                                        </div>
                                        <div class="product-badges product-badges-position product-badges-mrg">
                                            <span class="sale">${{$product->reg_sel_price - $product->final_sel_price}} OFF</span>
                                        </div>
                                    </div>
                                    <div class="product-content-wrap">
                                        <div class="product-category">
                                            <a href="shop-grid-right.html">{{$product->category[0]->name}}</a>
                                        </div>
                                        <h2><a href="shop-product-right.html">{{ $product->prod_name }}</a></h2>
                                        <div class="product-rate-cover">
                                            <div class="product-rate d-inline-block">
                                                <div class="product-rating" style="width: 80%"></div>
                                            </div>
                                            <span class="font-small ml-5 text-muted"> (3.5)</span>
                                        </div>
                                        <div>
                                            <span class="font-small text-muted">By <a
                                                    href="vendor-details-1.html">Stouffer</a></span>
                                        </div>
                                        <div class="product-card-bottom">
                                            <div class="product-price">
                                                <span>${{ $product->final_sel_price }}</span>
                                                <span class="old-price">${{$product->reg_sel_price}}<span>
                                            </div>
                                            <div class="add-cart" onclick="addToCart({{$product->id}})">
                                                <a class="add"><i
                                                        class="fi-rs-shopping-cart mr-5"></i>Add </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach