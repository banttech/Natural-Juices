@extends('frontend.dashboard.index')
@section('myDashboardContent')
<div id="account-detail">
    <div class="card">
        <div class="card-header">
            <h5>Manage Address</h5>
        </div>
        <div class="card-body">
            <form method="post" name="enq">
                @csrf
                <div class="row">
                    <div class="form-group col-md-12">
                        <label>Country</label>
                        <select class="form-control" name="countries">
                            <option value="" selected disabled>Select Country</option>
                            @foreach ($countries as $country)
                                <option value="{{ $country->id }}">{{ $country->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-12">
                        <label>Full Name <span class="required">*</span></label>
                        <input class="form-control" name="fname" type="text" placeholder="Full Name" />
                    </div>
                    <div class="form-group col-md-12">
                        <label>Phone No <span class="required">*</span></label>
                        <input class="form-control" name="fname" type="number" placeholder="Phone No" />
                    </div>
                    <div class="form-group col-md-12">
                        <label>Postcode <span class="required">*</span></label>
                        <input class="form-control" name="fname" type="text" placeholder="Postcode" />
                    </div>
                    <div class="form-group col-md-12">
                        <label>Address Line 1 <span class="required">*</span></label>
                        <input class="form-control" name="fname" type="text" placeholder="Address Line 1" />
                    </div>
                    <div class="form-group col-md-12">
                        <label>Address Line 2 <span class="required">*</span></label>
                        <input class="form-control" name="fname" type="text" placeholder="Address Line 2" />
                    </div>
                    <div class="form-group col-md-12">
                        <label>Town/City <span class="required">*</span></label>
                        <input class="form-control" name="fname" type="text" placeholder="Town/City" />
                    </div>
                    <div class="form-group col-md-12">
                        <label>Country <span class="required">*</span></label>
                        <input class="form-control" name="fname" type="text" placeholder="Country" />
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-fill-out submit font-weight-bold" name="submit" value="Submit">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
