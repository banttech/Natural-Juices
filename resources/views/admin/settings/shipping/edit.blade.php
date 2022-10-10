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
            <h3 class="card-title">Update Shipping Category</h3>
        </div>
    </div>
    <div class="card mb-4">
        <form method="POST" method="post" action="{{ url('updateShippingCategory/' . $shippingCategory->id) }}">
            @csrf
            <div class="card-body">
                <div class="row mb-3">
                    <div class="">
                        <label for="name" class="form-label">Shipping Category Name<span class="text-danger" style="font-size: 17px;">*</span></label>
                        <input type="text" value="{{ $shippingCategory->name }}" name="name" placeholder="Brand Name" class="form-control" />
                    </div>
                    @if ($errors->has('name'))
                    <span class="text-danger text-left">{{ $errors->first('name') }}</span>
                    @endif
                </div>
                 <div class="row mb-3">
                    <div class="">
                        <label for="name" class="form-label">Select Country</label>
                        <select class="form-control" id="choose-multiple-countries" name="countries[]" multiple="multiple">
                            @foreach ($countries as $country)
                                <option value="{{ $country->id }}" @if(in_array($country->id, $selected_shippingcategories_ids)) selected @endif>{{ $country->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="">
                        <label for="shipping_charges" class="form-label">Shipping Charge<span class="text-danger" style="font-size: 17px;">*</span></label>
                        <input type="number" value="{{ $shippingCategory->shipping_charges }}" name="shipping_charges" placeholder="Sort Order" class="form-control" />
                        @if ($errors->has('shipping_charges'))
                            <span class="text-danger text-left">{{ $errors->first('shipping_charges') }}</span>
                        @endif
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Delivery Time<span class="text-danger" style="font-size: 17px;">*</span></label>
                    <select class="form-select" name="delivery_time" value="{{ old('delivery_time') }}">
                        <option value="" selected="true" disabled="disabled">Select Delivery Time</option>
                        <option value="1 business day" @if($shippingCategory->delivery_time == '1 business day') selected @endif>1 business day</option>
                        <option value="1-2 business day" @if($shippingCategory->delivery_time == '1-2 business day') selected @endif>1-2 business day</option>
                        <option value="2-3 business day" @if($shippingCategory->delivery_time == '2-3 business day') selected @endif>2-3 business day</option>
                        <option value="3-4 business day" @if($shippingCategory->delivery_time == '3-4 business day') selected @endif>3-4 business day</option>
                        <option value="4-5 business day" @if($shippingCategory->delivery_time == '4-5 business day') selected @endif>4-5 business day</option>
                        <option value="5-7 business day" @if($shippingCategory->delivery_time == '5-7 business day') selected @endif>5-7 business day</option>
                        <option value="7-10 business day" @if($shippingCategory->delivery_time == '7-10 business day') selected @endif>7-10 business day</option>
                        <option value="10-15 business day" @if($shippingCategory->delivery_time == '10-15 business day') selected @endif>10-15 business day</option>
                        <option value="15-20 business day" @if($shippingCategory->delivery_time == '15-20 business day') selected @endif>15-20 business day</option>
                        <option value="20-25 business day" @if($shippingCategory->delivery_time == '20-25 business day') selected @endif>20-25 business day</option>
                        <option value="25-30 business day" @if($shippingCategory->delivery_time == '25-30 business day') selected @endif>25-30 business day</option>
                    </select>
                    @if ($errors->has('delivery_time'))
                        <span class="text-danger text-left">{{ $errors->first('delivery_time') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-sm btn-primary">Update</button>
                </div>
                <!-- table-responsive //end -->
            </div>
        </form>
        <!-- card-body end// -->
    </div>
</section>

<script type="text/javascript">
    $(document).ready(function() {
        $('#choose-multiple-countries').select2({
            
            placeholder: {
              id: -1,
              text: "Country Include"
           },
            multiple: true,
            tags:true
        
        });
    });
</script>
@endsection
