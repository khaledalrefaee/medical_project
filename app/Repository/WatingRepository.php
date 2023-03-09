<?php

namespace App\Repository;


use App\Models\Clinics;
use App\Models\Detail;
use App\Models\Doctor;
use App\Models\Gender;
use App\Models\Pharmise;
use App\Models\Reservation;
use App\Models\Waiting;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class WatingRepository implements WatingRepositoryInterface
{
   public function getAll_wating_reservation()
   {
       $Reservations =Reservation::all();
       $waitings =Waiting::all();

       return view('backend.Reservations.All_Reservation',compact('Reservations','waitings'));
   }

   public function create_wating()
   {
       $gender =Gender::all();
       $doctor =Doctor::all();
       $clinc =Clinics::all();
       return view('backend.Reservations.create_waiting',compact('gender','doctor','clinc'));
   }

    public function storewaiting($request)
    {
        try {
            $Waiting = new Waiting();
            $Waiting->name = $request->name;
            $Waiting->gender_id = $request->gender_id;
            $Waiting->address = $request->address;
            $Waiting->birthday = $request->birthday;
            $Waiting->doctor_id = $request->doctor_id;

            $Waiting->save();
            toastr()->success('success create Waiting','success');
            return redirect()->route('Reservations.all');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Error deleting doctor and details: '.$e->getMessage());
        }
    }
    public function show_waiting($id){
        $waiting= Waiting::findOrFail($id);
        toastr()->info('You are show User');
        return view('backend.Reservations.show_Waiting',compact('waiting'));
    }

    public function edit_waiting($id){
        $waiting = Waiting::findorFail($id);
        $gender =Gender::all();
        $doctor =Doctor::all();
        $clinc= Clinics::all();
        return view('backend.Reservations.edit_Waiting',compact('waiting','gender','doctor','clinc'));
    }
    public function update_waiting($request){
        try {
            $Waiting = Waiting::findOrFail($request->id);
            $Waiting->name = $request->name;
            $Waiting->gender_id = $request->gender_id;
            $Waiting->address = $request->address;
            $Waiting->birthday = $request->birthday;
            $Waiting->doctor_id = $request->doctor_id;

            $Waiting->save();
            toastr()->warning('You are edit Waiting','warning');
            return redirect()->route('Reservations.all');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Error deleting doctor and details: '.$e->getMessage());
        }
    }
    public function delete_wating($id){
        $waiting = Waiting::findOrFail($id);
        $waiting->delete();
        toastr()->error('messages.Delete');
        return redirect()->route('Reservations.all');
    }


    ///
    ///


    public function create_appointment(){
        $times = [];
        for ($i = 0; $i < 96; $i++) {
            $times[] = Carbon::parse("00:00")->addMinutes(15 * $i)->format('H:i');
        }
        $doctor =Doctor::all();
        return view('backend.Reservations.create',compact('doctor','times'));
    }

    public function Store_appointment($request){
        try {
            $Reservation= new Reservation();
            $Reservation->user_id =  Auth::id();
            $Reservation->name = $request->name;
            $Reservation->time =$request->time;
            $Reservation->date = $request->date;
            $Reservation->phone = $request->phone;
            $Reservation->birthday = $request->birthday;
            $Reservation->address =   $request->address;
            $Reservation->doctor_id = $request->doctor_id;
            $Reservation->status =   'Pending';

            $Reservation->save();
            toastr()->success('success create Reservation','success');
            return redirect()->route('Reservations.all');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Error deleting Reservation: '.$e->getMessage());
        }
    }

    public function Show_appointment($id){
        $Reservation= Reservation::findOrFail($id);
        return view('backend.Reservations.show_appointment',compact('Reservation'));
    }

    public function edit_appointment($id){
        $Reservation = Reservation::findorFail($id);
        $times = [];
        for ($i = 0; $i < 96; $i++) {
            $times[] = Carbon::parse("00:00")->addMinutes(15 * $i)->format('H:i');
        }
        $doctor =Doctor::all();
        return view('backend.Reservations.edit_appointment',compact('Reservation','doctor','times'));
    }
    public function update_appointment($request){
        try {
            $Reservation = Reservation::findOrFail($request->id);

            $Reservation->name = $request->name;
            $Reservation->time =$request->time;
            $Reservation->date = $request->date;
            $Reservation->phone = $request->phone;
            $Reservation->birthday = $request->birthday;
            $Reservation->address =   $request->address;
            $Reservation->doctor_id = $request->doctor_id;
            $Reservation->diagnosis = $request->diagnosis;

            $Reservation->save();
            toastr()->warning('You are edit appointment','warning');
            return redirect()->route('Reservations.all');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Error deleting doctor and details: '.$e->getMessage());
        }
    }

    public function delete_appointment($id){
        $Reservation = Reservation::findOrFail($id);
        $Reservation->delete();
        toastr()->error('messages.Delete.Reservation');
        return redirect()->route('Reservations.all');
    }

}
