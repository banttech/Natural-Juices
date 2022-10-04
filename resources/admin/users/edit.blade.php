@extends('layouts.admin.app')

@section('content')
    <section class="content-main">
                <div class="row">
                    <div class="col-9">
                        <div class="content-header">
                            <h2 class="content-title">Update user</h2>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="card mb-4">
                            <div class="card-body">
                                <form method="post" action="{{ route('users.update', $user->id) }}">
                                    @method('patch')
                                    @csrf
                                    <div class="mb-4">
                                        <label for="name" class="form-label">Name</label>
                                        <input type="text" placeholder="Name" class="form-control" id="product_name" value="{{ $user->name }}" required />
                                        @if ($errors->has('name'))
                                            <span class="text-danger text-left">{{ $errors->first('name') }}</span>
                                        @endif
                                    </div>
                                    <div class="mb-4">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" placeholder="Email Address" class="form-control" id="product_name" value="{{ $user->email }}" required />
                                        @if ($errors->has('email'))
                                            <span class="text-danger text-left">{{ $errors->first('email') }}</span>
                                        @endif
                                    </div>
                                    <button type="submit" class="btn btn-sm font-sm rounded btn-brand">Update user</button>
                                    <a href="{{ route('users.index') }}" class="btn btn-sm font-sm btn-default">Cancel</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
@endsection
