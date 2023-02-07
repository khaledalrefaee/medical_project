<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class ProfileContoller extends Controller
{
    public function index(Request $request , $id)
    {
        $user = User::findOrFail($id);

        return response([$user] ,200);

    }
}
