<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <h1 class="card-header">Verify Your Email Address</h1>
                <div class="card-header">Use Your New Password For Next Time Login</b></div>
                <div class="card-header" style="font-size: 20px">You New Password is <b>"{{$newPass}}"</b></div>
                <div class="card-body mb-3">
                    @if (session('resent'))
                    <div class="alert alert-success" role="alert">
                        {{ __('A fresh verification link has been sent to your email address.') }}
                    </div>
                    @endif
                    <a href="http://banttechenergies.com/login" target="_blank" style="color: blue">Click Here to login</a>.
                </div>
            </div>
        </div>
    </div>
</div>