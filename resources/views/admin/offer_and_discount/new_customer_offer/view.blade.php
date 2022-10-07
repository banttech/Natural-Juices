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
            <h2 class="content-title card-title">Newly SignUp Customer Offer</h2>
            <div class="lead">
                <a href="{{ route('createNewCustomerOffer') }}" class="btn btn-sm font-sm rounded btn-brand">Add Newly SignUp Customer Offer</a>
            </div>
        </div>
        <div>
            <h5 class="content-title card-title">Total Newly SignUp Customer Offer: {{ count($newCustomerOffers) }}</h5>
        </div>
    </div>
    <div class="card mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Sr. No.</th>
                            <th scope="col">Offer Name</th>
                            <th scope="col">Status</th>
                            <th scope="col">DiscountType</th>
                            <th scope="col">Discount</th>
                            <th scope="col">Valid From</th>
                            <th scope="col">End Date</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $count = 1 ?>
                         @foreach ($newCustomerOffers as $newCustomerOffer)
                        <tr>
                            <td>{{ $count }}</td>
                            <td>{{ $newCustomerOffer->name }}</td>
                            <td><span class="badge rounded-pill {{ $newCustomerOffer->status === 'active' ? 'alert-success' : 'alert-danger' }}">{{ strtoupper($newCustomerOffer->status) }}</span></td>
                            <td>{{ $newCustomerOffer->discount_type }}</td>
                            <td>{{ $newCustomerOffer->discount }}</td>
                            <td>
                                @php
                                    echo date('Y-m-d',strtotime($newCustomerOffer->valid_from));
                                @endphp
                            </td>
                            <td>
                                @php
                                    echo date('Y-m-d',strtotime($newCustomerOffer->end_date));
                                @endphp
                            </td>
                            <td>
                                <a href="{{ url('editNewCustomerOffer/' . $newCustomerOffer->id) }}" class="btn btn-sm font-sm rounded btn-brand"> <i class="material-icons md-edit"></i> Edit </a>
                                <a href="{{ url('deleteNewCustomerOffer/' . $newCustomerOffer->id) }}" class="btn btn-sm font-sm btn-light rounded" onclick="return confirm('Are you sure you want to delete this item?');"> <i class="material-icons md-delete_forever"></i> Delete </a>
                            </td>
                           
                        </tr>
                        <?php $count++; ?>

                         @endforeach
                    </tbody>
                </table>
                <div class="d-flex">
                    {{ $newCustomerOffers->links() }}
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
