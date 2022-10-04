@extends('layouts.admin.app')
@section('content')

<section class="content-main">
    <div class="content-header">
        <div>
            <h3 class="card-title">Create Blog Category</h3>
        </div>
    </div>
    <div class="card mb-4">
        <form method="POST" action="{{ url('storeBlogCategory') }}" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="row mb-3">
                    <div class="">
                        <label for="name" class="form-label">Category Name<span class="text-danger" style="font-size: 17px;">*</span></label>
                        <input type="text" value="{{ old('cat_name') }}" name="cat_name" placeholder="Category Name" class="form-control" />
                        @if ($errors->has('cat_name'))
                            <span class="text-danger text-left">{{ $errors->first('cat_name') }}</span>
                        @endif
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Parent Category Name</label>
                    <select class="form-select" name="parent_cat_id" value="{{ old('parent_cat_name') }}">
                        <option value="" selected="true" disabled="true">Select Parent Category</option>
                        @foreach ($parnetCategories as $parnetCategory)
                            <option value="{{ $parnetCategory->id }}">{{ $parnetCategory->cat_name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <button type="submit" class="btn btn-sm btn-primary">Create</button>
                </div>
            </div>
        </form>
    </div>
</section>
@endsection
