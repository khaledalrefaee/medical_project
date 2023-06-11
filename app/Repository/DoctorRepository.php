<?php

namespace App\Repository;


use App\Models\Clinics;
use App\Models\Detail;
use App\Models\Doctor;
use App\Models\Pharmise;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DoctorRepository implements DoctoerRepositoryInterface
{

    public function get_all_Doctoer()
    {
        $doctors = Doctor::all();
        $clinic=Clinics::all();
        return view('backend.Doctor.all_doctor', compact('doctors','clinic'));
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
            $Doctoer->email = $request->email_1;
            $Doctoer->password =Hash::make($request->password);
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
        $doc = Doctor::findOrFail($id);
        $reservation = $doc->reservation()->get();; // الحصول على حجوزات الطبيب
        $doctor = Detail::where('doctor_id', $id)->first();
        toastr()->info('You are show Doctor');
        return view('backend.Doctor.show',compact('doc','doctor','reservation'));
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
        $doctor = Doctor::findorFail($id);
        $request->validate([
            'clinic_id'      =>     'required',
            'name'           =>     'required',
            'email_1'         =>      'required||unique:doctors,email,'.$id,
            'email'         =>      'required||unique:details,email,'.$id,
            'phone'         =>      'required||regex:/^9\d{8}$/',
            'specialization'  =>'required',
        ]);
        try {


            $doctor->name = $request->name;
            $doctor->email = $request->email_1;
            $doctor->password = Hash::make($request->password);
            if (!empty($request->password)) {
                $doctor->password = Hash::make($request->password);
            }else{
                unset($doctor->password);
            }
            $doctor->clinic_id = $request->clinic_id;
            // ... other fields to update
            $doctor->save();

            $detail = Detail::where('doctor_id', $id)->first();

            $detail->specialization = $request->specialization;
            $detail->phone = $request->phone;
            $detail->email = $request->email;
            // ... other fields to update
            $detail->save();

            toastr()->warning('done editing');
            return redirect()->route('all_doctor');
        } catch (\Exception $e) {
            // Log the error or display an error message to the user
            return redirect()->back()->with('error', 'Error updating record: '.$e->getMessage());
        }

    }

    public function delete($id)
    {

        try {

            $doctor = Doctor::findorFail($id);
            $doctor->detail()->delete();
            $doctor->reservation()->delete();
            $doctor->waiting()->delete();
            $doctor->delete();

            toastr()->error('Deleted','Deleted Doctoer');

            return redirect()->back();
        } catch (\Exception $e) {
            // Log the error or display an error message to the user
            return redirect()->back()->with('error', 'Error deleting doctor and details: '.$e->getMessage());
        }
    }

    public function show_destroy()
    {
        $deletedDetails  = Doctor::onlyTrashed()
            ->with(['clinic' => function ($query) {
                $query->withTrashed('clinic');
            },
                'detail' => function ($query) {
                $query->onlyTrashed();
            }])
            ->get();
        return view('backend.Doctor.show_Doctor_Delete',compact('deletedDetails'));
    }




    public function Filter_Clinces($request)
    {
        $clinic=Clinics::all();
        $search=Doctor::select('*')->where('clinic_id','=',$request->clinic_id)->get();
        return view('backend.Doctor.all_doctor',compact('clinic'))->withDetails($search);
    }

    public function restoreDoctor($id)
    {
    $deletedDetails = Doctor::withTrashed()->findOrFail($id);
    $deletedDetails->restore();
    $deletedDetails->detail()->withTrashed()->restore();
    // استعادة جميع المواعيد المحذوفة المرتبطة بالدكتور
    $deletedDetails->reservation()->withTrashed()->restore();
    $deletedDetails->clinic()->withTrashed()->restore();

    return redirect()->back()->with('success', 'تم استعادة الدكتور بنجاح');
    }


}
