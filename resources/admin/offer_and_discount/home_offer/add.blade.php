@extends('layouts.admin.app')
@section('content')

<section class="content-main">
    <div class="content-header">
        <div>
            <h3 class="card-title">Add Home Page Offer</h3>
        </div>
    </div>
    <div class="card mb-4 formContainer">
        <div class="form-outer">
            <form method="POST" action="{{ url('storeHomePageOffer') }}" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="col-12">
                        <div class="mb-2">
                            <label class="form-label">Upload Image<span class="text-danger" style="font-size: 17px;">*</span></label>
                        </div>
                        <div class="mb-3">
                            <input class="form-control" type="file" name="home_page_offer">
                            @if ($errors->has('home_page_offer'))
                            <span class="text-danger text-left">{{ $errors->first('home_page_offer') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="mb-3" style="float: right;">
                        <button type="submit" class="btn btn-sm btn-primary">Create</button>
                    </div>
                </div>  
            </form>
        </div>
    </div>
</section>
@endsection
