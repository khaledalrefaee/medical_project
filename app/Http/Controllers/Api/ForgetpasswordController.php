<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\ForgetPasswordRequest;
use  App\Notifications\ResetPasswordVerificationNotifications;

class ForgetpasswordController extends Controller
{
    public function forgotpassword(ForgetPasswordRequest $request){
        $input = $request->only('email');
        $user =User::where('email' ,$input)->first();
        $user->notify(new ResetPasswordVerificationNotifications());
        $success['success'] =true;
        return response()->json($success ,200);
    
      }
}
