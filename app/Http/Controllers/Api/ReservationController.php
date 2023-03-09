<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    public function index(){

    }

    public function store(Request $request){


        $Reservation= new Reservation();
        $Reservation->user_id =  Auth::id();
        $Reservation->name = $request->name;
        $Reservation->time = $request->time;
        $Reservation->date = $request->date;
        $Reservation->phone = $request->phone;
        $Reservation->birthday = $request->birthday;
        $Reservation->address =   $request->address;
        $Reservation->Doctor_id =$request->Doctor_id;
        $Reservation->status =   'Available';

        $Reservation->save();

        return response($Reservation,200);


    }

    public function update(Request $request){


    }
}
