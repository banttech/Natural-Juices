@extends('layouts.admin.app')
@section('content')
<style type="text/css">


    .check-box {
        transform: scale(2);
    }

    input[type="checkbox"] {
        position: relative;
        appearance: none;
        width: 40px;
        height: 20px;
        background: #ccc;
        border-radius: 50px;
        box-shadow: inset 0 0 5px rgba(0, 0, 0, 0.2);
        cursor: pointer;
        transition: 0.4s;
    }

    input:checked[type="checkbox"] {
        background: #7da6ff;
    }

    input[type="checkbox"]::after {
        position: absolute;
        content: "";
        width: 20px;
        height: 20px;
        top: 0;
        left: 0;
        background: #fff;
        border-radius: 50%;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.2);
        transform: scale(1.1);
        transition: 0.4s;
    }

    input:checked[type="checkbox"]::after {
        left: 50%;
    }

</style>
<section class="content-main">
    <div class="content-header">
        <div>
            <h3 class="card-title">Edit Coupon Code</h3>
        </div>
    </div>
    <div class="card mb-4">
        <form method="POST" action="{{ url('updateCouponCode/' . $couponCode->id) }}">
            @csrf
            <div class="card-body">
                <div class="row mb-3">
                    <div class="">
                        <label for="coupon_code" class="form-label">Coupon Code<span class="text-danger" style="font-size: 17px;">*</span></label>
                        <input type="text" value="{{ $couponCode->coupon_code }}" name="coupon_code" placeholder="Coupon Code" class="form-control" />
                        @if ($errors->has('coupon_code'))
                        <span class="text-danger text-left">{{ $errors->first('coupon_code') }}</span>
                        @endif
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Coupon Type<span class="text-danger" style="font-size: 17px;">*</span></label>
                    <select class="form-select coupon_type" name="coupon_type" value="{{ $couponCode->prod_discount_type }}" onchange="parentDiscount(this.value)">
                        <option value="" selected="true" disabled="true">Select Coupon Type</option>
                        <option value="free shipping" @if($couponCode->coupon_type == "free shipping") selected @endif>Free Shipping</option>
                        <option value="flat discount" @if($couponCode->coupon_type == "flat discount") selected @endif>Flat Discount</option>
                        <option value="percentage discount" @if($couponCode->coupon_type == "percentage discount") selected @endif>Percentage Discount</option>
                    </select>
                     @if ($errors->has('coupon_type'))
                        <span class="text-danger text-left">{{ $errors->first('coupon_type') }}</span>
                    @endif
                </div>
                <div class="row mb-3 parent_discount">
                    <div class="discount">
                        <input type="number" value="{{ $couponCode->discount }}" placeholder="0.00" name="discount" class="form-control" />
                    </div>
                    @if ($errors->has('discount'))
                    <span class="text-danger text-left">{{ $errors->first('discount') }}</span>
                    @endif
                </div>
                 <div class="mb-3">
                    <label class="form-label">Coupon Status (Active / Inactive)<span class="text-danger" style="font-size: 17px;">*</span></label><br />
                    &nbsp;&nbsp;<input type="checkbox" checked @if($couponCode->coupon_status == 'inactive') checked="false" @endif name="coupon_status">
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Valid From<span class="text-danger" style="font-size: 17px;">*</span></label>
                        <input type="date" name="valid_from" class="form-control" value="{{ $couponCode->valid_from }}" />
                        @if ($errors->has('valid_from'))
                        <span class="text-danger text-left">{{ $errors->first('valid_from') }}</span>
                        @endif
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">End Date<span class="text-danger" style="font-size: 17px;">*</span></label>
                        <input type="date" name="end_date" class="form-control" value="{{ $couponCode->end_date }}" />
                        @if ($errors->has('end_date'))
                        <span class="text-danger text-left">{{ $errors->first('end_date') }}</span>
                        @endif
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Usage Allowed<span class="text-danger" style="font-size: 17px;">*</span></label>
                    <select class="form-select" name="usage_allowed" value="{{ $couponCode->usage_allowed }}">
                        <option value="" selected="true" disabled="true">Select Usage Allowed</option>
                        <option value="unlimited use" @if($couponCode->usage_allowed == "unlimited use") selected @endif>Unlimited Use</option>
                        <option value="limited use" @if($couponCode->usage_allowed == "limited use") selected @endif>Limited Use</option>
                    </select>
                    @if ($errors->has('usage_allowed'))
                        <span class="text-danger text-left">{{ $errors->first('usage_allowed') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <label class="form-label">Limit Per Customer<span class="text-danger" style="font-size: 17px;">*</span></label>
                    <select class="form-select" name="limit_per_customer" value="{{ old('limit_per_customer') }}">
                        <option value="" selected="true" disabled="true">Select Limit Per Customer</option>
                        <option value="unlimited use" @if($couponCode->usage_allowed == "unlimited use") selected @endif>Unlimited Use</option>
                        <option value="limited use" @if($couponCode->usage_allowed == "limited use") selected @endif>Limited Use</option>
                    </select>
                    @if ($errors->has('limit_per_customer'))
                        <span class="text-danger text-left">{{ $errors->first('limit_per_customer') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <label class="form-label">Apply Coupon Code on a minimum "Cart Value" of Rs<span class="text-danger" style="font-size: 17px;">*</span></label><br />
                    &nbsp;&nbsp;<input type="checkbox" checked class="parent_minimum_apply_coupon_code mb-3" onchange="enableDisableCouponCode()" />
                    <div class="minimum_apply_coupon_code">
                        <input type="number" value="{{ $couponCode->minimum_apply_value }}" placeholder="0.00" name="minimum_apply_value" class="form-control" />
                    </div>
                    @if ($errors->has('minimum_apply_value'))
                        <span class="text-danger text-left">{{ $errors->first('minimum_apply_value') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <label class="form-label">Apply Coupon Code on Specific Category<span class="text-danger" style="font-size: 17px;">*</span></label><br />
                    &nbsp;&nbsp;<input type="checkbox" checked class="parent_specific_category mb-3" onchange="enableDisableCategory()" />
                    <div class="specific_category">
                        <select class="form-select" name="apply_on_specific_category" value="{{ $couponCode->apply_on_specific_category }}">
                            <option value="" selected="true" disabled="true">Apply Coupon Code on Specific Category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" @if($couponCode->apply_on_specific_category == $category->id) selected @endif>{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                     @if ($errors->has('apply_on_specific_category'))
                        <span class="text-danger text-left">{{ $errors->first('apply_on_specific_category') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <label class="form-label">Apply Coupon Code on Specific Brand<span class="text-danger" style="font-size: 17px;">*</span></label><br />
                    &nbsp;&nbsp;<input type="checkbox" checked class="parent_specific_brand mb-3" onchange="enableDisableBrand()" />
                    <div class="specific_brand">
                        <select class="form-select" name="apply_on_specific_brand" value="{{ $couponCode->apply_on_specific_brand }}">
                            <option value="" selected="true" disabled="true">Apply Coupon Code on Specific Brand</option>
                            @foreach ($brands as $brand)
                                <option value="{{ $brand->id }}" @if($couponCode->apply_on_specific_brand == $brand->id) selected @endif>{{ $brand->name }}</option>
                            @endforeach
                        </select>
                    </div>
                     @if ($errors->has('apply_on_specific_brand'))
                        <span class="text-danger text-left">{{ $errors->first('apply_on_specific_brand') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <label class="form-label">Show On Cart Page</label><br />
                    &nbsp;&nbsp;<input type="checkbox" name="show_on_cart_page" checked @if($couponCode->show_on_cart_page == 'active') checked="true" @endif />
                </div>
                 <div class="mb-3">
                    <label for="name" class="form-label">Description</label>
                    <textarea  name="description" id="editor" rows="4" cols="50">{{ $couponCode->description }}</textarea>
                    @if ($errors->has('description'))
                    <span class="text-danger text-left">{{ $errors->first('description') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-sm btn-primary">Update</button>
                </div>
            </div>
        </form>
    </div>
</section>

<script type="text/javascript">
    $(document).ready(function() {
        if($('.coupon_type').value() == 'free shipping'){
            $(".parent_discount").hide();
        }else{
            $(".parent_discount").show();
        }

        if($('.parent_minimum_apply_coupon_code').is(":checked")){   
            $(".minimum_apply_coupon_code").show();
        }else{
            $(".minimum_apply_coupon_code").hide();
        }
        if($('.parent_specific_category').is(":checked")){   
            $(".specific_category").show();
        }else{
            $(".specific_category").hide();
        }
         if($('.parent_specific_brand').is(":checked")){   
            $(".specific_brand").show();
        }else{
            $(".specific_brand").hide();
        }
    });

    function parentDiscount(val)
    {
        if(val == 'free shipping'){
            $(".parent_discount").hide();
        }else{
            $(".parent_discount").show();
        }
    }

    function enableDisableCouponCode()
    {
        if($('.parent_minimum_apply_coupon_code').is(":checked")){   
            $(".minimum_apply_coupon_code").show();
        }else{
            $(".minimum_apply_coupon_code").hide();
        }
    }

    function enableDisableCategory()
    {
        if($('.parent_specific_category').is(":checked")){   
            $(".specific_category").show();
        }else{
            $(".specific_category").hide();
        }
    }

    function enableDisableBrand()
    {
        if($('.parent_specific_brand').is(":checked")){   
            $(".specific_brand").show();
        }else{
            $(".specific_brand").hide();
        }
    }

</script>
<script>
   CKEDITOR.replace( 'editor' );
</script>
@endsection
