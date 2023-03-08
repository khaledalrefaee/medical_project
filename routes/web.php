<?php


use App\Http\Controllers\AdminController;
use App\Http\Controllers\back\ClinicsController;
use App\Http\Controllers\back\DetilsControler;
use App\Http\Controllers\back\DoctorController;
use App\Http\Controllers\back\NuersController;
use App\Http\Controllers\back\PharmieseController;
use App\Http\Controllers\back\ReservationController;
use App\Http\Controllers\back\ReservationsController;
use App\Http\Controllers\back\RoleController;
use App\Http\Controllers\back\UserController;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\WatingController;
use App\Models\User;
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
    return view('auth.login');
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::get('/dashboard', function () {return view('backend.index');})->name('home');
    Route::group(['middleware'=>['guest']], function () {

        Route::get('/', function () {
            return view('backend.index');
        });
    });
});

// Add a middleware that redirects unauthenticated users to the login page
Route::middleware(['auth'])->group(function () {
    // Add more authenticated routes here

    Route::get('/logout',[AdminController::class,'destroy'])->name('Logout');

    //Chart
    Route::get('/Chart',[UserController::class,'chart'])->name('chart');

    //Role
    Route::get('/all/role',[RoleController::class,'index'])->name('all.role');
    Route::get('/create/role',[RoleController::class,'create'])->name('create.role');
    Route::post('/role/store',[RoleController::class,'store'])->name('store.role');
    Route::get('/role/show/{id}',[RoleController::class,'show'])->name('show.role');
    Route::get('/Retreat/role',[RoleController::class,'Retreat'])->name('Retreat.role');
    Route::get('/edit/role/{id}',[RoleController::class,'edit'])->name('edit.role');
    Route::post('/update/role/{id}',[RoleController::class,'update'])->name('update.role');
    Route::get('delete/role/{id}',[RoleController::class,'destroy'])->name('delete.role');

    //Users
    Route::get('/all_users',[UserController::class,'index'])->name('all_user');
    Route::get('/create/Users',[UserController::class,'create'])->name('create_user');
    Route::post('/User/store',[UserController::class,'store'])->name('store_user');
    Route::get('/user/show/{id}',[UserController::class,'show'])->name('show_user');
    Route::get('/Retreat',[UserController::class,'Retreat'])->name('Retreat_User');
    Route::get('/edit/user/{id}',[UserController::class,'edit'])->name('edit_user');
    Route::post('/update/user/{id}',[UserController::class,'update'])->name('update_user');
    Route::get('delete/user/{id}',[UserController::class,'destroy'])->name('delet_user');

    //nuers
    Route::get('/all/nuers',[NuersController::class,'index'])->name('all.nuers');
    Route::get('/create/nuers',[NuersController::class,'create'])->name('create.nuers');
    Route::post('/stror/nuers',[NuersController::class,'store'])->name('store.nuers');
    Route::get('/show/nuers/{id}',[NuersController::class,'show'])->name('show.nuers');
    Route::get('/Retreat/nuers',[NuersController::class,'Retreat'])->name('Retreat.nuers');
    Route::get('/edit/nuers/{id}',[NuersController::class,'edit'])->name('edit.nuers');
    Route::post('/update/nuers/{id}',[NuersController::class,'update'])->name('update.kk');
    Route::get('/delete/nuers/{id}',[NuersController::class,'destroy'])->name('delet.nuers');

    //clinics
    Route::get('/all/Clincs',[ClinicsController::class,'index'])->name('all.Clincs');
    Route::get('/create/Clincs',[ClinicsController::class,'create'])->name('create.clincs');
    Route::post('/stror/Clincs',[ClinicsController::class,'store'])->name('store.clincs');
    Route::get('/show/Clincs/{id}',[ClinicsController::class,'show'])->name('show.clincs');
    Route::get('/Retreat/Clincs',[ClinicsController::class,'Retreat'])->name('Retreat.clincs');
    Route::get('/edit/Clincs/{id}',[ClinicsController::class,'edit'])->name('edit.Clincs');
    Route::post('/update/Clincs/{id}',[ClinicsController::class,'update'])->name('update.Clincs');
    Route::get('/delete/Clincs/{id}',[ClinicsController::class,'destroy'])->name('delete.Clincs');

    //Doctor

    Route::get('/all/doctor',[DoctorController::class,'index'])->name('all_doctor');
    Route::get('/create/doctor',[DoctorController::class,'create'])->name('create.doctor');
    Route::post('/store/doctor',[DoctorController::class,'store'])->name('store.doctor');
    Route::get('/show/doctor/{id}',[DoctorController::class,'show'])->name('show.doctor');
    Route::get('/Retreat/doctor',[DoctorController::class,'Retreat'])->name('Retreat.doctor');
    Route::get('/edit/doctor/{id}',[DoctorController::class,'edit'])->name('edit.doctor');
    Route::post('/update/doctor/{id}',[DoctorController::class,'update'])->name('update.doctor');
    Route::get('/delete/doctor/{id}',[DoctorController::class,'destroy'])->name('delete.doctor');

    Route::post('Filter_Clinces', [DoctorController::class,'Filter_Clinces'])->name('Filter_Clinces');

    //pharmese
    Route::get('all/pharmese',[PharmieseController::class,'index'])->name('all.pharmese');
    Route::get('/create/pharmese',[PharmieseController::class,'create'])->name('create.pharmese');
    Route::post('/stror/pharmese',[PharmieseController::class,'store'])->name('store.pharmese');
    Route::get('/edit/pharmese/{id}',[PharmieseController::class,'edit'])->name('edit.pharmese');
    Route::post('/update/pharmese/{id}',[PharmieseController::class,'update'])->name('update.pharmese');
    Route::get('/delete/pharmese/{id}',[PharmieseController::class,'destroy'])->name('delete.pharmese');

    //Reservations
    Route::get('/Reservations',[ReservationController::class,'index'])->name('Reservations.all');
    Route::get('/create/waiting',[ReservationController::class,'create_waiting'])->name('create.waiting');
    Route::post('/store/waiting',[ReservationController::class,'storewaiting'])->name('store.waiting');
    Route::get('/create/appointment',[ReservationController::class,'create_appointment'])->name('create.appointment');
});
























//live-wire
Route::view('add_User','livewire.Show_Form');





