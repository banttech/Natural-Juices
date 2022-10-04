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
            <h2 class="content-title card-title">Blog Categories</h2>
            <div class="lead">
                <a href="{{ route('createBlogCategory') }}" class="btn btn-sm font-sm rounded btn-brand">Create Blog Category</a>
            </div>
        </div>
        <div>
            <h5 class="content-title card-title">Total Categories: {{ count($blogCategories) }}</h5>
        </div>
    </div>
    <div class="card mb-4">
        
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Sr. No.</th>
                            <th scope="col">Category Name</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $count = 1 ?>
                         @foreach ($blogCategories as $blogCategory)
                        <tr>
                            <td>{{ $count }}</td>
                            <td>{{ $blogCategory->cat_name }}</td>
                            <td>
                                <a href="{{ url('editBlogCategory/' . $blogCategory->id) }}" class="btn btn-sm font-sm rounded btn-brand"> <i class="material-icons md-edit"></i> Edit </a>
                                <a href="{{ url('deleteBlogCategory/' . $blogCategory->id) }}" class="btn btn-sm font-sm btn-light rounded" onclick="return confirm('Are you sure you want to delete this item?');"> <i class="material-icons md-delete_forever"></i> Delete </a>
                            </td>
                           
                        </tr>
                        <?php $count++; ?>

                         @endforeach
                    </tbody>
                </table>
                <div class="d-flex">
                    {{ $blogCategories->links() }}
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
