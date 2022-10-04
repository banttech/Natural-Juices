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
            <h3 class="card-title">Edit Shopping Cart Offers</h3>
        </div>
    </div>
    <div class="card mb-4">
        <form method="POST" action="{{ url('updateShoppingCartOffer/' . $shoppingCartOffer->id) }}">
            @csrf
            <div class="card-body">
                <div class="row mb-3">
                    <div class="">
                        <label for="name" class="form-label">Offer Name<span class="text-danger" style="font-size: 17px;">*</span></label>
                        <input type="text" value="{{ $shoppingCartOffer->name }}" name="name" placeholder="Offer Name" class="form-control" />
                        @if ($errors->has('name'))
                        <span class="text-danger text-left">{{ $errors->first('name') }}</span>
                        @endif
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="form-label">Minimum Cart Value</label>
                    &nbsp;&nbsp;<input type="checkbox" class="minimum_cart_check mb-3" onchange="valueChanged()">  
                    <input type="number" value="{{ $shoppingCartOffer->minimum_cart_value }}" name="minimum_cart_value" placeholder="Minimum Cart Value" class="form-control minimum_cart_value" />
                    @if ($errors->has('minimum_cart_value'))
                    <span class="text-danger text-left">{{ $errors->first('minimum_cart_value') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <label class="form-label">Discount Type</label>
                    <select class="form-select" name="discount_type" value="{{ $shoppingCartOffer->discount_type }}">
                        <option value="">Select Discount Type</option>
                        <option value="%" @if($shoppingCartOffer->discount_type == "%") selected @endif>Percent(%)</option>
                        <option value="£" @if($shoppingCartOffer->discount_type == "£") selected @endif>Flat(£)</option>
                    </select>
                </div>
                <div class="row mb-3">
                    <label class="form-label">Discount<span class="text-danger" style="font-size: 17px;">*</span></label>
                    <input type="number" value="{{ $shoppingCartOffer->discount }}" name="discount" placeholder="Discount" class="form-control" />
                    @if ($errors->has('discount'))
                    <span class="text-danger text-left">{{ $errors->first('discount') }}</span>
                    @endif
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Valid From<span class="text-danger" style="font-size: 17px;">*</span></label>
                        <input type="date" name="valid_from" value="{{ $shoppingCartOffer->valid_from }}" class="form-control" />
                        @if ($errors->has('valid_from'))
                        <span class="text-danger text-left">{{ $errors->first('valid_from') }}</span>
                        @endif
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">End Date<span class="text-danger" style="font-size: 17px;">*</span></label>
                        <input type="date" name="end_date" value="{{ $shoppingCartOffer->end_date }}" class="form-control" />
                        @if ($errors->has('end_date'))
                        <span class="text-danger text-left">{{ $errors->first('end_date') }}</span>
                        @endif
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Offer Status (Active / Inactive)<span class="text-danger" style="font-size: 17px;">*</span></label><br />
                    &nbsp;&nbsp;<input type="checkbox" checked @if($shoppingCartOffer->status == 'inactive') checked="false" @endif name="status">
                </div>
                <div class="mb-3">
                    <label for="name" class="form-label">Description<span class="text-danger" style="font-size: 17px;">*</span></label>
                    <textarea  name="description" id="editor" rows="4" cols="50">{{ $shoppingCartOffer->description }}</textarea>
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
        if($('.minimum_cart_check').is(":checked")){   
            $(".minimum_cart_value").show();
        }else{
            $(".minimum_cart_value").hide();
        }
    });

    function valueChanged()
    {
        if($('.minimum_cart_check').is(":checked")){   
            $(".minimum_cart_value").show();
        }else{
            $(".minimum_cart_value").hide();
        }
    }

</script>
<script>
   CKEDITOR.replace( 'editor' );
</script>
<style type="text/css">
    .select2-search--inline,
.select2-search__field:placeholder-shown {
    width: 100% !important;
}
</style>
@endsection
