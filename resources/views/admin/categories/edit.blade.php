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
            <h3 class="card-title">Update Category</h3>
        </div>
    </div>
    <div class="card mb-4">
        <form method="POST" action="{{ url('updateCategory/' . $category->id) }}" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="row mb-3">
                    <div class="">
                        <label for="name" class="form-label">Category Name<span class="text-danger" style="font-size: 17px;">*</span></label>
                        <input type="text" value="{{ $category->name }}" name="name" placeholder="Category Name" class="form-control" />
                        @if ($errors->has('name'))
                            <span class="text-danger text-left">{{ $errors->first('name') }}</span>
                        @endif
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Choose Parent Category</label>
                    <select class="form-select" name="parent_id" >
                        <option value="">Select Category</option>
                        @foreach($categories as $cat)
                            <option value="{{ $cat->id }}" @if($category->parent_id !== null && $category->parent_id == $cat->id) selected @endif>{{ $cat->name }}</option>
                        @endforeach
                    </select>
                </div>
                {{-- <div class="mb-3">
                    <label class="form-label">Status</label>
                    <select class="form-select" name="status" value="{{ old('status') }}">
                        <option value="active">Active</option>
                        <option value="inactive">Inactive</option>
                    </select>
                </div> --}}
                <div class="row mb-3">
                    <div class="col-6">
                        <div>
                            <label class="form-label">Home Page Banner<span class="text-danger" style="font-size: 17px;">*</span></label>
                            <input class="form-control" type="file" name="home_banner_img" id="home_banner_img" value="{{ old('home_banner_img') }}">
                        </div>  
                        <br>
                        @if(isset($category->home_banner_img) && $category->home_banner_img != "")
                            <img src="{{ url('/images/categories/'.$category->home_banner_img) }}" style="width: 250px !important">
                        @endif
                        @if ($errors->has('home_banner_img'))
                            <span class="text-danger text-left">{{ $errors->first('home_banner_img') }}</span>
                        @endif    
                    </div>
                    <div class="col-6">
                        <div>
                            <label class="form-label">Category Cover Image<span class="text-danger" style="font-size: 17px;">*</span></label>
                            <input class="form-control" type="file" name="cover_img" value="{{ old('cover_img') }}">
                        </div>
                        @if(isset($category->cover_img) && $category->cover_img != "")
                            <img src="{{ url('/images/categories/'.$category->cover_img) }}" style="width: 250px !important">
                        @endif  
                        @if ($errors->has('cover_img'))
                            <span class="text-danger text-left">{{ $errors->first('cover_img') }}</span>
                        @endif    
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Category Description</label>
                    <textarea placeholder="Type here"  name="description" id="editor" rows="4" cols="50">{{ $category->description }}</textarea>
                </div>
                
                <div class="mb-3">
                    <label class="form-label">Category Status (Activate / Deactivate)</label>
      
                    <br>
                    &nbsp;&nbsp;<input type="checkbox" @if($category->status == 'inactive') @else checked @endif name="status">

                </div>
                <div class="row mb-3">
                    <div class="">
                        <label for="name" class="form-label">Sort Order<span class="text-danger" style="font-size: 17px;">*</span></label>
                        <input type="number" value="{{ $category->sort_order }}" name="sort_order" placeholder="Sort Order" class="form-control" />
                        @if ($errors->has('sort_order'))
                            <span class="text-danger text-left">{{ $errors->first('sort_order') }}</span>
                        @endif
                    </div>
                </div>

                <h3 class="card-title">SEO Fields</h3>
                <div class="row mb-3">
                    <div class="">
                        <label for="name" class="form-label">Title<span class="text-danger" style="font-size: 17px;">*</span></label>
                        <input type="text" value="{{ $category->title }}" name="title" placeholder="Title" class="form-control" value="{{ old('title') }}" />
                    </div>
                    @if ($errors->has('title'))
                        <span class="text-danger text-left">{{ $errors->first('title') }}</span>
                    @endif  
                </div>
                <div class="row mb-3">
                    <div class="">
                        <label for="name" class="form-label">Url Slug<span class="text-danger" style="font-size: 17px;">*</span></label>
                        <input type="text" value="{{ $category->url_slug }}" name="url_slug" placeholder="Url Slug" class="form-control" value="{{ old('url_slug') }}" />
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="">
                        <label for="name" class="form-label">Tags</label>
                        <select class="form-control" id="js-example-basic-single" name="tags[]" multiple="multiple">
                          <option value="">Add Tags</option>
                           <?php $tags = explode(',', $category->tags); ?>
                            @foreach ($tags as $tag)
                                <option value="{{ $tag }}" selected>{{ $tag }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Meta Description<span class="text-danger" style="font-size: 17px;">*</span></label>
                    <textarea placeholder="Type here"  name="meta_description" id="editor1" rows="4" cols="50">{{ $category->meta_description }}</textarea>
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
            placeholder: 'Add Tags',
            allowClear: true
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
   CKEDITOR.replace( 'editor' );
   CKEDITOR.replace( 'editor1' );
</script>
@endsection
