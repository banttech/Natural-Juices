@extends('frontend.dashboard.index')
@section('myDashboardContent')
<div id="account-detail">
    <div class="card">
        <div class="card-header">
            <h5>Account Details</h5>
        </div>
        <div class="card-body">
            <form method="post" name="enq">
                <div class="row">
                    <div class="form-group col-md-6">
                        <label>First Name <span class="required">*</span></label>
                        <input class="form-control" name="fname" type="text" />
                    </div>
                    <div class="form-group col-md-6">
                        <label>Last Name</label>
                        <input class="form-control" name="lname" type="text" />
                    </div>
                    <div class="form-group col-md-12">
                        <label>Email Address <span class="required">*</span></label>
                        <input class="form-control" name="email" type="email" />
                    </div>
                    <div class="form-group col-md-12">
                        <label>Mobile No <span class="required">*</span></label>
                        <input class="form-control" name="mobile_no" type="number" />
                    </div>
                    <div class="form-group col-md-6">
                        <label>Date of Birth <span class="required">*</span></label>
                        <input class="form-control" name="password" type="date" />
                    </div>
                    <div class="form-group col-md-6">
                        <label>Gender <span class="required">*</span></label>
                        <div class="mt-2">
                            <input type="radio" name="gender" value="Male" style="height: 12px; width: 7%;">
                            <label for="male">Male</label>
                            <input type="radio" name="gender" value="Male" style="margin-left: 30px; height: 12px; width: 7%;">
                            <label for="female">Female</label>
                        </div>
                    </div>
                    <div class="form-group col-md-12">
                        <label>Profile Image <span class="required">*</span></label>
                        <input class="form-control" name="password" type="file" />
                    </div>
                    <span>You can upload photos that are *.jpeg, *.jpg, or *.png</span>
                    <br />
                    <span>Preferred dimension 300px X 300px" message after this image field.</span>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-fill-out submit font-weight-bold" name="submit" value="Submit">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
