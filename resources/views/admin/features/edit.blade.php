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
            <h3 class="card-title">Update Feature</h3>
        </div>
    </div>
    <div class="card mb-4">
        <form method="POST" method="post" action="{{ url('updateFeature/' . $feature->id) }}" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="row mb-3">
                    <div class="">
                        <label for="name" class="form-label">Feature Name<span class="text-danger" style="font-size: 17px;">*</span></label>
                        <input type="text" value="{{ $feature->name }}" name="name" placeholder="Brand Name" class="form-control" />
                    </div>
                    @if ($errors->has('name'))
                    <span class="text-danger text-left">{{ $errors->first('name') }}</span>
                    @endif
                </div> 
                <div class="row mb-3">
                    <div class="col-6">
                        <div>
                            <label class="form-label">Feature Icon<span class="text-danger" style="font-size: 17px;">*</span></label>
                            <input class="form-control" type="file" name="icon" id="home_logo" value="{{ $feature->icon }}">
                        </div>  
                        <br>
                        @if(isset($feature->icon) && $feature->icon != "")
                            <img src="{{ url('/images/features/'.$feature->icon) }}" style="width: 250px !important">
                        @endif
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Feature Description</label>
                    <textarea placeholder="Type here"  name="description" id="editor4" rows="4" cols="50">{{ $feature->description }}</textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">Short description</label>
                    <textarea placeholder="Type here" class="form-control" rows="4" name="short_description">
                        {{ $feature->short_description }}
                    </textarea>
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
</script>
@endsection
