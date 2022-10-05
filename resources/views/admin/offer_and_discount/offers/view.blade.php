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
            <h2 class="content-title card-title">Offers</h2>
            <div class="lead">
                <a href="{{ route('addOffer') }}" class="btn btn-sm font-sm rounded btn-brand">Add Offer</a>
            </div>
        </div>
        <div>
            <h5 class="content-title card-title">Total Offers: {{ count($offers) }}</h5>
        </div>
    </div>
    <div class="card mb-4">
        
        <!-- card-header end// -->
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Sr. No.</th>
                            <th scope="col">Offer Image</th>
                            <th scope="col">Offer Category</th>
                            <th scope="col">Target URL</th>
                            <th scope="col">Status</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $count = 1 ?>
                         @foreach ($offers as $offer)
                        <tr>
                            <td>{{ $count }}</td>
                            <td><img src="images/offers/{{ $offer->offerImages[0]->img_name }}" class="img-sm img-thumbnail" alt="Item" style="width: 150px !important;" /></td>
                            <td>{{ $offer->offer_category }}</td>
                            <td>{{ $offer->target_url }}</td>
                            <td><span class="badge rounded-pill {{ $offer->status === 'active' ? 'alert-success' : 'alert-danger' }}">{{ strtoupper($offer->status) }}</span></td>
                            <td>
                                <a href="{{ url('editOffer/' . $offer->id) }}" class="btn btn-sm font-sm rounded btn-brand"> <i class="material-icons md-edit"></i> Edit </a>
                                <a href="{{ url('deleteOffer/' . $offer->id) }}" class="btn btn-sm font-sm btn-light rounded" onclick="return confirm('Are you sure you want to delete this item?');"> <i class="material-icons md-delete_forever"></i> Delete </a>
                            </td>
                           
                        </tr>
                        <?php $count++; ?>

                         @endforeach
                    </tbody>
                </table>
                <div class="d-flex">
                    {{ $offers->links() }}
                </div>
            </div>
            <!-- table-responsive //end -->
        </div>
        <!-- card-body end// -->
    </div>
</section>
@endsection
