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
        $doctoer= Doctor::with(['clinics','detail'])->get();
       return response($doctoer ,200);
    }


//    public function showdoctor($id){
//        return Doctor::with('clinics')->find($id);
//        return [
//            'msg'=>'ok'
//        ];
//    }
}

