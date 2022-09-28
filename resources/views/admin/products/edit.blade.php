@extends('layouts.admin.app')
@section('content')
<link rel="stylesheet" href="{{ url('/admin-assets/assets/css/multiStepsFormstyle.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<section class="content-main">
    <div class="content-header">
        <div>
            <h3 class="card-title">Edit Product</h3>
        </div>
    </div>
    <div class="card mb-4 formContainer">
        <div class="progress-bar">
            <div class="step">
                <p>General Information</p>
                <div class="bullet">
                    <span>1</span>
                </div>
                <div class="check fas fa-check"></div>
            </div>
            <div class="step">
                <p>Product Packs</p>
                <div class="bullet">
                    <span>2</span>
                </div>
                <div class="check fas fa-check"></div>
            </div>
            <div class="step">
                <p>Features</p>
                <div class="bullet">
                    <span>3</span>
                </div>
                <div class="check fas fa-check"></div>
            </div>
            <div class="step">
                <p>SEO</p>
                <div class="bullet">
                    <span>4</span>
                </div>
                <div class="check fas fa-check"></div>
            </div>
        </div>

        <div class="form-outer">
            <form method="POST" action="{{ url('updateProduct/' . $product->id) }}" enctype="multipart/form-data">
                @csrf
                <!-- Product Detail Section Start -->
                <div class="page slide-page col-md-8">
                    <div class="row mb-3">
                        <div class="col-md-8">
                            <label for="name" class="form-label">Product Name<span class="text-danger" style="font-size: 17px;">*</span></label>
                            <input type="text" value="{{ $product->prod_name }}" name="prod_name" placeholder="Product Name" class="form-control" />
                            @if ($errors->has('prod_name'))
                            <span class="text-danger text-left">{{ $errors->first('prod_name') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="mb-3">
                            <label class="form-label">Product Status (Active / Inactive)</label>
                            <br>
                            &nbsp;&nbsp;<input type="checkbox" @if($product->prod_status == 'active')) checked @endif name="prod_status">
                        </div>
                    </div>
                    <div class="col-md-8">
                        @php $image_count = 0; @endphp
                        
                        <div class="mb-3">
                            <div>
                                <label class="form-label">Product Images</label>             
                            </div>
                            <div id="image_parent_div">
                            @foreach($product_images as $key => $p_image)
                                <div class="form-check mb-3">
                                    <input class="form-check-input" type="radio" name="prod_img_checkbox" value="{{$key}}" @if($key == $p_image->is_featured) checked @endif />
                                    <input class="form-control" type="file" name="prod_images[]">
                                    <input type="hidden" name="prod_images[]" value="{{ $p_image->image_name }}">
                                    <br>
                                    @if(isset($p_image->image_name) && $p_image->image_name != "")
                                        <img src="{{ url('/images/products/'.$p_image->image_name) }}" style="width: 250px !important">
                                    @endif
                                </div>
                            @php $image_count++; @endphp
                            @endforeach
                            </div>
                            
                        </div>
                        
                        <span class="btn btn-sm font-sm btn-brand mb-3" id="add_more_image_btn">Add More</span>
                    </div>
                    
                    <div class="col-md-8">
                        <div class="mb-3">
                            <label class="form-label">Choose Category <span class="text-danger" style="font-size: 17px;">*</span></label>
                            <select class="form-select" name="prod_category" value="{{ $product->prod_category }}">
                                <option value="">Select Category</option>
                                @foreach($categories as $category)
                                <option value="{{ $category->id }}" @if($category->id == $product->prod_category) selected @endif>{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="mb-3">
                            <label class="form-label">Choose Brand <span class="text-danger" style="font-size: 17px;">*</span></label>
                            <select class="form-select" name="prod_brand" value="{{ $product->prod_brand }}">
                                <option value="">Select Brand</option>
                                @foreach($brands as $brand)
                                <option value="{{ $brand->id }}" @if($brand->id == $product->prod_brand) selected @endif>{{ $brand->name }}</option>
                                @endforeach
                                @if ($errors->has('prod_brand'))
                                <span class="text-danger text-left">{{ $errors->first('prod_brand') }}</span>
                                @endif
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-8">
                            <label for="reg_sel_price" class="form-label">Regular Selling Price<span class="text-danger" style="font-size: 17px;">*</span></label>
                            <input type="number" value="{{ $product->reg_sel_price }}" name="reg_sel_price" placeholder="Regular Selling Price" class="form-control" />
                            @if ($errors->has('reg_sel_price'))
                            <span class="text-danger text-left">{{ $errors->first('reg_sel_price') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-8">
                            <label for="product_discount" class="form-label">Discount</label>
                            <input type="number" value="{{ $product->prod_discount }}" name="prod_discount" placeholder="Discount" class="form-control" />
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="mb-3">
                            <label class="form-label">Discount Type</label>
                            <select class="form-select" name="prod_discount_type" value="{{ $product->prod_discount_type }}">
                                <option value="">Select Discount Type</option>
                                <option value="p" @if($product->prod_discount_type == 'p') selected @endif>Percent(%)</option>
                                <option value="f" @if($product->prod_discount_type == 'f') selected @endif>Flat(£)</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-8">
                            <label for="name" class="form-label">Final Selling Price<span class="text-danger" style="font-size: 17px;">*</span></label>
                            <input type="number" value="{{ $product->final_sel_price }}" name="final_sel_price" placeholder="Final Selling Price" class="form-control" />
                            @if ($errors->has('final_sel_price'))
                            <span class="text-danger text-left">{{ $errors->first('final_sel_price') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-8">
                            <label for="name" class="form-label">Weight</label>
                            <input type="number" value="{{ $product->prod_weight }}" name="prod_weight" placeholder="Weight" class="form-control" />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-8">
                            <label for="name" class="form-label">Manual Discount</label>
                            <input type="number" value="{{ $product->prod_manual_discount }}" name="prod_manual_discount" placeholder="Manual Discount" class="form-control" />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-8">
                            <label for="name" class="form-label">Stock Unit</label>
                            <input type="number" value="{{ $product->prod_stock_unit }}" name="prod_stock_unit" placeholder="Stock Unit" class="form-control" />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-8">
                            <label for="name" class="form-label">Subscription Discount</label>
                            <input type="number" value="{{ $product->prod_subsciption_discount }}" name="prod_subsciption_discount" placeholder="Subscription Discount" class="form-control" />
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="mb-3">
                            <label class="form-label">Subscription Discount Type</label>
                            <select class="form-select" name="prod_subscription_discount_type" value="{{ $product->prod_subscription_discount_type }}">
                                <option value="">Select Discount Type</option>
                                <option value="p" @if($product->prod_discount_type == 'p') selected @endif>Percent(%)</option>
                                <option value="f" @if($product->prod_discount_type == 'f') selected @endif>Flat(£)</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-8">
                            <label for="name" class="form-label">Subscription Final Selling Price<span class="text-danger" style="font-size: 17px;">*</span></label>
                            <input type="number" value="{{ $product->prod_subscription_final_sel_price }}" name="prod_subscription_final_sel_price" placeholder="Subscription Final Selling Price" class="form-control" />
                            @if ($errors->has('prod_subscription_final_sel_price'))
                            <span class="text-danger text-left">{{ $errors->first('prod_subscription_final_sel_price') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-8">
                            @php 
                            $faq_check = false;
                            @endphp
                            @if(isset($product_has_faq) && count($product_has_faq) > 0)
                            @php $faq_check = true; @endphp
                            @endif
                            <label for="name" class="form-label">Product FAQ<span class="text-danger" style="font-size: 17px;">*</span></label>
                            <br>
                            &nbsp;&nbsp;<input type="checkbox" class="prod_faq mb-3" name="prod_faq" onchange="addFaq()" @if($faq_check == true) checked="" @endif>
                            @if ($errors->has('prod_faq'))
                            <span class="text-danger text-left">{{ $errors->first('prod_faq') }}</span>
                            @endif
                            <br>
                            @php 
                            $faq_count = 0;
                            @endphp
                            @if(isset($product_has_faq) && count($product_has_faq) > 0)
                            <div id="faq_parent_div">

                            @foreach($product_has_faq as $key => $p_faq)
                                <div class="col-md-12 faq_section">
                                    <input type="question" name="faq[{{$faq_count}}][questions]" placeholder="Question" class="form-control" value="{{ $p_faq->question }}" />
                                    <br>
                                    <textarea name="faq[{{$faq_count}}][answers]" id="editor_{{$key}}" rows="4" cols="50">{{ $p_faq->answer }}</textarea>
                                    <br>
                                </div>
                           
                            @php 
                            $faq_count++;
                            @endphp
                            @endforeach
                             </div>
                            @else
                            <div id="faq_parent_div">
                                 <div class="col-md-12 faq_section">
                                    <input type="question" name="faq[{{$faq_count}}][questions]" placeholder="Question" class="form-control"/>
                                    <br>
                                    <textarea name="faq[{{$faq_count}}][answers]" id="editor" rows="4" cols="50"></textarea>
                                    <br>
                                </div>
                            </div>
                            @endif
                            <span class="btn btn-sm font-sm btn-brand" id="add_more_faq_btn">Add More</span>

                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-8">
                            <label for="name" class="form-label">Product Description<span class="text-danger" style="font-size: 17px;">*</span></label>
                            <textarea  name="prod_description" id="product-description-editor" rows="4" cols="50">{{ $product->prod_description }}</textarea>
                            @if ($errors->has('prod_description'))
                            <span class="text-danger text-left">{{ $errors->first('prod_description') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-8">
                            <label for="name" class="form-label">Supplements Facts</label>
                            <textarea  name="prod_supplements_facts" id="supplements-facts-editor" rows="4" cols="50">{{ $product->prod_supplements_facts }}</textarea>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-8">
                            <label for="name" class="form-label">Directions</label>
                            <textarea  name="prod_directions" id="directions-editor" rows="4" cols="50">{{ $product->prod_directions }}</textarea>
                            @if ($errors->has('prod_directions'))
                            <span class="text-danger text-left">{{ $errors->first('prod_directions') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-8">
                            <label for="name" class="form-label">Suitable For</label>
                            <textarea  name="prod_suitable_for" id="suitable-for-editor" rows="4" cols="50">{{ $product->prod_suitable_for }}</textarea>
                            @if ($errors->has('prod_suitable_for'))
                            <span class="text-danger text-left">{{ $errors->first('prod_suitable_for') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3">
                        <div class="col-md-8" style="text-align: right;">
                            <button class="btn btn-sm btn-primary firstNext next">Next</button>
                        </div>
                    </div>
                </div>
                <!-- Product Detail Section End -->


                <!-- Pack Detial Section Start -->
                <div class="page">
                    <div class="row mb-3">
                        <div class="col-md-8">
                            <label for="name" class="form-label">Pack Name</label>
                            <input type="text" value="{{ $product->pack_name }}" name="pack_name" placeholder="Pack Name" class="form-control" />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-8">
                            <label for="name" class="form-label">Manual Discount</label>
                            <input type="text" value="{{ $product->pack_manual_discount }}" name="pack_manual_discount" placeholder="Pack Name" class="form-control" />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-8">
                            <label for="name" class="form-label">Quantity</label>
                            <input type="number" value="{{ $product->ack_quantity }}" name="pack_quantity" placeholder="Quantity" class="form-control" />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-8">
                            <label for="name" class="form-label">Pack Selling Price</label>
                            <input type="number" value="{{ $product->pack_selling_price }}" name="pack_selling_price" placeholder="Pack Selling Price" class="form-control" />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-8">
                            <label for="name" class="form-label">Discount</label>
                            <input type="number" value="{{ $product->pack_discount }}" name="pack_discount" placeholder="Discount" class="form-control" />
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="col-md-8">
                            <label class="form-label">Discount Type</label>
                            <select class="form-select" name="pack_discount_type" value="{{ $product->pack_discount_type }}">
                                <option value="">Select Discount Type</option>
                                <option value="p" @if($product->prod_discount_type == 'p') selected @endif>Percent(%)</option>
                                <option value="f" @if($product->prod_discount_type == 'f') selected @endif>Flat(£)</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-8">
                            <label for="name" class="form-label">Final Selling price</label>
                            <input type="number" value="{{ $product->pack_final_sel_price }}" name="pack_final_sel_price" placeholder="Final Selling price" class="form-control" />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-8">
                            <label for="name" class="form-label">Subscription Discount</label>
                            <input type="number" value="{{ $product->pack_subscription_discount }}" name="pack_subscription_discount" placeholder="Subscription Discount" class="form-control" />
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="col-md-8">
                            <label class="form-label">Subscription Discount Type</label>
                            <select class="form-select" name="pack_subscription_discount_type" value="{{ old('pack_subscription_discount_type') }}">
                                <option value="p" @if($product->prod_discount_type == 'p') selected @endif>Percent(%)</option>
                                <option value="f" @if($product->prod_discount_type == 'f') selected @endif>Flat(£)</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-8">
                            <label for="name" class="form-label">Subscription Final Selling price</label>
                            <input type="number" value="{{ $product->pack_subscription_fin_sel_price }}" name="pack_subscription_fin_sel_price" placeholder="Subscription Final Selling price" class="form-control" />
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="mb-3">
                            <div>
                                <label class="form-label">Images</label>
                                <input class="form-control" type="file" name="pack_images" value="{{ $product->pack_images }}">
                            </div>
                            <br>
                             @if(isset($product->pack_images) && $product->pack_images != null)
                                <img src="{{ url('/images/products/'.$product->pack_images) }}" style="width: 250px !important">
                            @endif
                        </div>
                    </div>
                    {{-- <button class="btn btn-sm btn-primary mb-3">Add More</button> --}}
                    <div class="mb-3">
                        <div class="col-md-8" style="text-align: right;">
                            <button class="btn btn-light prev">Previous</button>
                            <button class="btn btn-sm btn-primary secondNext next">Next</button>
                        </div>
                    </div>
                </div>
                <!-- Pack Detial Section End -->


                <!-- Features Detial Section Start -->
                <div class="page">
                    <div class="col-md-8">
                        <div class="mb-3">
                            <label class="form-label">Product Features Status (Active / Inactive) <span class="text-danger" style="font-size: 17px;">*</span></label>
                            <br>
                            &nbsp;&nbsp;<input type="checkbox" class="product_features_status" onchange="valueChanged()"  name="product_features_status" @if($product->product_features_status === 'on')) checked @endif>   
                        </div>
                    </div>
                    <div class="col-md-8 features_list">
                        <div class="mb-3">
                            <br>
                            <div class="row mb-3">
                                <div class="">
                                    <label for="name" class="form-label">Product Features<span class="text-danger" style="font-size: 17px;">*</span></label>
                                    <select class="form-control" id="js-example-basic-single" name="features[]" multiple="multiple" placeholder = "Add Tags">
                                        @foreach($features as $feature)
                                        <option value="{{ $feature->id }}" @if(in_array($feature->id, $selected_features_ids)) selected @endif>{{ $feature->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            @if ($errors->has('features'))
                            <span class="text-danger text-left">{{ $errors->first('features') }}</span>
                            @endif

                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="col-md-8" style="text-align: right;">
                            <button class="btn btn-light prev">Previous</button>
                            <button class="btn btn-sm btn-primary secondNext next">Next</button>
                        </div>
                    </div>
                </div>
                <!-- Feature Detial Section End -->


                <!-- SEO Detial Section Start -->
                <div class="page">
                    <div class="row mb-3">
                        <div class="col-md-8">
                            <label for="name" class="form-label">Title<span class="text-danger" style="font-size: 17px;">*</span></label>
                            <input type="text" value="{{ $product->seo_title }}" name="seo_title" placeholder="Title" class="form-control" value="{{ old('seo_title') }}" />
                        </div>
                        @if ($errors->has('seo_title'))
                        <span class="text-danger text-left">{{ $errors->first('seo_title') }}</span>
                        @endif  
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-8">
                            <label for="seo_name" class="form-label">Url Slug<span class="text-danger" style="font-size: 17px;">*</span></label>
                            <input type="text" value="{{ $product->url_slug }}" name="url_slug" placeholder="Url Slug" class="form-control" value="{{ old('url_slug') }}" />
                        </div>
                        @if ($errors->has('url_slug'))
                        <span class="text-danger text-left">{{ $errors->first('url_slug') }}</span>
                        @endif  
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-8">
                            <label for="seo_tags" class="form-label">Tags</label>
                            <select class="form-control" id="seo-tags" name="seo_tags[]" multiple="multiple" placeholder = "Add Tags">
                                <option value=""></option>
                                <?php $tags = explode(',', $product->seo_tags); ?>
                                @foreach ($tags as $tag)
                                <option value="{{ $tag }}" selected>{{ $tag }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="mb-3">
                        <div class="col-md-8">
                            <label class="form-label">Meta Description<span class="text-danger" style="font-size: 17px;">*</span></label>
                            <textarea placeholder="Type here"  name="meta_description" id="seo-editor" rows="4" cols="50">{{ $product->meta_description }}</textarea>
                        </div>
                        @if ($errors->has('meta_description'))
                        <span class="text-danger text-left">{{ $errors->first('meta_description') }}</span>
                        @endif
                    </div>
                    <div class="mb-3">
                        <div class="col-md-8" style="text-align: right;">
                            <button class="btn btn-light prev">Previous</button>
                            <button type="submit" class="btn btn-sm btn-primary secondNext">Update</button>
                        </div>
                    </div>
                </div>
                 <!-- SEO Detial Section Start -->
            </form>
        </div>


    </div>
</section>
@if(isset($product_has_faq) && count($product_has_faq) > 0)
@foreach($product_has_faq as $key => $p_faq)
<script type="text/javascript">
    CKEDITOR.replace( "editor_"+<?=$key;?>+"");
</script>
@endforeach
@endif
<script type="text/javascript">
     // For Faq Section

    $(document).ready(function() {
        $('#js-example-basic-single').select2({
            placeholder: 'Add Tags',

            multiple: true,
            tags:true,
            allowClear: true
        });
        $('#seo-tags').select2({
            placeholder: 'Add Tags',

            multiple: true,
            tags:true,
            allowClear: true
        });
        if($('.product_features_status').is(":checked"))   
            $(".features_list").show();
        else
            $(".features_list").hide();
    });

    function valueChanged()
    {
        if($('.product_features_status').is(":checked"))   
            $(".features_list").show();
        else
            $(".features_list").hide();
    }

</script>
<script>
    CKEDITOR.replace( 'editor' );
    CKEDITOR.replace( 'product-description-editor' );
    CKEDITOR.replace( 'supplements-facts-editor' );
    CKEDITOR.replace( 'directions-editor' );
    CKEDITOR.replace( 'suitable-for-editor' );
    CKEDITOR.replace( 'seo-editor' );
</script>
<script src="{{ url('/admin-assets/assets/js/multiStepForm.js') }}"></script>

<script type="text/javascript">
    let count = <?=$image_count;?>;
    $('#add_more_image_btn').click(function(){
        count = count + 1;
        if(count > 4){
            alert('cannot add more then 5 images');
            return;
        }
        $html = '<div class="form-check mb-3" id="img_div_'+count+'"><input class="form-check-input" type="radio" name="prod_img_checkbox" value="'+count+'" /><input class="form-control" type="file" name="prod_images[]"></div>';
        $('#image_parent_div').append($html);
    });


    let faqCount = <?=$faq_count;?>;
    if(faqCount > 0){
        $(".faq_section").show();
        $("#add_more_faq_btn").show();
    }
    if($('.prod_faq').is(":checked")){   
        $(".faq_section").show();
        $("#add_more_faq_btn").show();
    }else{
        $(".faq_section").hide();
        $("#add_more_faq_btn").hide();
    }
    function addFaq(){

        if($('.prod_faq').is(":checked")){   
            $(".faq_section").show();
            $("#add_more_faq_btn").show();
        }else{
            $(".faq_section").hide();
            $("#add_more_faq_btn").hide();
        }
    }
    $('#add_more_faq_btn').click(function(){
        faqCount = faqCount + 1;
        $faq_html = "<div class='col-md-12 faq_section'><input type='text' placeholder='Question' class='form-control' name='faq["+faqCount+"][questions]'/><br><textarea name='faq["+faqCount+"][answers]' id='editor_"+faqCount+"' rows='4' cols='50'></textarea><br></div>";
        $('#faq_parent_div').append($faq_html);
        CKEDITOR.replace( "editor_"+faqCount+"");
    });
</script>
@endsection
