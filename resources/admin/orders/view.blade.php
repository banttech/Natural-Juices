@extends('layouts.admin.app')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                @if (Session::has('flash_message_error'))
                    <div class="alert alert-error alert-block" style="margin: 18px;">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{!! session('flash_message_error') !!}</strong>
                    </div>
                @endif
                @if (Session::has('flash_message_success'))
                    <div class="alert alert-success alert-block" style="margin: 18px;">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{!! session('flash_message_success') !!}</strong>
                    </div>
                @endif
                <div class="col-lg-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Category List</h4>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Email</th>
                                        <th>Phone Number</th>
                                        <th>Country</th>
                                        <th>State</th>
                                        <th>Address</th>
                                        <th>Post Code</th>
                                        <th>Status</th>
                                        <th>Grand Total</th>
                                        <th>Details</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders as $order)
                                        <tr>
                                            <td>{{ $order->first_name }}</td>
                                            <td>{{ $order->last_name }}</td>
                                            <td>{{ $order->email }}</td>
                                            <td>{{ $order->phone_number }}</td>
                                            <td>{{ $order->country }}</td>
                                            <td>{{ $order->state }}</td>
                                            <td>{{ $order->address }}</td>
                                            <td>{{ $order->post_code }}</td>
                                            <td>{{ $order->status }}</td>
                                            <td>{{ $order->grand_total }}</td>

                                            <td><button type="submit" class="btn btn-primary me-2"><a
                                                        href="{{ url('orderDetails/' . $order->id) }}"
                                                        style="color: #fff">Details</a></button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            {{ $orders->links() }}
        </div>
    </div>
@endsection
