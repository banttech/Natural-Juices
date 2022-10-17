@extends('frontend.layouts.dashboard')
@section('content')
	<section class="content-main">
    <div class="content-header">
        <div>
            <h3 class="card-title">Profile</h3>
        </div>
    </div>
    <div class="card mb-4">
        @include('layouts.partials.messages')
        <form method="POST" action="#" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="row mb-3">
                    <div class="">
                        <label for="first_name" class="form-label">First Name<span class="text-danger" style="font-size: 17px;">*</span></label>
                        <input type="text" value="{{ old('name') }}" name="name" placeholder="First Name" class="form-control" />
                        @if ($errors->has('first_name'))
                        <span class="text-danger text-left">{{ $errors->first('first_name') }}</span>
                        @endif
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="">
                        <label for="last_name" class="form-label">Last Name</label>
                        <input type="text" value="{{ old('last_name') }}" name="name" placeholder="Last Name" class="form-control" />
                        @if ($errors->has('last_name'))
                        <span class="text-danger text-left">{{ $errors->first('last_name') }}</span>
                        @endif
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="">
                        <label for="email_address" class="form-label">Email Address<span class="text-danger" style="font-size: 17px;">*</span></label>
                        <input type="text" value="{{ old('email_address') }}" name="name" placeholder="Email Address" class="form-control" />
                        @if ($errors->has('email_address'))
                        <span class="text-danger text-left">{{ $errors->first('email_address') }}</span>
                        @endif
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="">
                        <label for="mobile_no" class="form-label">Mobile No<span class="text-danger" style="font-size: 17px;">*</span></label>
                        <input type="number" value="{{ old('mobile_no') }}" name="name" placeholder="Mobile No" class="form-control" />
                        @if ($errors->has('mobile_no'))
                        <span class="text-danger text-left">{{ $errors->first('mobile_no') }}</span>
                        @endif
                    </div>
                </div>
                <div class="row mb-3">
                	<div class="col-6">
	                    <div>
	                        <label for="dob" class="form-label">Date of Birth<span class="text-danger" style="font-size: 17px;">*</span></label>
	                        <input type="date" name="dob" class="form-control" />
	                        @if ($errors->has('dob'))
	                        <span class="text-danger text-left">{{ $errors->first('dob') }}</span>
	                        @endif
	                    </div>
	                </div>
	                <div class="col-6">
	                    <label for="gender" class="form-label">Gender<span class="text-danger" style="font-size: 17px;">*</span></label>
	                    <div class="mt-2">
		                    <input type="radio" id="male" name="gender" value="Male">
		                    <label for="male">Male</label>
		                    <input type="radio" id="female" name="gender" value="Male" style="margin-left: 30px;">
		                    <label for="female">Female</label>
		                </div>
	                </div>
                </div>
                <div class="row mb-2">
                    <div>
                        <label class="form-label">Profile Image<span class="text-danger" style="font-size: 17px;">*</span></label>
                        <input class="form-control" type="file" name="profile_img" id="profile_img" value="{{ old('profile_img') }}">
                        @if ($errors->has('profile_img'))
                        <span class="text-danger text-left">{{ $errors->first('profile_img') }}</span>
                        @endif
                    </div>  
                </div>
                <span>You can upload photos that are *.jpeg, *.jpg, or *.png</span>
                <br />
                <span>Preferred dimension 300px X 300px" message after this image field.</span>
                <div class="mb-3 mt-3">
                    <button type="submit" class="btn btn-sm btn-primary">Save</button>
                </div>
            </div>
        </form>
    </div>
</section>
@endsection
