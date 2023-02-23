<?php

namespace App\Repository;


use App\Models\Clinics;
use App\Models\Doctor;
use App\Models\Pharmise;

class DoctorRepository implements DoctoerRepositoryInterface
{

    public function get_all_Doctoer()
    {
        $doctorss = Doctor::all();
        return view('backend.Doctoer.all_doctoer', compact('doctorss'));
    }

    public function create_Doctoer()
    {
        $clinic = Clinics::all();
        return view('backend.Doctoer.create', compact('clinic'));
    }

    public function store_Doctoer($request)
    {
        try {
            $Doctoer = new Doctor();
            $Doctoer->name = $request->name;
            $Doctoer->clinic_id = $request->clinic_id;
            $Doctoer->save();

            toastr()->success('success');
            return redirect()->route('all_doctoer');
        } catch (Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function edit_doctoer($id)
    {
        $clinc = Clinics::all();
        $doctoer = Doctor::findorFail($id);
        return view('backend.Doctoer.edit', compact('doctoer', 'clinc'));
    }

    public function update_doctoer($request)
    {
        try {
            $Doctoer = Doctor::findOrFail($request->id);
            $Doctoer->name = $request->name;
            $Doctoer->clinic_id = $request->clinic_id;
            $Doctoer->save();
            toastr()->success(trans('messages.Update'));
            return redirect()->route('all_doctoer');
        } catch (Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }

    public function DeleteDoctoer($request){
        $doctoer = Doctor::findOrFail($request->id);
        $doctoer->delete();
        toastr()->error('messages.Delete');
        return redirect()->route('all_doctoer');

    }
}
