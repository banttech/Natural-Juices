@extends('layouts.admin.app')
@section('content')

<section class="content-main">
     @if(Session::has('flash_message_error'))
            <div class="alert alert-error alert-block" style="margin: 18px;">
                <button type="button" class="close" data-dismiss="alert">×</button> 
                <strong>{!! session('flash_message_error') !!}</strong>
            </div>
        @endif   
        @if(Session::has('flash_message_success'))
        <div class="alert alert-success alert-block" style="margin: 18px;">
            <button type="button" class="close" data-dismiss="alert">×</button> 
            <strong>{!! session('flash_message_success') !!}</strong>
        </div>
        @endif
    <div class="content-header">
        <div>
            <h3 class="card-title">Edit Home Page Offer</h3>
        </div>
    </div>
    <div class="card mb-4 formContainer">
        <div class="form-outer">
            <form method="POST" action="{{ url('updateHomePageOffer') }}" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="col-12">
                        @php $image_count = 0; @endphp
                        <div class="mb-2">
                            <label class="form-label">Upload Image</label>
                        </div>
                        <div class="form-check mb-3">
                            <input class="form-control" type="file" name="home_page_offer">
                            <br>
                            @if(isset($homePageOffer->image_name) && $homePageOffer->image_name != "")
                                <img src="{{ url('/images/home-offer/'.$homePageOffer->image_name) }}" style="width: 250px !important">
                            @endif
                        </div>
                    </div>
                    <div class="mb-3" style="float: right;">
                        <button type="submit" class="btn btn-sm btn-primary">Update</button>
                    </div>
                </div>  
            </form>
        </div>
    </div>
</section>
@endsection
