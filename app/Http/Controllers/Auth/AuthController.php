<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class AuthController extends Controller
{
        public function login(Request $request)
        {
            $validatedData = $request->validate([
                'email' => 'required|string|email',
                'password' => 'required|string',
            ]);

            if (Auth::attempt(['email' => $request->email, 'password' => $request->password,'role_name'=>'Admin'])) {
                return view('backend.index');
            }
            return view('error.error');
        }


    public function logout()
    {
        Auth::logout();

        return redirect()->route('login');
    }

}
