<?php

namespace App\Repository;


use App\Models\Clinics;
use App\Models\Detail;
use App\Models\Doctor;
use App\Models\Pharmise;
use Illuminate\Support\Facades\DB;

class DoctorRepository implements DoctoerRepositoryInterface
{

    public function get_all_Doctoer()
    {
        $doctors = Doctor::all();
        return view('backend.Doctor.all_doctor', compact('doctors'));
    }

    public function create_Doctoer()
    {
        $clinic = Clinics::all();
        return view('backend.Doctor.create', compact('clinic'));
    }

    public function store_Doctoer($request)
    {
        DB::beginTransaction();

        try {
            $Doctoer = new Doctor();
            $Doctoer->name = $request->name;
            $Doctoer->clinic_id = $request->clinic_id;
            $Doctoer->save();

            // insert Details

            $Details= new Detail();
            $Details->email = $request->email;
            $Details->phone = $request->phone;
            $Details->specialization = $request->specialization;
            $Details->doctor_id =$Doctoer->id;
            $Details->save();

            DB::commit(); // insert data


            toastr()->success('success');
            return redirect()->route('all_doctor');
        }

        catch (Exception $e) {
            return redirect()->back()->with('error', 'Error updating record: '.$e->getMessage());
        }
    }

    public function show($id){
        $doctor = Detail::where('doctor_id',$id)->firstOrFail();;
        toastr()->info('You are show Doctor');
        return view('backend.Doctor.show',compact('doctor'));
    }


    public function edit_doctoer($id)
    {
        $clinic = Clinics::all();
        $doctor = Doctor::findorFail($id);
        $detail = $doctor->detail;
        return view('backend.Doctor.edit', compact('doctor', 'clinic','detail'));
    }


    public function update_doctoer($request ,$id)
    {

        DB::beginTransaction();

        try {
            // استرجع الطبيب وسجلات التفاصيل لتحديثها
            $doctor = DB::table('doctors')->where('id', $id)->first();
            $detail = DB::table('details')->where('doctor_id', $id)->first();

            // Update the doctor record
            DB::table('doctors')
                ->where('id', $id)
                ->update([
                    'name' => $request->name,
                    'clinic_id'=>$request->clinic_id,

                    // ... other fields to update
                ]);

            // Update the detail record
            DB::table('details')
                ->where('doctor_id', $id)
                ->update([
                    'specialization' => $request->specialization,
                    'phone' => $request->phone,
                    'email' =>$request->email,

                    // ... other fields to update
                ]);

            // Commit the transaction
            DB::commit();

            toastr()->warning('done editing');

            return redirect()->route('all_doctor');
        } catch (\Exception $e) {

            // Roll back the transaction

            DB::rollback();

            // Log the error or display an error message to the user
            return redirect()->back()->with('error', 'Error updating record: '.$e->getMessage());
        }

    }

    public function delete($id)
    {
        DB::beginTransaction();

        try {
            // Delete the doctor record
            DB::table('doctors')->where('id', $id)->delete();

            // حذف سجل التفاصيل المقابل
            DB::table('details')->where('doctor_id', $id)->delete();

            // Commit the transaction
            DB::commit();
            toastr()->error('Deleted','Deleted Doctoer');


            return redirect()->back();
        } catch (\Exception $e) {
            // Roll back the transaction
            DB::rollback();

            // Log the error or display an error message to the user
            return redirect()->back()->with('error', 'Error deleting doctor and details: '.$e->getMessage());
        }
    }

}
