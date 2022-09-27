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
            <h2 class="content-title card-title">Products</h2>
            <div class="lead">
                <a href="{{ route('createProduct') }}" class="btn btn-sm font-sm rounded btn-brand">Add Product</a>
            </div>
        </div>
        <div>
            <h5 class="content-title card-title">Total Products: {{ count($products) }}</h5>
            <div class="lead">
                <a href="{{ route('searchProduct') }}" class="btn btn-sm font-sm rounded btn-brand">Search Products</a>
            </div>
        </div>
    </div>

    <div class="card mb-4">
        <!-- card-header end -->
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Sr. No.</th>
                            <th scope="col">Image</th>
                            <th scope="col">Product</th>
                            <th scope="col">Price (£)</th>
                            <th scope="col">Status</th>
                            <th scope="col">Stock</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $count = 1 ?>
                         @foreach ($products as $product)
                        <tr>
                            <td>{{ $count }}</td>
                            <td><img src="images/products/{{ $product->feature_img[0]->image_name }}" class="img-sm img-thumbnail" alt="Item" style="width: 200px !important;" /></td> 
                            <td>{{ $product->prod_name }}</td>
                            <td>{{ $product->reg_sel_price }}</td>
                            <td><span class="badge rounded-pill {{ $product->prod_status === 'active' ? 'alert-success' : 'alert-danger' }}">{{ strtoupper($product->prod_status) }}</span></td>
                            <td>@if($product->prod_stock_unit != "") {{ $product->prod_stock_unit }} @else 0 @endif</td>    
                            <td>
                                <a href="{{ url('editProduct/' . $product->id) }}" class="btn btn-sm font-sm rounded btn-brand"> <i class="material-icons md-edit"></i> Edit </a>
                                <a href="{{ url('deleteProduct/' . $product->id) }}" class="btn btn-sm font-sm btn-light rounded" onclick="return confirm('Are you sure you want to delete this item?');"> <i class="material-icons md-delete_forever"></i> Delete </a>
                            </td>
                        </tr>
                        <?php $count++; ?>

                         @endforeach
                    </tbody>
                </table>
                <div class="d-flex">
                    {{ $products->links() }}
                </div>
            </div>
            <!-- table-responsive //end -->
        </div>
        <!-- card-body end// -->
    </div>
</section>
@endsection
