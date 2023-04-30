<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthDoctorController extends Controller
{
    public function login(Request $request)
    {
        $filds = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string'
        ]);

        $doctor = Doctor::where('email', $filds['email'])->first();

        if (!$doctor || !Hash::check($filds['password'], $doctor->password)) {
            return response(['message' => 'Error'], 401);
        }



        $token = $doctor->createToken('myappToken')->plainTextToken;
        $respons = [
            'doctor' => $doctor,
            'token' => $token
        ];

        return response($respons, 201);
    }

    public function profile(Request $request)
    {
        $doctor = Auth::user()->load(['detail']);

        return response()->json([
            'name' => $doctor->name,
            'email' => $doctor->email,

            'specialization' => $doctor->detail->specialization,
            'phone' => $doctor->detail->phone,
            'Contact email' => $doctor->detail->email,
        ]);

    }
}
