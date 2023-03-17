<?php

namespace App\Http\Controllers;

use App\Models\Clinics;
use App\Models\Doctor;
use App\Models\Nurses;
use App\Models\Reservation;
use App\Models\User;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $query = Reservation::query();
        $searchQuery = $request->input('search');

        if ($searchQuery) {
            $query->where('name', 'LIKE', '%'.$searchQuery.'%')
                ->orWhere('date', 'LIKE', '%'.$searchQuery.'%');
        }

        $data = $query->paginate(2);

        return view('backend.your.view.name', compact('data'));
    }

    public function searchnuers(Request $request)
    {
        $query = Nurses::query();
        $searchQuery = $request->input('search');

        if ($searchQuery) {
            $query->where('name', 'LIKE', '%'.$searchQuery.'%')
                ->orWhere('description', 'LIKE', '%'.$searchQuery.'%')
                ->orWhere('phone', 'LIKE', '%'.$searchQuery.'%');
        }

        $nuers = $query->paginate(2);

        return view('backend.Nuers.all_Nuers', compact('nuers'));
    }


    public function searchclince(Request $request)
    {
        $query = Clinics::query();
        $searchQuery = $request->input('search');

        if ($searchQuery) {
            $query->where('name', 'LIKE', '%'.$searchQuery.'%');
        }

        $clinics = $query->paginate(2);

        return view('backend.clinics.all_clinics', compact('clinics'));
    }



    public function searchdoctor(Request $request)
    {
        $query = Doctor::query();
        $searchQuery = $request->input('search');

        if ($searchQuery) {
            $query->where('name', 'LIKE', '%'.$searchQuery.'%');
        }

        $doctors = $query->paginate(2);
        $clinic =Clinics::all();
        return view('backend.Doctor.all_doctor', compact('doctors','clinic'));
    }





}
