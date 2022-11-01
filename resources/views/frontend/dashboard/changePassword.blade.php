@extends('frontend.dashboard.index')
@section('myDashboardContent')
<div id="account-detail">
    <div class="card">
        <div class="card-header">
            <h5>Change Password</h5>
        </div>
        <div class="card-body">
            <form method="post" name="enq">
                @csrf
                <div class="row">
                    <div class="form-group col-md-12">
                        <label>Old Password <span class="required">*</span></label>
                        <input class="form-control" name="fname" type="password" />
                    </div>
                    <div class="form-group col-md-12">
                        <label>New Password</label>
                        <input class="form-control" name="lname" type="text" />
                    </div>
                    <div class="form-group col-md-12">
                        <label>Confirm Password</label>
                        <input class="form-control" name="lname" type="text" />
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-fill-out submit font-weight-bold" name="submit" value="Submit">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
