<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use App\Models\Clinics;
use App\Models\Doctor;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function index(){
        $doctorss = Doctor::all();
        return view('backend.Doctoer.all_doctoer',compact('doctorss'));
    }

    public function create(){
        $clinic = Clinics::all();
        return view('backend.Doctoer.create',compact('clinic'));
    }

    public function store(Request $request){

        $request->validate([
            'clinic_id'      =>     'required',
            'name'           =>     'required',
        ]);
        Doctor::create([
            'clinic_id'         =>      $request->clinic_id ,
            'name'              =>      $request->name,
        ]);

        toastr()->success('success');
        return redirect()->route('all_doctoer');
    }

    public function show($id){
        $doctoer = Doctor::findOrFail($id);
        toastr()->info('You are show Doctoer');
        return view('backend.Doctoer.show',compact('doctoer'));
    }

    public function Retreat(){
        return redirect()->route('all_doctoer');
    }

    public function edit($id){

        $clinc = Clinics::all();
        $doctoer = Doctor::findorFail($id);
        return view('backend.Doctoer.edit',compact('doctoer','clinc'));
    }


    public function update(Request $request,$id){
        $doctoer =Doctor::findOrFail($id);
        $request->validate([
            'clinic_id'      =>           'required',
            'name'           =>           'required',
        ]);
        $doctoer->update([
            'clinic_id'         =>      $request->clinic_id ,
            'name'              =>       $request->name,
        ]);

        toastr()->warning('You are edit Doctoer');
        return redirect()->route('all_doctoer');
    }


    public function destroy(Request $request)
    {
        $doctoer = Doctor::findOrfail($request->id);
        $doctoer->delete();
        toastr()->error('you are delete Doctoer');
        return redirect()->route('all_doctoer');
    }


    public function search($name){
        return 'ww';
//        $search= Doctor::where('name','like','%'.$name.'%');
//        return view('backend.Doctoer.all_doctoer',compact('search'));
    }
}
