<?php

namespace App\Repository;


use App\Models\Clinics;
use App\Models\Detail;
use App\Models\Doctor;
use App\Models\Pharmise;
use Illuminate\Support\Facades\DB;

class ClinceRepository implements ClinceRepositoryInterface
{
    public function index(){
        $clinics = Clinics::all();
        return view('backend.clinics.all_clinics',compact('clinics'));
    }

    public function store($request)
    {
        try {
            $Clince = new Clinics();
            $Clince->name = $request->name;
            $Clince->description = $request->description;
            $Clince->save();
            toastr()->success('success create clince','success');
            return redirect()->route('all.Clincs');
        } catch (Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function show($id)
    {
        $clinic = Clinics::findOrFail($id);
        toastr()->info('you are show clince','show');
        return view('backend.clinics.show',compact('clinic'));
    }


    public function update($request){
        try {
            $Clince = Clinics::findOrFail($request->id);
            $Clince->name = $request->name;
            $Clince->description = $request->description;
            $Clince->save();
            toastr()->warning('You are edit Clinics','worning');
            return redirect()->route('all.Clincs');
        } catch (Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }
    public function delete($id)
    {
        $clinic = Clinics::findOrFail($id);

        // Get all doctors associated with the clinic
        $doctors = $clinic->doctor;


        // Delete all doctors and their details associated with the clinic
        foreach ($doctors as $doctor) {
            if ($doctor->detail) {
                $doctor->detail()->delete();
            }
            $doctor->delete();
        }

        // Delete the clinic itself
        $clinic->delete();

        toastr ()->error('messages Delete Clinic','success');
        return redirect()->route('all.Clincs');

    }

}
