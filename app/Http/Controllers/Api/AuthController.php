<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function store(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (!Auth::attempt($credentials)) {
            return response()->json([
                'message' => 'The provided credentials do not match our records.',
            ], 422);
        }

        /**
         * @var \App\Models\User $user
         */
        $user = Auth::user();

        $token = Str::random(60);
 
        $user->forceFill([
            'api_token' => hash('sha256', $token),
        ])->save();

        return response()->json([
            'message' => 'You have logged in successfully',
            'data' => [
                'authToken' => $token,
                'user' => $user,
            ],
        ]);
    }
}
