<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use App\Models\Gender;
use App\Models\Reservation;
use App\Models\Waiting;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function index(){
        $Reservations =Reservation::all();
        $waiting =Waiting::all();
        return view('backend.Reservations.All_Reservation',compact('Reservations','waiting'));
    }
    public function create_waiting(){
        $gender =Gender::all();
        $doctor =Doctor::all();
        return view('backend.Reservations.create_waiting',compact('gender','doctor'));
    }
    public function create_appointment(){
        $times = [];
        for ($i = 0; $i < 96; $i++) {
            $times[] = Carbon::parse("00:00")->addMinutes(15 * $i)->format('H:i');
        }

        $gender =Gender::all();
        $doctor =Doctor::all();
        return view('backend.Reservations.create',compact('gender','doctor','times'));
    }
}
