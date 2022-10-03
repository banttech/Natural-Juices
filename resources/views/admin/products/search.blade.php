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
        </div>
    </div>

    <div class="card mb-4">
        @include('layouts.partials.messages')
        <form action="{{ url('searchProduct') }}" method="GET">
            <header class="card-header">
                <div class="row gx-3">
                    <div class="col-lg-4 col-md-3 me-auto">
                        <input type="search" name="prod_name" placeholder="Search by product name" class="form-control" value="{{ $prod_name }}" />
                    </div>
                    <div class="col-lg-2 col-6 col-md-3">
                        <select class="form-select" name="category" id="categoryValue" onchange="changeCategory(this.value)">
                            <option selected="true" disabled="disabled">Category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                     <div class="col-lg-2 col-6 col-md-3">
                        <select class="form-select" name="sub_category" id="sub_category">
                            <option selected="true" disabled="disabled">Sub-Category</option>
                        </select>
                    </div>
                    <div class="col-lg-2 col-6 col-md-3">
                        <select class="form-select" name="brand">
                            <option selected="true" disabled="disabled">Brands</option>
                            @foreach ($brands as $brand)
                                <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-lg-2 col-6 col-md-3">
                        <select class="form-select" name="status">
                            <option selected="true" disabled="disabled">Status</option>
                            <option value="active">Active</option>
                            <option value="inactive">Inactive</option>
                        </select>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary mt-3">Search</button>
            </header>
        </form>
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

<script type="text/javascript">
    function changeCategory(value) {
        let route = "{{ route('getSubCategories') }}";
        let token = "{{ csrf_token()}}";

        $.ajax({
            url: route,
            type: 'POST',
            data: {
                _token:token,
                val: value
            },
            success: function(response) {
                console.log(response);
                $('#sub_category').html('');
                $('#sub_category').html(response);
            },
            error: function(xhr) {
                //Do Something to handle error
            }
        });
    }
</script>
@endsection
