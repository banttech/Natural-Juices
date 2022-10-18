@extends('frontend.dashboard.index')
@section('myDashboardContent')
	<section class="content-main">
    <div class="card mb-4">
        @include('layouts.partials.messages')
        <form method="POST" action="#" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="row mb-3">
                    <div class="">
                        <label for="old_pass" class="form-label">Old Password<span class="text-danger" style="font-size: 17px;">*</span></label>
                        <input type="password" value="{{ old('old_pass') }}" name="name" placeholder="Old Password" class="form-control" />
                        @if ($errors->has('old_pass'))
                        <span class="text-danger text-left">{{ $errors->first('old_pass') }}</span>
                        @endif
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="">
                        <label for="new_pass" class="form-label">New Password<span class="text-danger" style="font-size: 17px;">*</span></label>
                        <input type="password" value="{{ old('new_pass') }}" name="name" placeholder="New Password" class="form-control" />
                        @if ($errors->has('new_pass'))
                        <span class="text-danger text-left">{{ $errors->first('new_pass') }}</span>
                        @endif
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="">
                        <label for="confirm_pass" class="form-label">Confirm Password<span class="text-danger" style="font-size: 17px;">*</span></label>
                        <input type="password" value="{{ old('confirm_pass') }}" name="name" placeholder="Confirm Password" class="form-control" />
                        @if ($errors->has('confirm_pass'))
                        <span class="text-danger text-left">{{ $errors->first('confirm_pass') }}</span>
                        @endif
                    </div>
                </div>
                <div class="mb-3 mt-3">
                    <button type="submit" class="btn btn-sm btn-primary">Update</button>
                </div>
            </div>
        </form>
    </div>
</section>
@endsection
