@extends('layouts.app')
<style type="text/css">
    .w3l-footer {
        margin-top: 200px;

    }
</style>
@section('content')
    <section class="content-main mt-80 mb-80">
        <div class="card mx-auto card-login">
            <div class="card-body">
                <h4 class="card-title mb-4">{{ __('Login') }}</h4>
                @include('layouts.partials.messages')
                <form method="POST" action="{{ route('admin') }}">
                    @csrf
                    <div class="mb-3">

                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                            name="email" value="{{ old('email') }}" required autocomplete="email" autofocus
                            placeholder="Email">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <!-- form-group// -->
                    <div class="mb-3">

                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                            name="password" required autocomplete="current-password" placeholder="*****">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <!-- form-group// -->
                    <div class="mb-3">
                        @if (Route::has('password.request'))
                            <a class="float-end font-sm text-muted" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif

                        <label class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                {{ old('remember') ? 'checked' : '' }} />
                            <span class="form-check-label">Remember</span>
                        </label>
                    </div>
                    <!-- form-group form-check .// -->
                    <div class="mb-4">
                        <button type="submit" class="btn btn-primary w-100">Login</button>
                    </div>
                    <!-- form-group// -->
                </form>


            </div>
        </div>
    </section>
@endsection
