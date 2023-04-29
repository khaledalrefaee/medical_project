<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
{
    $filds = $request->validate([
        'email' => 'required|string',
        'password' => 'required|string'
    ]);

    $user = User::where('email', $filds['email'])->where('status', 'active')->first();

    if (!$user || !Hash::check($filds['password'], $user->password)) {
        return response(['message' => 'Error'], 401);
    }



    $token = $user->createToken('myappToken')->plainTextToken;
    $respons = [
        'user' => $user,
        'token' => $token
    ];

    return response($respons, 201);
}

    public function logout(Request $request){
        auth()->user()->tokens()->delete();
        return response()->json(['message' => 'User successfully signed out']);
        }

}
