@extends('layouts.admin.app')
@section('content')
<style type="text/css">
    .cross_icon{
        text-align: right;
        cursor: pointer;
    }
    .cross_icon i:hover{
        color: red;
    }
</style>
<section class="content-main">
    <div class="content-header">
        <div>
            <h3 class="card-title">Edit Offer</h3>
        </div>
    </div>
    <div class="card mb-4">
        <form method="POST" action="{{ url('updateOffer/' . $offer->id) }}" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="row mb-3">
                    <div class="">
                        <label for="name" class="form-label">Offer Category<span class="text-danger" style="font-size: 17px;">*</span></label>
                        <select class="form-control" name="offer_category" id="js-example-basic-single">
                            <option value="" selected="true" disabled="disabled">Choose Category</option>
                            @foreach($offerCategories as $offerCategory)
                            <option value="{{ $offerCategory->id }}" @if($offerCategory->name == $offer->category->name) selected @endif>{{ $offerCategory->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    @if ($errors->has('offer_category'))
                    <span class="text-danger text-left">{{ $errors->first('offer_category') }}</span>
                    @endif
                </div>
                <div class="row mb-3">
                    <div class="">
                        <label for="name" class="form-label">Target URL<span class="text-danger" style="font-size: 17px;">*</span></label>
                        <input type="text" value="{{ $offer->target_url }}" name="target_url" placeholder="Target URL" class="form-control" />
                        @if ($errors->has('target_url'))
                        <span class="text-danger text-left">{{ $errors->first('target_url') }}</span>
                        @endif
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Status (Active / Inactive)<span class="text-danger" style="font-size: 17px;">*</span></label><br />
                    &nbsp;&nbsp;<input type="checkbox" name="status" @if($offer->status == 'active') checked="true" @endif>
                </div>
                @php $image_count = 0; @endphp
                <div id="parent_offer_img">
                    @foreach($offer->offerImages as $key => $offerImg)
                    <div class="inner_offer_section_{{$image_count + 1}}" style="border: 2px solid #3BB77E; padding: 10px; margin-bottom: 20px;">
                        <div class="cross_icon"><i class="icon material-icons md-close" onclick="remvoeSection({{$image_count + 1}})"></i></div>
                        <div class="row mb-3">
                            <div class="">
                                <label for="title" class="form-label">Title<span class="text-danger" style="font-size: 17px;">*</span></label>
                                <input type="text" value="{{ $offerImg->offer_title }}" name="title[]" placeholder="Title" class="form-control" />
                                @if ($errors->has('title'))
                                <span class="text-danger text-left">{{ $errors->first('title') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Description</label>
                            <textarea placeholder="Type here" class="form-control" rows="4" name="description[]">{{ $offerImg->img_description }}</textarea>
                        </div>
                         <div class="row mb-3">
                            <div>
                                <label class="form-label">Offer Image</label>
                                <input class="form-control" type="file" name="offer_img_name[]" id="offer_img">
                                <input type="hidden" name="offer_img_name[]" value="{{ $offerImg->img_name }}">
                            </div>
                            @if(isset($offerImg->img_name) && $offerImg->img_name != "")
                                <img src="{{ url('/images/offers/'.$offerImg->img_name) }}" style="width: 250px !important">
                            @endif
                        </div>
                    </div>
                        @php $image_count++; @endphp
                    @endforeach
                </div>
                <span class="btn btn-sm font-sm btn-brand mb-3" id="add_more_offer_sec_btn">Add More</span>  
                <div class="mb-3">
                    <button type="submit" class="btn btn-sm btn-primary">Update</button>
                </div>
            </div>
        </form>
    </div>
</section>
<script type="text/javascript">
    let count = <?=$image_count;?>;
    $('#add_more_offer_sec_btn').click(function(){
        count = count + 1;
        if(count > 3){
            alert('cannot add more then 3 images');
            return;
        }
        $html = '<div class="inner_offer_section_'+count+'" style="border: 2px solid #3BB77E; padding: 10px; margin-bottom: 20px;"><div class="cross_icon"><i class="icon material-icons md-close" onClick="remvoeSection('+count+')"></i></div><div class="row mb-3"><div class=""><label for="title" class="form-label">Title<span class="text-danger" style="font-size: 17px;">*</span></label><input type="text" value="{{ old('title') }}" name="title[]" placeholder="Title" class="form-control" />@if ($errors->has('title'))<span class="text-danger text-left">{{ $errors->first('title') }}</span>@endif</div></div><div class="mb-3"><label class="form-label">Description</label><textarea placeholder="Type here" class="form-control" rows="4" name="description[]" id="editor"></textarea></div><div class="row mb-3"><div><label class="form-label">Offer Image<span class="text-danger" style="font-size: 17px;">*</span></label><input class="form-control" type="file" name="offer_img_name[]"></div></div></div>';
        $('#parent_offer_img').append($html);
    });

    function remvoeSection(id) {
        alert(id);
        $(`.inner_offer_section_${id}`).remove();
        count = count - 1;
    }

    $(document).ready(function() {
        $('#js-example-basic-single').select2({
            placeholder: 'Add Tags',

            multiple: true,
            tags:true,
            allowClear: true
        });
    });
</script>
@foreach($offer->offerImages as $key => $offerImg)
 <script type="text/javascript">

 CKEDITOR.replace( 'editor_<?=$key;?>' );
</script>
@endforeach
@endsection
