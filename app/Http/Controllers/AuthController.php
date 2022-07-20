<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validatedData = $request->validate([
            'firstname_users' => 'required|string|max:255',
            'lastname_users' => 'required|string|max:255',
            'email_users' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);

        $user = User::create([
            'firstname_users' => $validatedData['firstname_users'],
            'lastname_users' => $validatedData['lastname_users'],
            'email_users' => $validatedData['email_users'],
            'password' => Hash::make($validatedData['password']),
        ]);

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'success' => 'true',
            'token' => $token,
            'token_type' => 'Bearer',
        ], 200);
    }
    public function login(Request $request)
    {

        if (!Auth::attempt($request->only('email_users', 'password'))) {
            return response()->json([
                'message' => 'Invalid login details'
            ], 401);
        }

        $user = User::where('email_users', $request['email_users'])->firstOrFail();

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'success' => true,
            'token' => $token,
            'token_type' => 'Bearer',
        ], 200);
    }

    public function me(Request $request)
    {
        return response()->json([
            'success' => true,
            'user' => $request->user(),

        ], 200);
    }

    public function logout()
    {
        auth()->user()->tokens()->delete();
        return response()->json([
            'message log out' => 'Le token a été supprimé'

        ]);
    }
}
