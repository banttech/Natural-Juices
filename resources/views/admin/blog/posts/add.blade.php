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
            <h3 class="card-title">Create Blog Post</h3>
        </div>
    </div>
    <div class="card mb-4">
        <form method="POST" action="{{ url('storeBlogPost') }}" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="mb-3">
                    <label class="form-label">Blog Status (Active / Inactive)</label><br />
                    &nbsp;&nbsp;<input type="checkbox" checked @if(old('status') == 'inactive') checked="false" @endif name="status">
                </div>
                <div class="row mb-3">
                    <div class="">
                        <label for="name" class="form-label">Title<span class="text-danger" style="font-size: 17px;">*</span></label>
                        <input type="text" value="{{ old('title') }}" name="title" placeholder="Title" class="form-control" />
                        @if ($errors->has('title'))
                        <span class="text-danger text-left">{{ $errors->first('title') }}</span>
                        @endif
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="">
                        <label for="name" class="form-label">Sub Title</label>
                        <input type="text" value="{{ old('sub_title') }}" name="sub_title" placeholder="Sub Title" class="form-control" />
                        @if ($errors->has('sub_title'))
                        <span class="text-danger text-left">{{ $errors->first('sub_title') }}</span>
                        @endif
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Description<span class="text-danger" style="font-size: 17px;">*</span></label>
                    <textarea placeholder="Type here" id="editor" rows="4" cols="50" name="description" value="{{ old('description') }}"></textarea>
                    @if ($errors->has('description'))
                    <span class="text-danger text-left">{{ $errors->first('description') }}</span>
                    @endif
                </div>
                 <div class="row mb-3">
                    <div class="">
                        <label for="name" class="form-label">Tags</label>
                        <select class="form-control" id="js-example-basic-single" name="tags[]" multiple="multiple">
                            <option value=""></option>
                        </select>
                    </div>
                </div>
               <div class="row mb-3">
                    <div class="">
                        <label for="name" class="form-label">Choose Category<span class="text-danger" style="font-size: 17px;">*</span></label>
                        <select class="form-control" name="category" onchange="changeCategory(this.value)">
                            <option value="" selected="true" disabled="true">Select Category</option>
                            @foreach($blogCategories as $blogCategory)
                            <option value="{{ $blogCategory->id }}">{{ $blogCategory->cat_name }}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('category'))
                        <span class="text-danger text-left">{{ $errors->first('category') }}</span>
                        @endif
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="">
                        <label for="name" class="form-label">Choose Sub Category<span class="text-danger" style="font-size: 17px;">*</span></label>
                        <select class="form-select" name="sub_category" id="sub_category">
                            <option selected="true" disabled="disabled">Sub-Category</option>
                        </select>
                        @if ($errors->has('sub_category'))
                        <span class="text-danger text-left">{{ $errors->first('sub_category') }}</span>
                        @endif
                    </div>
                </div>
                <div class="row mb-3">
                    <div>
                        <label class="form-label">Feature Image<span class="text-danger" style="font-size: 17px;">*</span></label>
                        <input class="form-control" type="file" name="feature_image" value="{{ old('feature_image') }}">
                    </div>  
                    @if ($errors->has('feature_image'))
                    <span class="text-danger text-left">{{ $errors->first('feature_image') }}</span>
                    @endif
                </div>
                 <div class="row mb-3">
                    <div class="">
                        <label for="name" class="form-label">Products listing dropdown</label>
                        <select class="form-control" id="respective-products" name="respective_products[]" multiple="multiple">
                            <option value=""></option>
                             @foreach($products as $product)
                             <option value="{{ $product->id }}">{{ $product->prod_name }}</option>
                             @endforeach
                        </select>
                    </div>
                </div>

                <!-- SEO Fields -->
                <h3 class="card-title">SEO Fields</h3>
                <div class="row mb-3">
                    <div class="">
                        <label for="name" class="form-label">Set SEO Title<span class="text-danger" style="font-size: 17px;">*</span></label>
                        <input type="text" value="{{ old('seo_title') }}"name="seo_title" placeholder="Title" class="form-control" value="{{ old('seo_title') }}" />
                    </div>
                    @if ($errors->has('seo_title'))
                    <span class="text-danger text-left">{{ $errors->first('seo_title') }}</span>
                    @endif  
                </div>
                 <div class="mb-3">
                    <label class="form-label">Set SEO Description<span class="text-danger" style="font-size: 17px;">*</span></label>
                    <textarea placeholder="Type here" class="form-control" rows="4" name="seo_description">{{ old('seo_description') }}</textarea>
                     @if ($errors->has('seo_description'))
                    <span class="text-danger text-left">{{ $errors->first('seo_description') }}</span>
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
    $(document).ready(function() {
        $('#js-example-basic-single').select2({
            multiple: true,
            tags:true,
            placeholder: {
              id: -1,
              text: "Add Tags"
           },
        });
        $('#respective-products').select2({
            multiple: true,
            placeholder: {
              id: -1,
              text: "Add Products"
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
    function changeCategory(value) {
        let route = "{{ route('getBlogSubCategories') }}";
        let token = "{{ csrf_token()}}";

        $.ajax({
            url: route,
            type: 'POST',
            data: {
                _token:token,
                val: value
            },
            success: function(response) {
                $('#sub_category').html('');
                $('#sub_category').html(response);
            },
            error: function(xhr) {
                //Do Something to handle error
            }
        });
    }
</script>

<style type="text/css">
    .select2-search--inline,
.select2-search__field:placeholder-shown {
    width: 100% !important;
}
</style>
@endsection
