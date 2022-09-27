<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ForgotPasswordController extends Controller
{
/*
|--------------------------------------------------------------------------
| Password Reset Controller
|--------------------------------------------------------------------------
|
| This controller is responsible for handling password reset emails and
| includes a trait which assists in sending these notifications from
| your application to your users. Feel free to explore this trait.
|
*/

public function forgotPassword(Request $request)
{
    $token = "test";
    $newPass = Str::random(10);

    User::where('email',$request->email)->update(['password' => Hash::make($newPass)]); 

    echo view('email.verify',compact('token', 'newPass'));

    // $token = Str::random(40);

    // Mail::send('email.verify', ['token' => $token], function($message) use($request){
    //     $message->to($request->email);
    //     $message->subject('Reset Password Notification');
    // });

    // return back()->with('message', 'We have e-mailed your password reset link!');
}

use SendsPasswordResetEmails;
}
