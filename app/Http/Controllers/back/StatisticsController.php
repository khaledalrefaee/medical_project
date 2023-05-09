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
use Illuminate\Support\Facades\DB;

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
        //عم نفذ استعلام و عم نحدد الحقل و بعدين عم نتعامل معو كتاريخ ثم يتم استخدام طريقة groupBy لتجميع النتائج حسب التاريخ وحقول create_at. هذا يعني أنه سيتم تجميع النتائج حسب كل مجموعة فريدة من قيم التاريخ و created_at.
        $dataT = Reservation::select(DB::raw("DATE_FORMAT(created_at,'%Y-%m-%d') as date"), DB::raw("SUM(total) as total"))
            ->groupBy('date', 'created_at')
            ->get();;

        // Create data array for chart
        $data = [
            'all' => $allAppointments->count(),
            'daily' => $dailyAppointments->count(),
            'Cancelled' => $cancelledAppointments->count(),
            'doctorAppointments' => $doctorAppointments,
            'total' => $dataT,
            ];

        return view('backend.Chart.Chart', compact('totalUsers','totalClince','totalDoctors','totalNurses','totalDrugs' ,'data'));
    }

}
