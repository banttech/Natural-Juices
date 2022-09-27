<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Auth;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }


    public function register(Request $request){

         if ($request->isMethod('post')){

            request()->validate([

                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                // 'password' => ['required', 'string', 'min:5','max:8','regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#%]).*$/'],
                'password' => ['required', 'string', 'min:5','max:8'],
                'confirm-password' => ['required', 'string','same:password'],
            ],[
                'email.required' => 'Email is required',
                'email.unique' => 'Email already exist',
                'password.min' => 'Password must be 5-8 characters long',
                'password.max' => 'Password must be 5-8 characters long',
                // 'password.regex' => 'Password contain letters and numbers, atleast one character in capital letter, and must not contain spaces & special characters',
                'confirm-password.same' => 'Password should be same',
            ]);

            $data = $request->all();
            $user = $this->create($data);

            $credentials =[
                'email' => $data['email'],
                'password' => $data['password'],
            ];

            if($user){

                Auth::attempt($credentials);
                return redirect('/')->with('register_success','The provided credentials do not match our records');
            }

            return redirect()->back()->with('error','Something went wrong!');
        }

        return view('auth.register');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [

            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            // 'password' => ['required', 'string', 'min:5','max:8','regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#%]).*$/'],
            'password' => ['required', 'string', 'min:5','max:8'],
            'confirm-password' => ['required', 'string','same:password'],
        ],[
            'email.required' => 'Email is required',
            'password.min' => 'Password must be 5-8 characters long',
            'password.max' => 'Password must be 5-8 characters long',
            // 'password.regex' => 'Password contain letters and numbers, atleast one character in capital letter, and must not contain spaces & special characters',
            'confirm-password.same' => 'Password should be same',
        ]);

         
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        $user->assignRole('customer');
        return $user;
    }
}
