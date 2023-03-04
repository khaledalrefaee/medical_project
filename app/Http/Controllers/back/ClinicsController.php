<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use App\Models\Clinics;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Yoeunes\Toastr\Facades\Toastr;


class ClinicsController extends Controller
{
    public function index(){
        $clinics = Clinics::all();
        return view('backend.clinics.all_clinics',compact('clinics'));
    }

    public function create(){
        return view('backend.clinics.create');
    }

    public function store(Request $request){

         $request->validate([
                'name'      =>   'required|unique:Clinics',

        ]);
        Clinics::create([
            'name'              => $request->name,
             'description'      => $request->description,
        ]);

        toastr()->success('success create clince','success');
        return redirect()->route('all.Clincs');
    }

    public function show($id){
        $clinic = Clinics::findOrFail($id);
        toastr()->info('you are show clince','show');
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
        ]);
        $clinic->update([
            'name'              =>  $request->name,
            'description'       =>   $request->description,
        ]);

        toastr()->warning('You are edit Clinics','worning');
        return redirect()->route('all.Clincs');
    }


    public function destroy(Request $request)
    {
        $MyDoter_id = Doctor::where('clinic_id', $request->id)->pluck('clinic_id');

        if ($MyDoter_id->count() == 0) {

            $clinic = Clinics::findOrFail($request->id)->delete();
            toastr ()->error('messages Delete Clinic','success');
            return redirect()->route('all.Clincs');
        } else {

            toastr()->error('There is a relationship with another table Doctor' ,'worning');
            return redirect()->route('all.Clincs');

        }

    }

}
