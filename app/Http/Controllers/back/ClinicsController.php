<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use App\Models\Clinics;

class ClinicsController extends Controller
{
    public function index(){
        $clinics = Clinics::all();
        return view('backend.clinics.all_clinics',compact('clinics'));
    }
}
