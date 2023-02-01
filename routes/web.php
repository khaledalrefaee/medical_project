<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\back\ClinicsController;
use App\Http\Controllers\back\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/login',function (){
    return view('login');
})->name('view_login');


//login and logout

Route::post('/login',[AuthController::class,'login'])->name('login');
Route::get('/logout',[AuthController::class,'logout'])->name('logout');

//Users
Route::get('/all_users',[UserController::class,'index'])->name('all_user');
Route::get('/create/Users',[UserController::class,'create'])->name('create_user');
Route::post('/User/store',[UserController::class,'store'])->name('store_user');
Route::get('/user/show/{id}',[UserController::class,'show'])->name('show_user');
Route::get('/Retreat',[UserController::class,'Retreat'])->name('Retreat_User');
Route::get('/edit/user/{id}',[UserController::class,'edit'])->name('edit_user');
Route::post('/update/user/{id}',[UserController::class,'update'])->name('update_user');
Route::get('delete/user/{id}',[UserController::class,'destroy'])->name('delet_user');

//clinics
Route::get('/all/Clincs',[ClinicsController::class,'index'])->name('all.Clincs');

