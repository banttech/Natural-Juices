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
            <h2 class="content-title card-title">Shopping Cart Offers</h2>
            <div class="lead">
                <a href="{{ route('createShoppingCartOffer') }}" class="btn btn-sm font-sm rounded btn-brand">Create Shopping Cart Offer</a>
            </div>
        </div>
        <div>
            <h5 class="content-title card-title">Total Shopping Cart Offers: {{ count($shoppingCartOffers) }}</h5>
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
                            <th scope="col">Offer Satus</th>
                            <th scope="col">DiscountType</th>
                            <th scope="col">Discount</th>
                            <th scope="col">Valid From</th>
                            <th scope="col">End Date</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $count = 1 ?>
                         @foreach ($shoppingCartOffers as $shoppingCartOffer)
                        <tr>
                            <td>{{ $count }}</td>
                            <td>{{ $shoppingCartOffer->name }}</td>
                            <td><span class="badge rounded-pill {{ $shoppingCartOffer->status === 'active' ? 'alert-success' : 'alert-danger' }}">{{ strtoupper($shoppingCartOffer->status) }}</span></td>
                            <td>{{ $shoppingCartOffer->discount_type }}</td>
                            <td>{{ $shoppingCartOffer->discount }}</td>
                            <td>{{ $shoppingCartOffer->valid_from }}</td>
                            <td>{{ $shoppingCartOffer->end_date }}</td>
                            <td>
                                <a href="{{ url('editShoppingCartOffer/' . $shoppingCartOffer->id) }}" class="btn btn-sm font-sm rounded btn-brand"> <i class="material-icons md-edit"></i> Edit </a>
                                <a href="{{ url('deleteShoppingCartOffer/' . $shoppingCartOffer->id) }}" class="btn btn-sm font-sm btn-light rounded" onclick="return confirm('Are you sure you want to delete this item?');"> <i class="material-icons md-delete_forever"></i> Delete </a>
                            </td>
                           
                        </tr>
                        <?php $count++; ?>

                         @endforeach
                    </tbody>
                </table>
                <div class="d-flex">
                    {{ $shoppingCartOffers->links() }}
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
