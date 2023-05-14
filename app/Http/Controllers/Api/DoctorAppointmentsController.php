<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class DoctorAppointmentsController extends Controller
{
    public function index()
    {
        $reservations = Reservation::where('doctor_id', Auth::id())->orderBy('id', 'DESC')->get();

        if ($reservations->isEmpty()) {
            return response()->json(['message' => 'You don\'t have any reservations yet.'], 404);
        }

        return response()->json($reservations, 200);
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
                'date' => 'required|date_format:Y-m-d',
                'time' => [
                    'required',
                    'date_format:H:i',
                    Rule::unique('reservations')->where(function ($query) use ($reservation, $request) {
                        return $query->where('doctor_id', $reservation->doctor_id)
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
            $reservation->status = 'Pending';

            $reservation->save();

            return response()->json($reservation, 200);
        }
        else{
            return response()->json('Reservation cannot be updated because it is not in Pending status.', 500);
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
            return response()->json( 'Reservation cannot be deleted because it is not in Pending status.', 500);
        }

    }

}
