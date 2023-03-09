<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
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

        $data = $query->paginate(10);

        return view('backend.your.view.name', compact('data'));
    }
}
