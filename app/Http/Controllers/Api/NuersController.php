<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\Nurses;
use Illuminate\Http\Request;

class NuersController extends Controller
{
    public function index(){
        $nuers = Nurses::get();
        return response($nuers ,200);
    }

    public function doctor(){
        return Doctor::with('clinics')->get();
        return [
          'msg'=>'ok'
        ];
    }
    public function showdoctor($id){
        return Doctor::with('clinics')->find($id);
        return [
            'msg'=>'ok'
        ];
    }
}

