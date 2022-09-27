@extends('layouts.admin.app')
@section('content')
<section class="content-main">
    @include('layouts.partials.messages')
    <div class="content-header">
        <div>
            <a href="{{ route('roles.create') }}" class="btn btn-sm font-sm rounded btn-brand">Add New Role</a>
        </div>
    </div>
    <div class="card mb-4">
        <header class="card-header">
            <div class="row gx-3">
                <div class="col-lg-4 col-md-6 me-auto">
                    <input type="text" placeholder="Search..." class="form-control" />
                </div>
                <div class="col-lg-2 col-6 col-md-3">
                    <select class="form-select">
                        <option>Show 20</option>
                        <option>Show 30</option>
                        <option>Show 40</option>
                    </select>
                </div>
            </div>
        </header>
        <!-- card-header end// -->
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Sr No.</th>
                            <th scope="col">Role</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $count = 1;
                        @endphp
                        @foreach ($roles as $key => $role)
                        <tr>
                            <td>{{ $count }}</td>
                            <td>{{ $role->name }}</td>
                            <td>
                                <a href="{{ route('roles.show', $role->id) }}" class="btn btn-sm font-sm rounded btn-info"> <i class="material-icons md-edit"></i> Show </a>
                                <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-sm font-sm rounded btn-brand"> <i class="material-icons md-edit"></i> Edit </a>
                                <a href="{{ route('roles.destroy', $role->id) }}" class="btn btn-sm font-sm btn-light rounded"> <i class="material-icons md-delete_forever"></i> Delete </a>
                            </td>
                            <td>

                            </td>
                        </tr>
                        @php
                        $count++;
                        @endphp
                        @endforeach
                    </tbody>
                </table>
                <div class="d-flex">
                    {!! $roles->links() !!}
                </div>
            </div>
            <!-- table-responsive //end -->
        </div>
        <!-- card-body end// -->
    </div>
    <!-- card end// -->
    <div class="pagination-area mt-15 mb-50">
        <nav aria-label="Page navigation example">
            <ul class="pagination justify-content-start">
                <li class="page-item active"><a class="page-link" href="#">01</a></li>
                <li class="page-item"><a class="page-link" href="#">02</a></li>
                <li class="page-item"><a class="page-link" href="#">03</a></li>
                <li class="page-item"><a class="page-link dot" href="#">...</a></li>
                <li class="page-item"><a class="page-link" href="#">16</a></li>
                <li class="page-item">
                    <a class="page-link" href="#"><i class="material-icons md-chevron_right"></i></a>
                </li>
            </ul>
        </nav>
    </div>
</section>
@endsection
