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
            <h2 class="content-title card-title">Features</h2>
            <div class="lead">
                <a href="{{ route('addFeature') }}" class="btn btn-sm font-sm rounded btn-brand">Add Feature</a>
            </div>
        </div>
        <div>
            <h5 class="content-title card-title">Total Features: {{ count($features) }}</h5>
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
                            <th scope="col">Feature Name</th>
                            <th scope="col">Feature Icon</th>
                            <th scope="col">Description</th>
                            <th scope="col">Category</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $count = 1 ?>
                         @foreach ($features as $feature)
                        <tr>
                            <td>{{ $count }}</td>
                            <td>{{ $feature->name }}</td>
                            <td><img src="images/features/{{ $feature->icon }}" class="img-sm img-thumbnail" alt="Item" style="width: 150px !important;" />
                            </td>
                            <td>{{ $feature->short_description }}</td>
                            <td>
                                @foreach($feature->categories as $category)
                                    - {{ $category->name }} <br>
                                @endforeach
                            </td>
                            <td>
                                <a href="{{ url('editFeature/' . $feature->id) }}" class="btn btn-sm font-sm rounded btn-brand"> <i class="material-icons md-edit"></i> Edit </a>
                                <a href="{{ url('deleteFeature/' . $feature->id) }}" class="btn btn-sm font-sm btn-light rounded" onclick="return confirm('Are you sure you want to delete this item?');"> <i class="material-icons md-delete_forever"></i> Delete </a>
                            </td>
                           
                        </tr>
                        <?php $count++; ?>

                         @endforeach
                    </tbody>
                </table>
                <div class="d-flex">
                    {{ $features->links() }}
                </div>
            </div>
            <!-- table-responsive //end -->
        </div>
        <!-- card-body end// -->
    </div>
</section>
@endsection
