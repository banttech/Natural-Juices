@extends('layouts.admin.app')
@section('content')
<section class="content-main">
    <div class="content-header">
        <div>
            <h3 class="card-title">Add Offer Category</h3>
        </div>
    </div>
    <div class="card mb-4">
        <form method="POST" action="{{ url('storeOfferCategory') }}">
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
                    <button type="submit" class="btn btn-sm btn-primary">Create</button>
                </div>
            </div>
        </form>
    </div>
</section>
@endsection
