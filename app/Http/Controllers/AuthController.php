<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api')->except(['login','register']);
    }

    public function login(Request $request)
    {
        $creds = $request->only('email', 'password');
        if(!Auth::attempt($creds)) {
            return response()->json([
                'login_status' => 'error',
                'message' => 'Unauthorized',
            ], 401);
        } else {
            $user = Auth::user();
            $token = $user->createToken('AuthToken')->accessToken;
            return response()->json([
                'login_status' => 'success',
                'user' => $user,
                'token' => $token,
                'role' => $user->role,
            ]);
        }
    }

    public function logout()
    {
        Auth::logout();
        return response()->json([
            'status' => 'success',
            'message' => 'Successfully logged out',
        ]);
    }
}
