<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAppointment;
use App\Models\Reservation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;


class ReservationController extends Controller
{
    public function index()
    {
        $reservations = Reservation::where('user_id', Auth::id())->orderBy('id', 'DESC')->get();

        return response()->json($reservations, 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'doctor_id' => 'required',
            'date' => 'required|date_format:Y-m-d',
            'time' => [
                'required',
                'date_format:H:i',
                Rule::unique('reservations')->where(function ($query) use ($request) {
                    return $query->where('doctor_id', $request->doctor_id)
                        ->where('date', $request->date);
                })
            ],
            'phone' => 'required',
            'birthday' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }


        $Reservation = new Reservation();
        $Reservation->user_id = Auth::id();
        $Reservation->name = $request->name;
        $Reservation->time = $request->time;
        $Reservation->date = $request->date;
        $Reservation->phone = $request->phone;
        $Reservation->birthday = $request->birthday;
        $Reservation->address = $request->address;
        $Reservation->doctor_id = $request->doctor_id;
        $Reservation->status = 'Pending';

        $Reservation->save();

        return response($Reservation, 200);
    }


    public function update(Request $request,$id)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'doctor_id' => 'required',
            'date' => 'required|date_format:Y-m-d',
            'time' => [
                'required',
                'date_format:H:i',
                Rule::unique('reservations')->where(function ($query) use ($request) {
                    return $query->where('doctor_id', $request->doctor_id)
                        ->where('date', $request->date)
                        ->where('id', '<>', $request->id);
                })
            ],
            'phone' => 'required',
            'birthday' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 400);
        }

        $reservation = Reservation::findOrFail($id);

        $reservation->name = $request->name;
        $reservation->time = $request->time;
        $reservation->date = $request->date;
        $reservation->phone = $request->phone;
        $reservation->birthday = $request->birthday;
        $reservation->address = $request->address;
        $reservation->doctor_id = $request->doctor_id;
        $reservation->status = 'Pending';

        $reservation->save();

        return response()->json($reservation, 200);


    }


    public function destroy($id)
    {
        $Reservation = Reservation::find($id);
        if(!$Reservation){
            return response(' the post not found',404);
        }
        $Reservation->delete();
        return response('successfully', 200);
    }
}
