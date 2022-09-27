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
            <h3 class="card-title">Add Brand</h3>
        </div>
    </div>
    <div class="card mb-4">
        <form method="POST" action="{{ url('storeBrand') }}" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="row mb-3">
                    <div class="">
                        <label for="name" class="form-label">Brand Name<span class="text-danger" style="font-size: 17px;">*</span></label>
                        <input type="text" value="{{ old('name') }}" name="name" placeholder="Brand Name" class="form-control" />
                        @if ($errors->has('name'))
                        <span class="text-danger text-left">{{ $errors->first('name') }}</span>
                        @endif
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="">
                        <label for="name" class="form-label">Choose Category</label>
                        <select class="form-control" id="choose-multiple-categories" name="categories[]" multiple="multiple" data-placeholder="cawky parky">
                            @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Brand Status (Active / Inactive)</label><br />
                    &nbsp;&nbsp;<input type="checkbox" checked @if(old('status') == 'inactive') checked="false" @endif name="status">
                    
                </div>
                <div class="row mb-3">
                    <div class="col-6">
                        <div>
                            <label class="form-label">Home Page Logo<span class="text-danger" style="font-size: 17px;">*</span></label>
                            <input class="form-control" type="file" name="home_logo" id="home_logo" value="{{ old('home_logo') }}">
                        </div>  
                        @if ($errors->has('home_logo'))
                        <span class="text-danger text-left">{{ $errors->first('home_logo') }}</span>
                        @endif
                    </div>
                    <div class="col-6">
                        <div>
                            <label class="form-label">Brand Cover Image<span class="text-danger" style="font-size: 17px;">*</span></label>
                            <input class="form-control" type="file" name="cover_img" value="{{ old('cover_img') }}">
                        </div>
                        @if ($errors->has('cover_img'))
                        <span class="text-danger text-left">{{ $errors->first('cover_img') }}</span>
                        @endif  
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Brand Description<span class="text-danger" style="font-size: 17px;">*</span></label>
                    <textarea placeholder="Type here" id="editor" rows="4" cols="50" name="description" value="{{ old('description') }}"></textarea>
                    @if ($errors->has('description'))
                    <span class="text-danger text-left">{{ $errors->first('description') }}</span>
                    @endif
                </div>

                <!-- SEO Fields -->
                <h3 class="card-title">SEO Fields</h3>
                <div class="row mb-3">
                    <div class="">
                        <label for="name" class="form-label">Title<span class="text-danger" style="font-size: 17px;">*</span></label>
                        <input type="text" value="{{ old('title') }}"name="title" placeholder="Title" class="form-control" value="{{ old('title') }}" />
                    </div>
                    @if ($errors->has('title'))
                    <span class="text-danger text-left">{{ $errors->first('title') }}</span>
                    @endif  
                </div>
                <div class="row mb-3">
                    <div class="">
                        <label for="name" class="form-label">Url Slug<span class="text-danger" style="font-size: 17px;">*</span></label>
                        <input type="text" value="{{ old('url_slug') }}" name="url_slug" placeholder="Url Slug" class="form-control" value="{{ old('url_slug') }}" />
                    </div>
                    @if ($errors->has('url_slug'))
                    <span class="text-danger text-left">{{ $errors->first('url_slug') }}</span>
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
                <div class="mb-3">
                    <label class="form-label">Meta Description<span class="text-danger" style="font-size: 17px;">*</span></label>
                    <textarea placeholder="Type here" id="editor1" rows="4" cols="50" name="meta_description" value="{{ old('meta_description') }}"></textarea>
                    @if ($errors->has('meta_description'))
                    <span class="text-danger text-left">{{ $errors->first('meta_description') }}</span>
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
