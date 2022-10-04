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
            <h2 class="content-title card-title">Users List</h2>
        </div>
        <div>
            <h5 class="content-title card-title">Total Customers: {{ count($customers) }}</h5>
        </div>
    </div>
    <div class="card mb-4">
        <form action="{{ url('searchCustomer') }}" method="GET">
            <header class="card-header">
                <div class="row gx-3">
                    <div class="col-lg-6 col-md-3 me-auto">
                        <input type="search" name="input_value" placeholder="Search..." value="{{ $inputValue }}" class="form-control" />
                    </div>
                    <div class="col-lg-4 col-6 col-md-3">
                        <input type="date" name="search_by_date" class="form-control" value="{{ $searchDate }}" />
                    </div>
                    <div class="col-lg-2 col-6 col-md-3">
                        <button type="submit" class="btn btn-primary">Search</button>
                    </div>
                </div>
            </header>
        </form>
        <!-- card-header end// -->
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                       <tr>
                            <th scope="col">Sr. No.</th>
                            <th scope="col">Customer Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Total Order</th>
                            <th scope="col">Registered On</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $count = 1 ?>
                         @foreach ($customers as $customer)
                        <tr>
                            <td>{{ $count }}</td>
                            <td>{{ $customer->name }}</td>
                            <td>{{ $customer->email  }}</td>
                            <td>{{ count($customer['orders']) }}</td>
                            <td>{{ $customer->created_at  }}</td>
                            <td>
                                <a href="{{ url('deleteCustomer/' . $customer->id) }}" class="btn btn-sm font-sm btn-light rounded" onclick="return confirm('Are you sure you want to delete this item?');"> <i class="material-icons md-delete_forever"></i> Delete </a>
                            </td>
                        </tr>
                        <?php $count++; ?>

                         @endforeach
                    </tbody>
                </table>
                <div class="d-flex">
                    {!! $customers->links() !!}
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
