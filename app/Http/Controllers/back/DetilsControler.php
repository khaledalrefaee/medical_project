<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use App\Models\Detail;
use App\Models\Doctor;
use Illuminate\Http\Request;


class DetilsControler extends Controller
{
    public function index(){
        $Doctoers=Doctor::all();
        $details = Detail::all();
        return view ('backend.Detail.allDetail',compact('details','Doctoers'));
    }

    public function create(Request $request){
        $Docter = Doctor::get();
        return view('backend.Detail.create',compact('Docter'));
    }

    public function store(Request $request){
        $request->validate([
             'doctor_id'                 =>     'required',
            'specialization'              =>     'required',
            'phone'                       =>     'required',
            'email'                       =>     'required',
            ]);
        Detail::create([
            'doctor_id'                      =>      $request->doctor_id ,
            'specialization'                  =>      $request->specialization,
            'phone'                           =>      $request->phone,
            'email'                           =>      $request->email,
        ]);
        toastr()->success('success');
        return redirect()->route('all_Details');
    }

    public function Filter_Doctoer(Request $request){

        $Doctoers=Doctor::all();
        $search=Detail::select('*')->where('doctor_id','=',$request->doctor_id)->get();
        return view('backend.Detail.allDetail',compact('Doctoers'))->withDetails($search);
      }

}
