@extends('layouts.admin.app')


@section('content')
<section class="content-main">
    <div class="content-header">
        <div>
            <h1>{{ ucfirst($role->name) }} Role</h1>
            <h4>Assigned permissions</h4>
        </div>
    </div>
    <div class="card mb-4">
        <header class="card-header">
            <div class="row">
                <div class="">
                    <input type="text" placeholder="Search..." class="form-control" />
                </div>
            </div>
        </header>
        <!-- card-header end// -->
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Guard</th> 
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($rolePermissions as $permission)
                        <tr>
                            <td>{{ $permission->name }}</td>
                            <td>{{ $permission->guard_name }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="mt-4 mb-4">
                    <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-sm font-sm rounded btn-brand"> <i class="material-icons md-edit"></i> Edit </a>
                    <a href="{{ route('roles.index') }}" class="btn btn-sm font-sm btn-light rounded">Back</a>       
                </div>
            </div>
            <!-- table-responsive //end -->
        </div>
        <!-- card-body end// -->
    </div>
</section>
@endsection
