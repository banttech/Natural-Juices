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
            <h3 class="card-title">Add Feature</h3>
        </div>
    </div>
    <div class="card mb-4">
        <form method="POST" action="{{ url('storeFeature') }}" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="row mb-3">
                    <div class="">
                        <label for="name" class="form-label">Feature Name<span class="text-danger" style="font-size: 17px;">*</span></label>
                        <input type="text" value="{{ old('name') }}" name="name" placeholder="Feature Name" class="form-control" />
                        @if ($errors->has('name'))
                        <span class="text-danger text-left">{{ $errors->first('name') }}</span>
                        @endif
                    </div>
                </div>
                <div class="row mb-3">
                    <div>
                        <label class="form-label">Feature Icon<span class="text-danger" style="font-size: 17px;">*</span></label>
                        <input class="form-control" type="file" name="icon" id="icon" value="{{ old('icon') }}">
                    </div>  
                    @if ($errors->has('icon'))
                    <span class="text-danger text-left">{{ $errors->first('icon') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <label class="form-label">Feature Description</label>
                    <textarea placeholder="Type here" id="editor" rows="4" cols="50" name="description" value="{{ old('description') }}"></textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">Short description</label>
                    <textarea placeholder="Type here" class="form-control" rows="4" name="short_description"></textarea>
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
</script>
<style type="text/css">
    .select2-search--inline,
.select2-search__field:placeholder-shown {
    width: 100% !important;
}
</style>
@endsection
