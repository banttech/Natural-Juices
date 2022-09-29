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
            <h3 class="card-title">Add Newly Customer Offer</h3>
        </div>
    </div>
    <div class="card mb-4">
        <form method="POST" action="{{ url('storeNewCustomerOffer') }}" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="row mb-3">
                    <div class="">
                        <label for="name" class="form-label">Offer Name<span class="text-danger" style="font-size: 17px;">*</span></label>
                        <input type="text" value="{{ old('name') }}" name="name" placeholder="Offer Name" class="form-control" />
                        @if ($errors->has('name'))
                        <span class="text-danger text-left">{{ $errors->first('name') }}</span>
                        @endif
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Discount Type</label>
                    <select class="form-select" name="discount_type" value="{{ old('prod_discount_type') }}">
                        <option value="">Select Discount Type</option>
                        <option value="%" selected="">Percent(%)</option>
                        <option value="£">Flat(£)</option>
                    </select>
                </div>
                <div class="row mb-3">
                    <label class="form-label">Discount<span class="text-danger" style="font-size: 17px;">*</span></label>
                    <input type="number" value="{{ old('discount') }}" name="discount" placeholder="Discount" class="form-control" />
                    @if ($errors->has('discount'))
                    <span class="text-danger text-left">{{ $errors->first('discount') }}</span>
                    @endif
                </div>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Valid From<span class="text-danger" style="font-size: 17px;">*</span></label>
                        <input type="date" name="valid_from" class="form-control" />
                        @if ($errors->has('valid_from'))
                        <span class="text-danger text-left">{{ $errors->first('valid_from') }}</span>
                        @endif
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">End Date<span class="text-danger" style="font-size: 17px;">*</span></label>
                        <input type="date" name="end_date" class="form-control" />
                        @if ($errors->has('end_date'))
                        <span class="text-danger text-left">{{ $errors->first('end_date') }}</span>
                        @endif
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Offer Status (Active / Inactive)<span class="text-danger" style="font-size: 17px;">*</span></label><br />
                    &nbsp;&nbsp;<input type="checkbox" checked @if(old('status') == 'inactive') checked="false" @endif name="status">
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-sm btn-primary">Create</button>
                </div>
            </div>
        </form>
    </div>
</section>

<script type="text/javascript">
    $(document).ready(function() {
        $('#js-example-basic-single').select2({
            multiple: true,
            tags:true,
            placeholder: {
              id: -1,
              text: "Add Tags"
           },
        });
        $('#choose-multiple-categories').select2({
            
            placeholder: {
              id: -1,
              text: "Choose Category"
           },
            multiple: true,
            tags:true
        
        });
    });

</script>
<script>
   CKEDITOR.replace( 'editor' );
   CKEDITOR.replace( 'editor1' );
</script>
<style type="text/css">
    .select2-search--inline,
.select2-search__field:placeholder-shown {
    width: 100% !important;
}
</style>
@endsection
