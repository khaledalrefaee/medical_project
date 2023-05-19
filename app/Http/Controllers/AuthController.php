<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            // تم تسجيل الدخول بنجاح
            return redirect()->intended('/dashboard');
        } else {
            // فشل تسجيل الدخول
            return redirect()->back()->withErrors([
                'email' => 'There is an error in the email or password. ',
            ]);
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('home');
    }
}
