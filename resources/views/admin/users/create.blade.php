@extends('layouts.admin.app')

@section('content')
<section class="content-main">
    <div class="content-header">
        <div>
            <h3 class="card-title">Add new user</h3>
        </div>
    </div>
    <div class="card mb-4">
        <form method="POST" action="{{ route('roles.store') }}">
            @csrf
            <div class="card-body">
                <div class="row mb-3">
                    <div class="">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" value="{{ old('name') }}"name="name" placeholder="Name" class="form-control" required />
                        @if ($errors->has('name'))
                        <span class="text-danger text-left">{{ $errors->first('name') }}</span>
                        @endif
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" value="{{ old('email') }}"name="email" placeholder="Email" class="form-control" required />
                        @if ($errors->has('email'))
                        <span class="text-danger text-left">{{ $errors->first('email') }}</span>
                        @endif
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" value="{{ old('name') }}"name="name" placeholder="Name" class="form-control" required />
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="mb-3">
                    <button type="submit" class="btn btn-sm btn-primary">Save user</button>
                    <a href="{{ route('users.index') }}" class="btn btn-sm btn-default">Back</a>
                </div>
                <!-- table-responsive //end -->
            </div>
        </form>
        <!-- card-body end// -->
    </div>
</section>
@endsection
