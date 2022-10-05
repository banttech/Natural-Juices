@extends('layouts.admin.app')
@section('content')
<section class="content-main">
    <div class="content-header">
        <div>
            <h3 class="card-title">Add Roles & Permissions</h3>
        </div>
    </div>
    <div class="card mb-4">
        <form method="POST" action="{{ route('roles.store') }}">
            @csrf
            <header class="card-header">
                <div class="row">
                    <div class="">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" value="{{ old('name') }}"name="name" placeholder="Name" class="form-control" />
                    </div>
                </div>
            </header>
            <!-- card-header end// -->
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <!-- <label for="permissions" class="form-label">Assign Permissions</label> -->
                        <h5 class="card-title">Assign Permissions</h5>
                        <thead>
                            <tr>
                                <th scope="col" width="1%"><input type="checkbox" name="all_permission" id="selectAll"></th>
                                <th scope="col" width="20%">Name</th>
                                <th scope="col" width="1%">Guard</th> 
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($permissions as $permission)
                            <tr>
                                 <td>
                                    <input type="checkbox" 
                                    name="permission[{{ $permission->name }}]"
                                    value="{{ $permission->name }}"
                                    class='permission'>
                                </td>
                                <td>{{ $permission->name }}</td>
                                <td>{{ $permission->guard_name }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <button type="submit" class="btn btn-primary">Save user</button>
                    <a href="{{ route('users.index') }}" class="btn btn-default">Back</a>
                </div>
                <!-- table-responsive //end -->
            </div>
        </form>
        <!-- card-body end// -->
    </div>
</section>
@endsection

<!-- <script type="text/javascript">
$('#selectAll').click(function(e){
addAttr('')
alert('here');
var table= $(e.target).closest('table');
$('td input:checkbox',table).prop('checked',e.target.checked);
});
</script> -->
