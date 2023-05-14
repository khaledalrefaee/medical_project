<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthDoctorController extends Controller
{
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email',
            'password' => 'required|string'
        ]);

        if ($validator->fails()) {
            $errors = $validator->getMessageBag()->all();
            return response()->json($errors, 400);
        }

        $doctor = Doctor::where('email',  $request->email)->first();;

        if (!$doctor || !Hash::check($request->password, $doctor->password)) {
            return response()->json('There is an error in the email or password ' , 401);
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
