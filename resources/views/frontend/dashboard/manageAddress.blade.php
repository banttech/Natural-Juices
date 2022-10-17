@extends('frontend.layouts.dashboard')
@section('content')
	<section class="content-main">
    <div class="content-header">
        <div>
            <h3 class="card-title">Manage Address</h3>
        </div>
    </div>
    <div class="card mb-4">
        @include('layouts.partials.messages')
        <form method="POST" action="#" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="row mb-3">
                    <div class="">
                        <label for="country" class="form-label">Country</label>
                        <select class="form-control" name="countries">
                            @foreach ($countries as $country)
                                <option value="{{ $country->id }}">{{ $country->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="">
                        <label for="full_name" class="form-label">Full Name<span class="text-danger" style="font-size: 17px;">*</span></label>
                        <input type="text" value="{{ old('full_name') }}" name="name" placeholder="Full Name" class="form-control" />
                        @if ($errors->has('full_name'))
                        <span class="text-danger text-left">{{ $errors->first('full_name') }}</span>
                        @endif
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="">
                        <label for="phone_no" class="form-label">Phone No<span class="text-danger" style="font-size: 17px;">*</span></label>
                        <input type="number" value="{{ old('phone_no') }}" name="name" placeholder="Phone No" class="form-control" />
                        @if ($errors->has('phone_no'))
                        <span class="text-danger text-left">{{ $errors->first('phone_no') }}</span>
                        @endif
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="">
                        <label for="postcode" class="form-label">Postcode<span class="text-danger" style="font-size: 17px;">*</span></label>
                        <input type="text" value="{{ old('postcode') }}" name="name" placeholder="Postcode" class="form-control" />
                        @if ($errors->has('postcode'))
                        <span class="text-danger text-left">{{ $errors->first('postcode') }}</span>
                        @endif
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="">
                        <label for="address_line_1" class="form-label">Address Line 1<span class="text-danger" style="font-size: 17px;">*</span></label>
                        <input type="text" value="{{ old('address_line_1') }}" name="address_line_1" placeholder="Address Line 1" class="form-control" />
                        @if ($errors->has('address_line_1'))
                        <span class="text-danger text-left">{{ $errors->first('address_line_1') }}</span>
                        @endif
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="">
                        <label for="address_line_2" class="form-label">Address Line 2</label>
                        <input type="text" value="{{ old('address_line_2') }}" name="Address Line 2" placeholder="address_line_2" class="form-control" />
                        @if ($errors->has('address_line_2'))
                        <span class="text-danger text-left">{{ $errors->first('address_line_2') }}</span>
                        @endif
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="">
                        <label for="town_City" class="form-label">Town/City<span class="text-danger" style="font-size: 17px;">*</span></label>
                        <input type="text" value="{{ old('town_City') }}" name="town_City" placeholder="Town/City" class="form-control" />
                        @if ($errors->has('town_City'))
                        <span class="text-danger text-left">{{ $errors->first('town_City') }}</span>
                        @endif
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="">
                        <label for="country" class="form-label">Country</label>
                        <input type="text" value="{{ old('country') }}" name="country" placeholder="Country" class="form-control" />
                        @if ($errors->has('country'))
                        <span class="text-danger text-left">{{ $errors->first('country') }}</span>
                        @endif
                    </div>
                </div>
                <div class="mb-3 mt-3">
                    <button type="submit" class="btn btn-sm btn-primary">Save</button>
                </div>
            </div>
        </form>
    </div>
</section>
@endsection
