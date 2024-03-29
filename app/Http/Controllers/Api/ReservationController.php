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

        if ($reservations->isEmpty()) {
            return response('No bookings found', 401);
        } else {
            return response()->json($reservations, 200);
        }
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'time' => [
                'required',
                'date_format:H:i',
                Rule::unique('reservations')->where(function ($query) use ($request) {
                    return $query->where('doctor_id',  $request->doctor_id)
                        ->where('date', $request->date);
                })
            ],
            'doctor_id' => 'required|exists:doctors,id',
            'date' => 'required|date_format:Y-m-d|after_or_equal:today',
            'phone' => 'required|regex:/^9\d{8}$/',
            'birthday' => 'required',
            'latitude' => 'required',
            'longitude' => 'required',
        ]);

        if ($validator->fails()) {
            $errors = $validator->getMessageBag()->all();
            return response()->json($errors, 400);
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
        $Reservation->latitude = $request->latitude;
        $Reservation->longitude = $request->longitude;
        $Reservation->status = 'Pending';

        $Reservation->save();



        return response($Reservation, 200);
    }


    public function edit($id)
    {
        $reservation = Reservation::with('doctor')->find($id);

        if (!$reservation) {
            return response()->json('The reservation was not found', 404);
        }

        if ($reservation->status === 'Pending') {
            return response()->json($reservation);
        } else {
            return response()->json('Reservation cannot be updated because it is not in Pending status.', 500);
        }
    }


    public function update(Request $request,$id)
    {
        $reservation = Reservation::find($id);
        if (!$reservation) {
            return response()->json('the Reservation not found', 404);
        }

        if ($reservation->status === 'Pending') {
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'doctor_id' => 'required|exists:doctors,id',
                'date' => 'required|date_format:Y-m-d|after_or_equal:today',
                'time' => [
                    'required',
                    'date_format:H:i',
                    Rule::unique('reservations')->where(function ($query) use ($request) {
                        return $query->where('doctor_id',  $request->doctor_id)
                            ->where('date', $request->date)
                            ->where('id', '<>', $request->id);
                    })
                ],
                'phone' => 'required|regex:/^9\d{8}$/',
                'birthday' => 'required',
            ]);

            if ($validator->fails()) {
                $errors = $validator->getMessageBag()->all();
                return response()->json($errors, 400);
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
            return response()->json( 'Reservation cannot be updated because it is not in Pending status.', 500);
        }


    }


    public function destroy($id)
    {

        $Reservation = Reservation::find($id);
        if (!$Reservation) {
            return response(' the Reservation not found', 404);
        }
        if ($Reservation->status === 'Pending') {

            $Reservation->delete();
            return response('successfully', 200);
        }
        else{
            return response()->json('Reservation cannot be deleted because it is not in Pending status.', 500);
        }

    }

    public function show_destroy()
    {
        $Reservations = Reservation::where('user_id', Auth::id())->onlyTrashed()
            //  الطريقة with () لتحميل علاقة "doctor" لكل حجز (باستخدام طريقة withTrashed () لتضمين الأطباء المحذوفين)
            ->with(['doctor' => function ($query) {
                $query->withTrashed();
            }])->get();

        return response($Reservations,200);
    }
}
