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
            <h3 class="card-title">Edit Brand</h3>
        </div>
    </div>
    <div class="card mb-4">
        <form method="POST" method="post" action="{{ url('updateBrand/' . $brand->id) }}" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="row mb-3">
                    <div class="">
                        <label for="name" class="form-label">Brand Name<span class="text-danger" style="font-size: 17px;">*</span></label>
                        <input type="text" value="{{ $brand->name }}" name="name" placeholder="Brand Name" class="form-control" />
                    </div>
                    @if ($errors->has('name'))
                    <span class="text-danger text-left">{{ $errors->first('name') }}</span>
                    @endif
                </div>
                <div class="row mb-3">
                    <div class="">
                        <label for="name" class="form-label">Choose Category</label>
                        <select class="form-control" id="choose-multiple-categories" name="categories[]" multiple="multiple">

                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" @if(in_array($category->id, $selected_categories_ids)) selected @endif>{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
               
                
                <div class="row mb-3">
                    <div class="col-6">
                        <div>
                            <label class="form-label">Home Page Logo</label>
                            <input class="form-control" type="file" name="home_logo" id="home_logo" value="{{ $brand->home_logo }}">
                        </div>  
                        <br>
                        @if(isset($brand->home_logo) && $brand->home_logo != "")
                            <img src="{{ url('/images/brands/'.$brand->home_logo) }}" style="width: 250px !important">
                        @endif
                    </div>
                    <div class="col-6">
                        <div>
                            <label class="form-label">Choose Brand Cover Image</label>
                            <input class="form-control" type="file" name="cover_img" value="{{ $brand->cover_img }}">
                        </div>
                        <br>
                        @if(isset($brand->cover_img) && $brand->cover_img != "")
                            <img src="{{ url('/images/brands/'.$brand->cover_img) }}" style="width: 250px !important">
                        @endif
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Brand Description<span class="text-danger" style="font-size: 17px;">*</span></label>
                    {{-- <textarea placeholder="Type here" class="form-control" name="description">{{ $brand->description }}</textarea> --}}
                    <textarea placeholder="Type here"  name="description" id="editor4" rows="4" cols="50">{{ $brand->description }}</textarea>

                    @if ($errors->has('description'))
                    <span class="text-danger text-left">{{ $errors->first('description') }}</span>
                    @endif
                </div>

                <div class="mb-3">
                    <label class="form-label">Status</label>
                    <br>
                    &nbsp;&nbsp;<input type="checkbox" @if($brand->status == 'inactive') checked="false" @else checked @endif name="status">
                </div>

                <h3 class="card-title">SEO Fields</h3>
                <div class="row mb-3">
                    <div class="">
                        <label for="name" class="form-label">Title<span class="text-danger" style="font-size: 17px;">*</span></label>
                        <input type="text" value="{{ $brand->title }}" name="title" placeholder="Title" class="form-control" value="{{ old('title') }}" />
                    </div>
                    @if ($errors->has('title'))
                    <span class="text-danger text-left">{{ $errors->first('title') }}</span>
                    @endif  
                </div>
                <div class="row mb-3">
                    <div class="">
                        <label for="name" class="form-label">Url Slug<span class="text-danger" style="font-size: 17px;">*</span></label>
                        <input type="text" value="{{ $brand->url_slug }}" name="url_slug" placeholder="Url Slug" class="form-control" value="{{ old('url_slug') }}" />
                    </div>
                    @if ($errors->has('url_slug'))
                    <span class="text-danger text-left">{{ $errors->first('url_slug ') }}</span>
                    @endif
                </div>
                <div class="row mb-3">
                    <div class="">
                        <label for="name" class="form-label">Tags<span class="text-danger" style="font-size: 17px;">*</span></label>
                        <select class="form-control" id="js-example-basic-single" name="tags[]" multiple="multiple">
                            <?php $tags = explode(',', $brand->tags); ?>
                            @foreach ($tags as $tag)
                            <option value="{{ $tag }}" selected>{{ $tag }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Meta Description<span class="text-danger" style="font-size: 17px;">*</span></label>
                    {{-- <textarea placeholder="Type here" class="form-control" name="meta_description">{{ $brand->meta_description }}</textarea> --}}
                    <textarea placeholder="Type here"  name="meta_description" id="editor2" rows="4" cols="50">{{ $brand->meta_description }}</textarea>

                    @if ($errors->has('meta_description'))
                    <span class="text-danger text-left">{{ $errors->first('meta_description') }}</span>
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

    $(function () {
        $("#switch-id").change(function () {
            if ($(this).is(":checked")) {
                $(".contentB").show();
                $(".contentA").hide();
            } else {
                $(".contentB").hide();
                $(".contentA").show();
            }
        });
    });
</script>
<script>
   CKEDITOR.replace( 'editor4' );
   CKEDITOR.replace( 'editor2' );
</script>
@endsection
