@extends('layouts.admin.app')
@section('content')
    <section class="content-main">
        @if(Session::has('flash_message_error'))
            <div class="alert alert-error alert-block" style="margin: 18px;">
                <button type="button" class="close" data-dismiss="alert">×</button> 
                <strong>{!! session('flash_message_error') !!}</strong>
            </div>
        @endif   
        @if(Session::has('flash_message_success'))
        <div class="alert alert-success alert-block" style="margin: 18px;">
            <button type="button" class="close" data-dismiss="alert">×</button> 
            <strong>{!! session('flash_message_success') !!}</strong>
        </div>
        @endif
    <div class="content-header">
        <div>
            <h2 class="content-title card-title">Coupon Codes</h2>
            <div class="lead">
                <a href="{{ route('createCouponCode') }}" class="btn btn-sm font-sm rounded btn-brand">Add Coupon Code Offer</a>
            </div>
        </div>
        <div>
            <h5 class="content-title card-title">Total Coupon Codes: {{ count($couponCodes) }}</h5>
        </div>
    </div>
    <div class="card mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Sr. No.</th>
                            <th scope="col">Coupon Code</th>
                            <th scope="col">Coupon Type</th>
                            <th scope="col">Coupon Status</th>
                            <th scope="col">Coupon Validity</th>
                            <th scope="col">Usage Allowed</th>
                            <th scope="col">Limit Per Customer</th>
                            <th scope="col">Posted On</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $count = 1 ?>
                         @foreach ($couponCodes as $couponCode)
                        <tr>
                            <td>{{ $count }}</td>
                            <td>{{ $couponCode->coupon_code }}</td>
                            <td>{{ $couponCode->coupon_type }}</td>
                            <td>{{ $couponCode->coupon_status }}</td>
                            <td>{{ $couponCode->end_date }}</td>
                            <td>{{ $couponCode->usage_allowed }}</td>
                            <td>{{ $couponCode->limit_per_customer }}</td>
                            <td>{{ $couponCode->created_at }}</td>
                            <td>
                                <a href="{{ url('editCouponCode/' . $couponCode->id) }}" class="btn btn-sm font-sm rounded btn-brand"> <i class="material-icons md-edit"></i> Edit </a>
                                <a href="{{ url('deleteCouponCode/' . $couponCode->id) }}" class="btn btn-sm font-sm btn-light rounded" onclick="return confirm('Are you sure you want to delete this item?');"> <i class="material-icons md-delete_forever"></i> Delete </a>
                            </td>
                           
                        </tr>
                        <?php $count++; ?>

                         @endforeach
                    </tbody>
                </table>
                <div class="d-flex">
                    {{ $couponCodes->links() }}
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
