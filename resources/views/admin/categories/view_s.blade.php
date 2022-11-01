<style>
.catagories_main{
    display:flex;
    color: #495058; 
    font-weight:600;
    /* justify-content: space-between;  */
    margin-top:20px; 
    align-items:center;
    padding-left:10px;
}
.catagories_main:hover{
    background-color:#f8f9fa;
}
.catagories_sub{
    display:flex;
    color: #495058; 
    font-weight:600;
    justify-content: space-between; 
    padding-left:50px; 
    align-items:center;

}
.catagories_sub:hover{
    background-color:#f8f9fa;
}
.level_one{
    justify-content:space-around;
    background-color: green;
    color: white;
    border-radius: 9px;
    margin-bottom:10px;
    display: flex;
    align-items: center;
    height: 70px;
}

.level_two{
    justify-content:space-around;
    background-color: red;
    color: white;
    border-radius: 9px;
    margin: 10px;
    margin-left: 64px;
    display: flex;
    align-items: center;
    height: 70px;
}
.level_three{
    background-color: orange;
    color: white;
    border-radius: 9px;
    margin: 10px;
    margin-left: 157px;
    display: flex;
    align-items: center;
    justify-content:space-around;
    height: 70px;
}
.select-tag{
    padding:5px;
    border-radius: 10px;
    margin-left: 20px;
    margin-right:8px;
}
.edit-btn{
    height:33px;
    width:75px;
}
.delete-btn{
    color:white !important;
}
.cat-image{
    width:100px;
}
</style>




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
        @php
        foreach ($categories as $key => $value) {
            @endphp
            <div class="level_one">
                <span style="width: 100px;">{{ $value->name }}</span> 
                <span><img src="images/categories/{{ $value->home_banner_img }}" class="img-sm img-thumbnail" alt="Item" style="width: 100px !important; height: 100%; object-fit: scale-down;" /></span>
                <span class=""><img src="images/categories/{{ $value->cover_img }}" class="img-sm img-thumbnail" alt="Item" style="width: 100px !important; height: 100%; object-fit: scale-down;" /></span>
                <span class=" badge rounded-pill {{ $value->status === 'active' ? 'alert-success' : 'alert-danger' }}">{{ strtoupper($value->status) }}</span>
                <select onchange="handleSort();" id="sort" class="select-tag ">  
                    <option value="">Select Sort</option>
                    <option value="1,{{$value->id}}" @if($value->sort_order == '1') selected="" @endif>1</option>
                    <option value="2,{{$value->id}}" @if($value->sort_order == '2') selected="" @endif>2</option>
                    <option value="3,{{$value->id}}" @if($value->sort_order == '3') selected="" @endif>3</option>
                    <option value="4,{{$value->id}}" @if($value->sort_order == '4') selected="" @endif>4</option>
                    <option value="5,{{$value->id}}" @if($value->sort_order == '5') selected="" @endif>5</option>
                </select>
                <span class="">
                    <a href="{{ url('editCategory/' . $value->id) }}" class="btn btn-sm font-sm rounded btn-brand edit-btn"> <i class="material-icons md-edit"></i> Edit </a>
                    <a href="{{ url('deleteCategory/' . $value->id) }}" class="btn btn-sm font-sm btn-light rounded delete-btn " onclick="return confirm('Are you sure you want to delete this item?');"> <i class="material-icons md-delete_forever"></i> Delete </a>
                </span>
                <span style="width: 100px;cursor: pointer;" onclick=submenu({{$value->id}})> <i class="icon material-icons md-shopping_bag"></i></span>

            </div>
            @php
            $level_one_categories = DB::table('categories')->where('parent_id',$value->id)->get();

            if(isset($level_one_categories) && count($level_one_categories) > 0){

                foreach ($level_one_categories as $key => $level_one_cat) {
                    @endphp
                    <div class="level_two hidden level_two_cat_{{$value->id}}">
                        <span class="">{{ $level_one_cat->name }}</span>
                        <span class=""><img src="images/categories/{{ $level_one_cat->home_banner_img }}" class="img-sm img-thumbnail" alt="Item" style="width: 100px !important; height: 100%; object-fit: scale-down;" /></span>
                        <span class=""><img src="images/categories/{{ $level_one_cat->cover_img }}" class="img-sm img-thumbnail" alt="Item" style="width: 100px !important; height: 100%; object-fit: scale-down;" /></span>
                        <span class=" badge rounded-pill {{ $level_one_cat->status === 'active' ? 'alert-success' : 'alert-danger' }}">{{ strtoupper($level_one_cat->status) }}</span>
                        <select onchange="handleSort();" id="sort" class="select-tag ">
                            <option value="">Select Sort</option>
                            <option value="1,{{$level_one_cat->id}}" @if($level_one_cat->sort_order == '1') selected="" @endif>1</option>
                            <option value="2,{{$level_one_cat->id}}" @if($level_one_cat->sort_order == '2') selected="" @endif>2</option>
                            <option value="3,{{$level_one_cat->id}}" @if($level_one_cat->sort_order == '3') selected="" @endif>3</option>
                            <option value="4,{{$level_one_cat->id}}" @if($level_one_cat->sort_order == '4') selected="" @endif>4</option>
                            <option value="5,{{$level_one_cat->id}}" @if($level_one_cat->sort_order == '5') selected="" @endif>5</option>
                        </select>
                        <span class="">
                            <a href="{{ url('editCategory/' . $level_one_cat->id) }}" class="btn btn-sm font-sm rounded btn-brand edit-btn"> <i class="material-icons md-edit"></i> Edit </a>
                            <a href="{{ url('deleteCategory/' . $level_one_cat->id) }}" class="btn btn-sm font-sm btn-light rounded delete-btn" onclick="return confirm('Are you sure you want to delete this item?');"> <i class="material-icons md-delete_forever"></i> Delete </a>
                        </span>

                    </div>
                    @php
                    $level_two_categories = DB::table('categories')->where('parent_id',$level_one_cat->id)->get();

                    if(isset($level_two_categories) && count($level_two_categories) > 0){

                        foreach ($level_two_categories as $key => $level_two_cat) {
                            @endphp
                            <div class="level_three hidden">
                                <span class="cat-image">{{ $level_two_cat->name }}</span>
                                <span class=""><img src="images/categories/{{ $level_two_cat->home_banner_img }}" class="img-sm img-thumbnail" alt="Item" style="width: 100px !important; height: 100%; object-fit: scale-down;" /></span>
                                <span class=""><img src="images/categories/{{ $level_two_cat->cover_img }}" class="img-sm img-thumbnail" alt="Item" style="width: 100px !important; height: 100%; object-fit: scale-down;" /></span>
                                <span class=" badge rounded-pill {{ $level_two_cat->status === 'active' ? 'alert-success' : 'alert-danger' }}">{{ strtoupper($level_two_cat->status) }}</span>
                                <select onchange="handleSort();" id="sort" class="select-tag ">
                                    <option value="">Select Sort</option>
                                    <option value="1,{{$level_two_cat->id}}" @if($level_two_cat->sort_order == '1') selected="" @endif>1</option>
                                    <option value="2,{{$level_two_cat->id}}" @if($level_two_cat->sort_order == '2') selected="" @endif>2</option>
                                    <option value="3,{{$level_two_cat->id}}" @if($level_two_cat->sort_order == '3') selected="" @endif>3</option>
                                    <option value="4,{{$level_two_cat->id}}" @if($level_two_cat->sort_order == '4') selected="" @endif>4</option>
                                    <option value="5,{{$level_two_cat->id}}" @if($level_two_cat->sort_order == '5') selected="" @endif>5</option>
                                </select>
                                <span class="">
                                    <a href="{{ url('editCategory/' . $level_two_cat->id) }}" class="btn btn-sm font-sm rounded btn-brand edit-btn"> <i class="material-icons md-edit"></i> Edit </a>
                                    <a href="{{ url('deleteCategory/' . $level_two_cat->id) }}" class="btn btn-sm font-sm btn-light rounded delete-btn" onclick="return confirm('Are you sure you want to delete this item?');"> <i class="material-icons md-delete_forever"></i> Delete </a>
                                </span>

                            </div>
                            @php
                        }
                    }
                }
            }
        }

        @endphp
       
            <!-- table-responsive //end -->
        </div>
        <!-- card-body end// -->

    </div>
    <script>
        
        function submenu(id){
            let classLists = document.getElementsByClassName(`level_two_cat_${id}`);
            for (let index = 0; index < classLists.length; index++) {
                if(document.getElementsByClassName(`level_two_cat_${id}`)[index].classList.contains('hidden')){
                    document.getElementsByClassName(`level_two_cat_${id}`)[index].classList.remove('hidden');
                }else {
                    document.getElementsByClassName(`level_two_cat_${id}`)[index].classList.add('hidden');
                }
            }
        }
    </script>
</section>
@endsection
