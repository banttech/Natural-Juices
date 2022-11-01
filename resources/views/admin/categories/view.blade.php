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
            <h2 class="content-title card-title">Categories</h2>
            <div class="lead">
                <a href="{{ route('addCategory') }}" class="btn btn-sm font-sm rounded btn-brand">Add Category</a>
            </div>
        </div>
        <div>
            <h5 class="content-title card-title">Total Categories: {{ count($categories) }}</h5>
        </div>
    </div>
    <div class="card mb-4">
        @include('layouts.partials.messages')
        <!-- card-header end// -->
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Sr. No.</th>
                            <th scope="col">Category Name</th>
                            <th scope="col">Homepage Banner Image</th>
                            <th scope="col">Cover Image</th>
                            <th scope="col">Status</th>
                            <th scope="col">Order</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $count = 1 ?>
                         @foreach ($categories as $category)
                        <tr>
                            <td>{{ $count }}</td>
                            <td>{{ $category->name }}</td>
                            <td><img src="images/categories/{{ $category->home_banner_img }}" class="img-sm img-thumbnail" alt="Item" style="width: 200px !important;" /></td>
                            <td><img src="images/categories/{{ $category->cover_img }}" class="img-sm img-thumbnail" alt="Item" style="width: 200px !important;" /></td>
                            <td><span class="badge rounded-pill {{ $category->status === 'active' ? 'alert-success' : 'alert-danger' }}">{{ strtoupper($category->status) }}</span></td>
                            
                            <td>
                           
                                <select onchange="handleSort();" id="sort">
                                    <option value="">Select Sort</option>
                                    <option value="1,{{$category->id}}" @if($category->sort_order == '1') selected="" @endif>1</option>
                                    <option value="2,{{$category->id}}" @if($category->sort_order == '2') selected="" @endif>2</option>
                                    <option value="3,{{$category->id}}" @if($category->sort_order == '3') selected="" @endif>3</option>
                                    <option value="4,{{$category->id}}" @if($category->sort_order == '4') selected="" @endif>4</option>
                                    <option value="5,{{$category->id}}" @if($category->sort_order == '5') selected="" @endif>5</option>
                                </select>
                            </td>
                            <td>
                                <a href="{{ url('editCategory/' . $category->id) }}" class="btn btn-sm font-sm rounded btn-brand"> <i class="material-icons md-edit"></i> Edit </a>
                                <a href="{{ url('deleteCategory/' . $category->id) }}" class="btn btn-sm font-sm btn-light rounded" onclick="return confirm('Are you sure you want to delete this item?');"> <i class="material-icons md-delete_forever"></i> Delete </a>
                            </td>
                           
                        </tr>
                        <?php $count++; ?>

                         @endforeach
                    </tbody>
                </table>
                <div class="d-flex">
                    {{ $categories->links() }}
                </div>
            </div>
            <!-- table-responsive //end -->
        </div>
        <!-- card-body end// -->
    </div>
</section>
@endsection

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

s
<script type="text/javascript">
    var base_url = "<?=url('/');?>";
    // alert(base_url);
    function handleSort(){
        val = $('#sort :selected').val();
        var url = "<?php echo url('updateCategorySort')?>/"+val+""

        $.ajax({

              type: "POST",
              data: {"_token": "{{ csrf_token() }}"},
              url: url,
              success: function(response)
              {
                if(response === 'success'){
                    swal("Success!", "Updated Successfully!", "success");
                }else{
                    swal("Error!", "Please select another value!", "error");
                }

              }
        });
    }
</script>