<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class ResetPasswordController extends Controller
{
/*
|--------------------------------------------------------------------------
| Password Reset Controller
|--------------------------------------------------------------------------
|
| This controller is responsible for handling password reset requests
| and uses a simple trait to include this behavior. You're free to
| explore this trait and override any methods you wish to tweak.
|
*/

use ResetsPasswords;

/**
* Where to redirect users after resetting their password.
*
* @var string
*/

public function resetPassword($token)
{
    return view('auth.passwords.reset', ['token' => $token]);
}

public function updatePassword(Request $request)
{
    $request->validate([
        'email' => 'required|email|exists:users',
        'password' => 'required|string|min:8|confirmed',
        'password_confirmation' => 'required',
    ]);

    $user = User::where('email', $request->email)
    ->update(['password' => Hash::make($request->password)]);

    DB::table('password_resets')->where(['email'=> $request->email])->delete();

    return redirect()->route('login')->with('success','Your password has been changed!');

}



protected $redirectTo = RouteServiceProvider::HOME;
}
