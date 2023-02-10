<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Pharmise;
use Illuminate\Http\Request;

class PharmiseController extends Controller
{
   public function index(){
       $pharmises = Pharmise::all();
       return response($pharmises ,200);
   }
}
