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
            <h2 class="content-title card-title">Blog Posts</h2>
            <div class="lead">
                <a href="{{ route('createBlogPost') }}" class="btn btn-sm font-sm rounded btn-brand">Create Blog Post</a>
            </div>
        </div>
        <div>
            <h5 class="content-title card-title">Total Blog Posts: {{ count($blogPosts) }}</h5>
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
                            <th scope="col">Picture</th>
                            <th scope="col">Title</th>
                            <th scope="col">Description</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $count = 1 ?>
                         @foreach ($blogPosts as $blogPost)
                        <tr>
                            <td>{{ $count }}</td>
                            <td><img src="images/blogPosts/{{ $blogPost->picture }}" class="img-sm img-thumbnail" alt="Item" style="width: 150px !important;" /></td>
                            <td>{{ $blogPost->title }}</td>
                            <td>{{ $blogPost->description }}</td>
                            <td>{{ $blogPost->status }}</td>
                            <td>
                                <a href="{{ url('editBlogPost/' . $blogPost->id) }}" class="btn btn-sm font-sm rounded btn-brand"> <i class="material-icons md-edit"></i> Edit </a>
                                <a href="{{ url('deleteBlogPost/' . $blogPost->id) }}" class="btn btn-sm font-sm btn-light rounded" onclick="return confirm('Are you sure you want to delete this item?');"> <i class="material-icons md-delete_forever"></i> Delete </a>
                            </td>
                           
                        </tr>
                        <?php $count++; ?>

                         @endforeach
                    </tbody>
                </table>
                <div class="d-flex">
                    {{ $blogPosts->links() }}
                </div>
            </div>
            <!-- table-responsive //end -->
        </div>
        <!-- card-body end// -->
    </div>
</section>
@endsection
