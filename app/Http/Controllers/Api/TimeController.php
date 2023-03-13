<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TimeController extends Controller
{
    public function index()
    {

        $times = [];
        for ($i = 0; $i <= 16; $i++) {
            $times[] = Carbon::parse("09:00")->addMinutes(30 * $i)->format('H:i');
        }

        return response()->json([
            'times' => $times
        ]);
    }


}
