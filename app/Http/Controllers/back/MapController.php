<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class MapController extends Controller
{
    public function index()
    {
        $userLocations = User::select('latitude', 'longitude','name')->get();
        $locations = [];

        foreach ($userLocations as $location) {
            $locations[] = [
                'lat'  => $location->latitude,
                'lng'  => $location->longitude,
                'name' => $location->name
            ];
        }

        return view('backend.map.map', compact('locations'));
    }
}
