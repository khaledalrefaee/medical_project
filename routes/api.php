<?php


use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\NuersController;
use App\Http\Controllers\Api\PharmiseController;
use App\Http\Controllers\Api\ProfileContoller;
use App\Http\Controllers\Api\ReservationController;
use App\Http\Controllers\Api\TimeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/



//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::post('/login',[AuthController::class,'login']);

Route::get('/nuers',[NuersController::class,'index']);

Route::get('/pharmise',[PharmiseController::class,'index']);

Route::get('/time',[TimeController::class,'index']);



Route::get('/get/ALLDoctoer',[NuersController::class,'doctoer']);

Route::group(['middleware' => ['auth:sanctum']], function () {

    Route::post('/logout',[AuthController::class,'logout']);


    Route::get('/profile', [ProfileContoller::class,'index']);

    Route::post('/store',[ReservationController::class,'store']);
});
