@extends('layouts.admin.app')
@section('content')

<section class="content-main">
    <div class="content-header">
        <div>
            <h3 class="card-title">Add Home Page Ads</h3>
        </div>
    </div>
    <div class="card mb-4 formContainer">
        <div class="form-outer">
            <form method="POST" action="{{ url('storeHomePageAds') }}" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="col-12">
                        <div class="mb-2">
                            <label class="form-label">Upload Image<span class="text-danger" style="font-size: 17px;">*</span></label>
                        </div>
                        <div id="image_parent_div">
                            <div class="mb-3">
                                <input class="form-control" type="file" name="home_page_ads[]">
                                @if ($errors->has('home_page_ads'))
                                <span class="text-danger text-left">{{ $errors->first('home_page_ads') }}</span>
                                @endif
                            </div>
                        </div>
                        <span class="btn btn-sm font-sm btn-brand mb-3" disabled id="add_more_image_btn_0">Add More</span>  
                    </div>
                    <div class="mb-3" style="float: right;">
                        <button type="submit" class="btn btn-sm btn-primary">Create</button>
                    </div>
                </div>  
            </form>
        </div>
    </div>
</section>
<script type="text/javascript">
    let count = 0;
    $('#add_more_image_btn_'+count).click(function(){
        count = count + 1;
        if(count > 4){
            alert('cannot add more then 5 images');
            return;
        }
        $html = '<div class="mb-3" id="img_div_'+count+'"><input class="form-control" type="file" name="home_page_ads[]"></div>';
        $('#image_parent_div').append($html);
    });
</script>
@endsection
