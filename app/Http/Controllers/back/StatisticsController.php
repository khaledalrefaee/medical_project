<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use App\Models\Clinics;
use App\Models\Doctor;
use App\Models\Nurses;
use App\Models\Pharmise;
use App\Models\Reservation;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class StatisticsController extends Controller
{
    public function chart()
    {
        $totalUsers = User::count();
        $totalClince=Clinics::count();
        $totalDoctors=Doctor::count();
        $totalNurses= Nurses::count();
        $totalDrugs=Pharmise::count();


        // Fetch all doctors
        $doctors = Doctor::all();

        // Fetch all appointments
        $allAppointments = Reservation::all();

        // Calculate daily appointments
        $dailyAppointments = Reservation::whereDate('date', Carbon::today())->get();

        $cancelledAppointments = Reservation::where('status', 'Cancelling')->get();


        // Create array for doctor names and appointment counts
        $doctorAppointments = [];
        foreach ($doctors as $doctor) {
            $doctorAppointments[$doctor->name] = Reservation::where('doctor_id', $doctor->id)->count();
        }

        // Create data array for chart
        $data = [
            'all' => $allAppointments->count(),
            'daily' => $dailyAppointments->count(),
            'Cancelled' => $cancelledAppointments->count(),
            'doctorAppointments' => $doctorAppointments,
        ];

        return view('backend.Chart.Chart', compact('totalUsers','totalClince','totalDoctors','totalNurses','totalDrugs' ,'data'));
    }

}
