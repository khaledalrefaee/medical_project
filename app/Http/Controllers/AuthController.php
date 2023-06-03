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
            $user = Auth::user();

            if ($user->status !== 'active') {
                // رسالة الخطأ عندما يكون الحساب غير نشط
                return redirect()->back()->withErrors([
                    'email' => 'Your account is not active. Please contact the administrator.',
                ]);
            }

            elseif ($user->hasRole(['Admin', 'employee'])) {
                // تسجيل الدخول الناجح للمشرفين والموظفين
                return redirect()->intended('/dashboard');
            } else {
                // رسالة الخطأ عندما لا يكون للمستخدم صلاحية الوصول
                return redirect()->back()->withErrors([
                    'email' => 'You are not authorized to access this page.',
                ]);
            }
        } else {
            // رسالة الخطأ عندما يكون البريد الإلكتروني أو كلمة المرور غير صحيحة
            return redirect()->back()->withErrors([
                'email' => 'There is an error in the email or password.',
            ]);
        }
    }


    public function logout()
    {
        Auth::logout();
        return redirect()->route('home');
    }
}
