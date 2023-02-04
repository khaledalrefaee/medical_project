<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use App\Models\Clinics;
use App\Models\Doctor;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function index(){
        $clinics = Clinics::all();
        $doctoer = Doctor::all();
        return view('backend.Doctoer.all_doctoer',compact('clinics'));
    }

    public function create(){
        return view('backend.clinics.create');
    }

    public function store(Request $request){

        $request->validate([
            'name'      =>   'required',
            'description'   => 'required',
        ]);
        Clinics::create([
            'name'              => $request->name,
            'description'      => $request->description,
        ]);

        toastr()->success('success');
        return redirect()->route('all.Clincs');
    }

    public function show($id){
        $clinic = Clinics::findOrFail($id);
        toastr()->info('You are show User');
        return view('backend.clinics.show',compact('clinic'));
    }

    public function Retreat(){
        return redirect()->route('all.Clincs');
    }

    public function edit($id){

        $clinic = Clinics::findorFail($id);
        return view('backend.clinics.edit',compact('clinic'));
    }


    public function update(Request $request,$id){
        $clinic =Clinics::findOrFail($id);
        $request->validate([
            'name'      =>   'required',
            'description'   => 'required',
        ]);
        $clinic->update([
            'name'              =>  $request->name,
            'description'       =>   $request->description,
        ]);

        toastr()->warning('You are edit Clinics');
        return redirect()->route('all.Clincs');
    }


    public function destroy(Request $request)
    {
        $clinic = Clinics::findOrfail($request->id);
        $clinic->delete();
        toastr()->error('you are delete clinic');
        return redirect()->route('all.Clincs');
    }
}
