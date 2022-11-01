@extends('frontend.dashboard.index')
@section('myDashboardContent')
<div id="orders">
    <div class="card">
        <div class="card-header">
            <h3 class="mb-0">Your Orders</h3>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Order No</th>
                            <th>Order Status</th>
                            <th>Total Amount</th>
                            <th>Ordered On</th>
                            <th>Payment Status</th>
                            <th>Reorder</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><a href="{{url('/invoice/1357')}}" class="btn-small d-block">#1357</a></td>
                            <td>Processing</td>
                            <td>$125.00</td>
                            <td>March 45, 2020</td>
                            <th>Approved</th>
                            <td><a href="#" class="btn-small d-block">View</a></td>
                        </tr>
                        <tr>
                            <td><a href="#" class="btn-small d-block">#1357</a></td>
                            <td>Processing</td>
                            <td>$125.00</td>
                            <td>March 45, 2020</td>
                            <th>Approved</th>
                            <td><a href="#" class="btn-small d-block">View</a></td>
                        </tr>
                        <tr>
                            <td><a href="#" class="btn-small d-block">#1357</a></td>
                            <td>Processing</td>
                            <td>$125.00</td>
                            <td>March 45, 2020</td>
                            <th>Approved</th>
                            <td><a href="#" class="btn-small d-block">View</a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection