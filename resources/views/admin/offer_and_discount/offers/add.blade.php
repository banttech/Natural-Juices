@extends('layouts.admin.app')
@section('content')
<section class="content-main">
    <div class="content-header">
        <div>
            <h3 class="card-title">Add Offer</h3>
        </div>
    </div>
    <div class="card mb-4">
        <form method="POST" action="{{ url('storeOffer') }}" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div id="parent_offer_img">
                    <div class="row mb-3">
                        <div>
                            <label class="form-label">Offer Image<span class="text-danger" style="font-size: 17px;">*</span></label>
                            <input class="form-control" type="file" name="offer_img_name[]" id="offer_img">
                        </div>
                        @if ($errors->has('offer_img_name'))
                        <span class="text-danger text-left">{{ $errors->first('offer_img_name') }}</span>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea placeholder="Type here" class="form-control" rows="4" name="description[]"></textarea>
                    </div>
                </div>
                <span class="btn btn-sm font-sm btn-brand mb-3" id="add_more_offer_sec_btn">Add More</span>
                <div class="row mb-3">
                    <div class="">
                        <label for="name" class="form-label">Offer Category<span class="text-danger" style="font-size: 17px;">*</span></label>
                        <select class="form-control" name="offer_category">
                            <option value="" selected="true" disabled="disabled">Choose Category</option>
                            @foreach($offerCategories as $offerCategory)
                            <option value="{{ $offerCategory->name }}"  @if( old('offer_category') == $offerCategory->name) selected @endif>{{ $offerCategory->name }}</option>
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
                        <input type="text" value="{{ old('target_url') }}" name="target_url" placeholder="Target URL" class="form-control" />
                        @if ($errors->has('target_url'))
                        <span class="text-danger text-left">{{ $errors->first('target_url') }}</span>
                        @endif
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Status (Active / Inactive)<span class="text-danger" style="font-size: 17px;">*</span></label><br />
                    &nbsp;&nbsp;<input type="checkbox" checked name="status" onchange="valueChanged()">
                    @if ($errors->has('status'))
                    <span class="text-danger text-left">{{ $errors->first('status') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-sm btn-primary">Create</button>
                </div>
            </div>
        </form>
    </div>
</section>
<script type="text/javascript">
    let count = 0;
    $('#add_more_offer_sec_btn').click(function(){
        count = count + 1;
        if(count > 2){
            alert('cannot add more then 3 images');
            return;
        }
        $html = '<div class="row mb-3"><div><label class="form-label">Offer Image<span class="text-danger" style="font-size: 17px;">*</span></label><input class="form-control" type="file" name="offer_img_name[]"></div></div><div class="mb-3"><label class="form-label">Description</label><textarea placeholder="Type here" class="form-control" rows="4" name="description[]"></textarea></div>';
        $('#parent_offer_img').append($html);
    });
</script>
@endsection
