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
            <h3 class="card-title">Edit Home Page Ads</h3>
        </div>
    </div>
    <div class="card mb-4 formContainer">
        <div class="form-outer">
            <form method="POST" action="{{ url('updateHomePageAds') }}" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="col-12">
                        @php $image_count = 0; @endphp
                        <div class="mb-2">
                            <label class="form-label">Upload Image</label>
                        </div>
                        <div id="image_parent_div">
                            @foreach($homePageAds as $key => $homePageAd)
                                <div class="form-check mb-3">
                                    <input class="form-control" type="file" name="home_page_ads[]">
                                    <input type="hidden" name="home_page_ads[]" value="{{ $homePageAd->image_name }}">
                                    <br>
                                    @if(isset($homePageAd->image_name) && $homePageAd->image_name != "")
                                        <img src="{{ url('/images/home-ads/'.$homePageAd->image_name) }}" style="width: 250px !important">
                                    @endif
                                    <br>
                                    <br>
                                    <span class="btn-danger btn-sm" onclick="deleteAd({{$homePageAd->id}})" style="cursor: pointer;">Delete</span>
                                    {{-- <i class="material-icons md-delete_forever" onclick="deleteAd({{$homePageAd->id}})" style="cursor: pointer;"></i> --}}
                                </div>
                            @php $image_count++; @endphp
                            @endforeach
                        </div>
                        <span class="btn btn-sm font-sm btn-brand mb-3" id="add_more_image_btn">Add More</span>  
                    </div>
                    <div class="mb-3" style="float: right;">
                        <button type="submit" class="btn btn-sm btn-primary" id="update_btn">Update</button>
                    </div>
                </div>  
            </form>
        </div>
    </div>
</section>
<script type="text/javascript">
    let count = <?=$image_count;?>;
    $('#add_more_image_btn').click(function(){
        count = count + 1;
       
        if(count > 5){
            $('#add_more_image_btn').css('display','none');
            alert('cannot add more then 5 images');
            return;
        }
        $html = '<div class="mb-3" id="img_div_'+count+'"><input class="form-control" type="file" name="home_page_ads[]"></div>';
        $('#image_parent_div').append($html);
    });

    function deleteAd(id)
    {
        let is_confirm = confirm("Are you sure to delete");

        if(is_confirm){

            let route = "{{ route('deleteHomePageAd') }}";
            let token = "{{ csrf_token()}}";

            $.ajax({
                url: route,
                type: 'POST',
                data: {
                    _token:token,
                    id: id
                },
                success: function(response) {
                   window.location.reload();
                },
                error: function(xhr) {
                    console.log('error');
                }
            });
        }
    }

</script>
@endsection
