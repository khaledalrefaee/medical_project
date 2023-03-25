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
        $reservations = Reservation::where('user_id', Auth::id())->orderBy('id', 'DESC')
            ->with('doctor')->get();

        return response()->json($reservations, 200);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'doctor_id' => 'required|exists:doctors,id',
            'date' => 'required|date_format:Y-m-d',
            'time' => [
                'required',
                'date_format:H:i',
                Rule::unique('reservations')->where(function ($query) use ($request) {
                    return $query->where('doctor_id', '!=', $request->doctor_id)
                        ->where('date', $request->date)
                        ->where('status', 'Pending');
                })
            ],
            'phone' => 'required|regex:/^9\d{8}$/',
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
        $reservation = Reservation::findOrFail($id);

        if ($reservation->status === 'Pending') {
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'doctor_id' => 'required|exists:doctors,id',
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
                'phone' => 'required|regex:/^9\d{8}$/',
                'birthday' => 'required',
            ]);
            if ($validator->fails()) {
                return response()->json($validator->errors(), 400);
            }


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
        else{
            return response()->json(['message' => 'Reservation cannot be updated because it is not in Pending status.'], 400);
        }


    }


    public function destroy($id)
    {

        $Reservation = Reservation::find($id);
        if ($Reservation->status === 'Pending') {
            if (!$Reservation) {
                return response(' the Reservation not found', 404);
            }
            $Reservation->delete();
            return response('successfully', 200);
        }
        else{
            return response()->json(['message' => 'Reservation cannot be deleted because it is not in Pending status.'], 400);
        }

    }
}
