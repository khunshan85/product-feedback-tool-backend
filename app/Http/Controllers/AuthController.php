<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $credentials = $request->validate([
            'name' => 'required|string|max:256',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        User::create($credentials);

        return response()->noContent();
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (! Auth::attempt($credentials)) {

            return response()->json(['message' => 'Email & Password does not match with our record.'], 401);
        }

        $user = Auth::user();
        $user->tokens()->delete();
        $token = $user->createToken('default');

        return response()->json([
            'user' => $user,
            'token' => $token->plainTextToken,
        ])->withCookie(Cookie::make('token', $token->plainTextToken));
    }
}
