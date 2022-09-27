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
            <h2 class="content-title card-title">Brands</h2>
            <div class="lead">
                <a href="{{ route('addBrand') }}" class="btn btn-sm font-sm rounded btn-brand">Add Brand</a>
            </div>
        </div>
        <div>
            <h5 class="content-title card-title">Total Brands: {{ count($brands) }}</h5>
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
                            <th scope="col">Brand Name</th>
                            <th scope="col">Home Page Logo</th>
                            <th scope="col">Brand Cover Image</th>
                            <th scope="col">Category</th>
                            <th scope="col">Status</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $count = 1 ?>
                         @foreach ($brands as $brand)
                        <tr>
                            <td>{{ $count }}</td>
                            <td>{{ $brand->name }}</td>
                            <td><img src="images/brands/{{ $brand->home_logo }}" class="img-sm img-thumbnail" alt="Item" style="width: 150px !important;" /></td>
                            <td><img src="images/brands/{{ $brand->cover_img }}" class="img-sm img-thumbnail" alt="Item" style="width: 150px !important;" /></td>
                            <td>
                                @foreach($brand->categories as $category)
                                    - {{ $category->name }} <br>
                                @endforeach
                            </td>
                            <td><span class="badge rounded-pill {{ $category->status === 'active' ? 'alert-success' : 'alert-danger' }}">{{ strtoupper($category->status) }}</span></td>

                            <td>
                                <a href="{{ url('editBrand/' . $brand->id) }}" class="btn btn-sm font-sm rounded btn-brand"> <i class="material-icons md-edit"></i> Edit </a>
                                <a href="{{ url('deleteBrand/' . $brand->id) }}" class="btn btn-sm font-sm btn-light rounded" onclick="return confirm('Are you sure you want to delete this item?');"> <i class="material-icons md-delete_forever"></i> Delete </a>
                            </td>
                           
                        </tr>
                        <?php $count++; ?>

                         @endforeach
                    </tbody>
                </table>
                <div class="d-flex">
                    {{ $brands->links() }}
                </div>
            </div>
            <!-- table-responsive //end -->
        </div>
        <!-- card-body end// -->
    </div>
</section>
@endsection
