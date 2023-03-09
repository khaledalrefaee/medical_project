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



    public function doctoer(){
        $doctors = Doctor::with(['detail', 'clinic'])->get();
        return response($doctors ,200);

    }

    public function get_All(){
        $All_Doctoer =Doctor::all();
        return response($All_Doctoer,200);
    }

}

