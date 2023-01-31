<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Nurses;
use Illuminate\Http\Request;

class NuersController extends Controller
{
    public function index(){
        $nuers = Nurses::get();
        $arrya = [
              'data'=>$nuers,
            'maseg'=>'ok',
            'status'=>200
            ];
        return response($arrya ,200);
    }
}
