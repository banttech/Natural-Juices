@extends('layouts.admin.app')
@section('content')
<section class="content-main">
    <div class="content-header">
        <div>
            <h3 class="card-title">Edit role and manage permissions.</h3>
            @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
        </div>
    </div>
    <div class="card mb-4">
        <form method="POST" action="{{ route('roles.update', $role->id) }}">
            @method('patch')
            @csrf
            <header class="card-header">
                <div class="row">
                    <div class="">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" value="{{ $role->name }}" name="name" required placeholder="Name" class="form-control" />
                    </div>
                </div>
            </header>
            <!-- card-header end// -->
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr> 
                                <th scope="col"><input type="checkbox" name="all_permission"></th>
                                <th scope="col">Name</th>
                                <th scope="col">Guard</th> 
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($permissions as $permission)
                            <tr>
                                <td>
                                    <input type="checkbox" 
                                    name="permission[{{ $permission->name }}]"
                                    value="{{ $permission->name }}"
                                    class='permission'
                                    {{ in_array($permission->name, $rolePermissions) 
                                    ? 'checked'
                                    : '' }}>
                                </td>
                                <td>{{ $permission->name }}</td>
                                <td>{{ $permission->guard_name }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <button type="submit" class="btn font-sm rounded btn-brand">Save Changes</button>
                    <a href="{{ route('roles.index') }}" class="btn btn-default">Back</a>
                </div>
                <!-- table-responsive //end -->
            </div>
        </form>
        <!-- card-body end// -->
    </div>
</section>
@endsection
