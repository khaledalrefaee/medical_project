<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use App\Models\Clinics;
use Illuminate\Http\Request;

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
        $clinics = Clinics::findOrFail($id)->first();
        toastr()->info('You are show User');
        return view('backend.clinics.show',compact('clinics'));
    }

    public function Retreat(){
        return view('backend.clinics.show');
    }

}
