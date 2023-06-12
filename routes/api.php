<?php


use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\AuthDoctorController;
use App\Http\Controllers\Api\DoctorAppointmentsController;
use App\Http\Controllers\Api\NuersController;
use App\Http\Controllers\Api\PharmiseController;
use App\Http\Controllers\Api\ProfileContoller;
use App\Http\Controllers\Api\ReservationController;
use App\Http\Controllers\Api\TimeController;
use App\Http\Controllers\Api\ResetPasswordContoller;
use App\Http\Controllers\Api\ForgetpasswordController;

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


Route::post('password/forgot_password',[ForgetpasswordController::class,'forgotpassword']);
Route::post('password/reset',[ResetPasswordContoller::class,'reset_password']);

Route::post('/login',[AuthController::class,'login']);

Route::get('/nuers',[NuersController::class,'index']);

Route::get('/pharmise',[PharmiseController::class,'index']);

Route::get('/time',[TimeController::class,'index']);

Route::get('get_All',[NuersController::class,'get_All']);

Route::get('/get/ALLDoctoer',[NuersController::class,'doctoer']);

Route::get('/Reservation/edit/{id}',[ReservationController::class,'edit']);

Route::put('/Reservation/update/{id}',[ReservationController::class,'update']);

Route::post('/Reservation/delete/{id}',[ReservationController::class,'destroy']);

//Doctor

Route::post('/login/Doctor',[AuthDoctorController::class,'login']);

Route::get('/Reservation/Doctor/edit/{id}',[DoctorAppointmentsController::class,'edit']);


Route::put('/Reservation/Doctor/update/{id}',[DoctorAppointmentsController::class,'update']);

Route::post('/Reservation/Doctor/delete/{id}',[DoctorAppointmentsController::class,'destroy']);

Route::group(['middleware' => ['auth:sanctum']], function () {

    Route::post('/logout',[AuthController::class,'logout']);

    Route::get('/profile', [ProfileContoller::class,'index']);

    Route::post('/store',[ReservationController::class,'store']);

    Route::get('/My/Reservation',[ReservationController::class,'index']);

    Route::get('/My/Reservation/destroy',[ReservationController::class,'show_destroy']);


    //Docotor
    Route::get('/My/Reservation/Doctor',[DoctorAppointmentsController::class,'index']);
    Route::get('/profile/doctor', [AuthDoctorController::class,'profile']);


});
