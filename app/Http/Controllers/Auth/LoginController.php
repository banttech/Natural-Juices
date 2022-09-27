<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
use Illuminate\Http\Request;
use App\Role;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request){

        if ($request->isMethod('post')){

            $credentials = $request->validate([
                'email' => ['required', 'email'],
                'password' => ['required'],
            ]);

            if (!Auth::attempt($credentials)) {

                return redirect()->back()->with('error','The provided credentials do not match our records');
            } 
            
            if(Auth::user()->hasRole('webadmin') || Auth::user()->hasRole('admin')){

                Auth::logout();
                return redirect()->back()->with('error','The provided credentials do not match our records');
            }
            return redirect('/');
        }

        return view('auth.login');
    }
    public function adminLogin(Request $request){

        // dd(Auth::id());

        if ($request->isMethod('post')){

            $credentials = $request->validate([
                'email' => ['required', 'email'],
                'password' => ['required'],
            ]);

            if (!Auth::attempt($credentials)) {

                return redirect()->back()->with('error','The provided credentials do not match our records');
            }

            if(Auth::user()->hasRole('customer')){

                Auth::logout();
                return redirect()->back()->with('error','The provided credentials do not match our records');

            }

            //     return redirect()->back()->with('error','The provided credentials do not match our records');
            // }
            return redirect('/dashboard');
        }

        return view('auth.adminLogin');
    }

    public function logout() {

        if(Auth::user()->hasRole('customer')){
            Auth::logout();
            return redirect('/login');
        }else{
            Auth::logout();
            return redirect('/admin');
        }
    }
}
