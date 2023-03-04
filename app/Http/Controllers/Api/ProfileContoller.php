<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ProfileContoller extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user()->load(['gender', 'role']);

        return response()->json([
            'name' => $user->name,
            'email' => $user->email,
            'phone' => $user->phone,
            'address' => $user->address,
            'birthday' => $user->birthday,
            'gender' => $user->gender->name,
            'role' => $user->role->name,
        ]);

    }
}
