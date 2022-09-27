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
            <h3 class="card-title">Add Shipping Category</h3>
        </div>
    </div>
    <div class="card mb-4">
        <form method="POST" action="{{ url('storeShippingCategory') }}" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="row mb-3">
                    <div class="">
                        <label for="name" class="form-label">Shipping Category Name<span class="text-danger" style="font-size: 17px;">*</span></label>
                        <input type="text" value="{{ old('name') }}" name="name" placeholder="Shipping Category Name" class="form-control" />
                        @if ($errors->has('name'))
                        <span class="text-danger text-left">{{ $errors->first('name') }}</span>
                        @endif
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="">
                        <label for="countries" class="form-label">Country Included</label>
                        <select class="form-control" id="choose-multiple-countries" name="countries[]" multiple="multiple">
                            @foreach($countries as $country)
                            <option value="{{ $country->id }}">{{ $country->name }}</option>
                            @endforeach
                        </select>
                         @if ($errors->has('countries'))
                            <span class="text-danger text-left">{{ $errors->first('countries') }}</span>
                        @endif
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="">
                        <label for="shipping_charges" class="form-label">Shipping Charge (£)<span class="text-danger" style="font-size: 17px;">*</span></label>
                        <input type="number" value="{{ old('shipping_charges') }}" name="shipping_charges" placeholder="Shipping Charge (£)" class="form-control" />
                        @if ($errors->has('shipping_charges'))
                            <span class="text-danger text-left">{{ $errors->first('shipping_charges') }}</span>
                        @endif
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Delivery Time<span class="text-danger" style="font-size: 17px;">*</span></label>
                    <select class="form-select" name="delivery_time" value="{{ old('delivery_time') }}">
                        <option value="" selected="true" disabled="disabled">Select Delivery Time</option>
                        <option value="1 business day">1 business day</option>
                        <option value="1-2 business day">1-2 business day</option>
                        <option value="2-3 business day">2-3 business day</option>
                        <option value="3-4 business day">3-4 business day</option>
                        <option value="4-5 business day">4-5 business day</option>
                        <option value="5-7 business day">5-7 business day</option>
                        <option value="7-10 business day">7-10 business day</option>
                        <option value="10-15 business day">10-15 business day</option>
                        <option value="15-20 business day">15-20 business day</option>
                        <option value="20-25 business day">20-25 business day</option>
                        <option value="25-30 business day">25-30 business day</option>
                    </select>
                    @if ($errors->has('delivery_time'))
                        <span class="text-danger text-left">{{ $errors->first('delivery_time') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-sm btn-primary">Create</button>
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
              text: "Country Included"
           },
            multiple: true,
            tags:true
        });
    });

</script>
<style type="text/css">
    .select2-search--inline,
.select2-search__field:placeholder-shown {
    width: 100% !important;
}
</style>
@endsection
