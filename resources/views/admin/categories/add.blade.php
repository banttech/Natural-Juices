@extends('layouts.admin.app')
@section('content')

<section class="content-main">
    <div class="content-header">
        <div>
            <h3 class="card-title">Blog Category</h3>
        </div>
    </div>
    <div class="card mb-4">
        <form method="POST" action="{{ url('storeCategory') }}" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="row mb-3">
                    <div class="">
                        <label for="name" class="form-label">Category Name<span class="text-danger" style="font-size: 17px;">*</span></label>
                        <input type="text" value="{{ old('name') }}" name="name" placeholder="Category Name" class="form-control" />
                        @if ($errors->has('name'))
                            <span class="text-danger text-left">{{ $errors->first('name') }}</span>
                        @endif
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Choose Parent Category</label>
                    <select class="form-select" name="parent_id" value="{{ old('parent_id') }}">
                        <option value="">Select Category</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
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
                        @if ($errors->has('home_banner_img'))
                            <span class="text-danger text-left">{{ $errors->first('home_banner_img') }}</span>
                        @endif
                    </div>
                    <div class="col-6">
                        <div>
                            <label class="form-label">Category Cover Image<span class="text-danger" style="font-size: 17px;">*</span></label>
                            <input class="form-control" type="file" name="cover_img" value="{{ old('cover_img') }}">
                        </div>
                        @if ($errors->has('cover_img'))
                            <span class="text-danger text-left">{{ $errors->first('cover_img') }}</span>
                        @endif  
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Category Description</label>
                    <textarea placeholder="Type here"  name="description" id="editor" rows="4" cols="50">{{ old('description') }}</textarea>
                </div>
                
                <div class="mb-3">
                    <label class="form-label">Category Status (Active / Inactive)</label>
      
                    <br>
                    &nbsp;&nbsp;<input type="checkbox" checked @if(old('status') == 'inactive') checked="false" @endif name="status">

                </div>
                <div class="row mb-3">
                    <div class="">
                        <label for="name" class="form-label">Sort Order<span class="text-danger" style="font-size: 17px;">*</span></label>
                        <input type="number" value="{{ old('sort_order') }}" name="sort_order" placeholder="Sort Order" class="form-control" />
                        @if ($errors->has('sort_order'))
                            <span class="text-danger text-left">{{ $errors->first('sort_order') }}</span>
                        @endif
                    </div>
                </div>

                <h3 class="card-title">SEO Fields</h3>
                <div class="row mb-3">
                    <div class="">
                        <label for="name" class="form-label">Title<span class="text-danger" style="font-size: 17px;">*</span></label>
                        <input type="text" value="{{ old('title') }}" name="title" placeholder="Title" class="form-control" value="{{ old('title') }}" />
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
                        <select class="form-control" id="js-example-basic-single" name="tags[]" multiple="multiple" placeholder = "Add Tags">
                          <option value=""></option>
                        </select>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Meta Description<span class="text-danger" style="font-size: 17px;">*</span></label>
                    <textarea placeholder="Type here"  name="meta_description" id="editor1" rows="4" cols="50">{{ old('meta_description') }}</textarea>
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
    placeholder: 'Add Tags',

    multiple: true,
    tags:true,
    allowClear: true
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
