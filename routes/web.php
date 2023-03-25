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
use App\Http\Controllers\MailController;
use App\Http\Controllers\PayPalController;
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

   //Map
    Route::get('map',function (){
        return view('backend.map.map');
    });

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
    Route::get('/show/delete/Clincs',[ClinicsController::class,'show_destroy'])->name('show.delete.Clincs');

    //Doctor

    Route::get('/all/doctor',[DoctorController::class,'index'])->name('all_doctor');
    Route::get('/create/doctor',[DoctorController::class,'create'])->name('create.doctor');
    Route::post('/store/doctor',[DoctorController::class,'store'])->name('store.doctor');
    Route::get('/show/doctor/{id}',[DoctorController::class,'show'])->name('show.doctor');
    Route::get('/Retreat/doctor',[DoctorController::class,'Retreat'])->name('Retreat.doctor');
    Route::get('/edit/doctor/{id}',[DoctorController::class,'edit'])->name('edit.doctor');
    Route::post('/update/doctor/{id}',[DoctorController::class,'update'])->name('update.doctor');
    Route::get('/delete/doctor/{id}',[DoctorController::class,'destroy'])->name('delete.doctor');
    Route::get('/show/delete/doctor',[DoctorController::class,'show_destroy'])->name('show.delete.doctor');

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
    Route::get('/show/waiting/{id}',[ReservationController::class,'show_waiting'])->name('show.waitin');
    Route::get('/Retreat/waiting',[ReservationController::class,'Retern_waiting'])->name('Retreat.waitin');
    Route::get('/edit/waiting/{id}',[ReservationController::class,'edit_waiting'])->name('edit.waitin');
    Route::post('/update/waiting/{id}',[ReservationController::class,'update_waiting'])->name('update.waiting');
    Route::get('delete/wating/{id}',[ReservationController::class,'delete_wating'])->name('delete.wating');

    Route::get('/Get_Doctoer/{division_id}', [ReservationController::class,'Get_Doctoer']);



    Route::get('/create/appointment',[ReservationController::class,'create_appointment'])->name('create.appointment');
    Route::post('/store/appointment',[ReservationController::class,'store_appointment'])->name('store.appointment');
    Route::get('/show/appointment/{id}',[ReservationController::class,'Show_appointment'])->name('show.appointment');
    Route::get('/Retreat/appointment',[ReservationController::class,'Retern_appointment'])->name('Retreat.appointment');
    Route::get('/edit/appointment/{id}',[ReservationController::class,'edit_appointment'])->name('edit.appointment');
    Route::post('/update/appointment/{id}',[ReservationController::class,'update_appointment'])->name('update.appointment');
    Route::get('delete/appointment/{id}',[ReservationController::class,'delete_appointment'])->name('delete.appointment');
    Route::get('/Change/Status/{id}',[ReservationController::class,'ChngeStatus'])->name('Chnge.Status');
    Route::get('/Cancelling/Status/{id}',[ReservationController::class,'ChngeCancelling'])->name('Chnge.Cancelling');
    Route::get('/download/pdf/{id}',[ReservationController::class,'PdfInvoiceDownload'])->name('download.pdf');


    Route::get('/show/delete/Reservation',[ReservationController::class,'show_destroy'])->name('show.delete.Reservation');

    Route::post('/delete_all',[ReservationController::class,'deleteRecords'])->name('delete.all');




        //Mail

    Route::resource('mail',MailController::class);

    Route::get('/see/All',[MailController::class,'see_All'])->name('see');
    Route::get('redirect',function (){
       return redirect()->route('home');
    });



});


Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles', \App\Http\Controllers\RoleController::class);
    Route::resource('users', \App\Http\Controllers\UserController::class);

});






Route::group(['middleware' => ['auth']], function() {

    Route::resource('roles', \App\Http\Controllers\RoleController::class);
    Route::resource('users', \App\Http\Controllers\UserController::class);

});
















//live-wire
Route::view('add_User','livewire.Show_Form');





