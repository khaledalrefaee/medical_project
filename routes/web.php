<?php


use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\back\ClinicsController;
use App\Http\Controllers\back\DoctorController;
use App\Http\Controllers\back\MapController;
use App\Http\Controllers\back\NuersController;
use App\Http\Controllers\back\PharmieseController;
use App\Http\Controllers\back\ReservationController;
use App\Http\Controllers\back\StatisticsController;
use App\Http\Controllers\back\UserController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\ChatController;


use App\Models\GroupMasseg;
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

Route::post('/log/in', [AuthController::class, 'login']);

// Authenticated Routes
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('backend.index');
    })->name('home');

    // Guest Routes
    Route::middleware(['guest'])->group(function () {
        Route::get('/', function () {
            return view('backend.index');
        });
    });

    // Logout
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Other Authenticated Routes
    Route::get('/Chart', [StatisticsController::class, 'chart'])->name('chart');

    Route::get('/group/chat', function () {
        return view('backend.Chating.group');
    });

    Route::get('delete_chat',
        function () {
        GroupMasseg::truncate();
        return redirect()->route('chat.index');
    });

    Route::get('/chat', [ChatController::class, 'index'])->middleware(['auth'])->name('chat.index');
    Route::get('/chat/{senderId}/{receiverId}', [ChatController::class, 'showMessages'])->middleware(['auth'])->name('chat.show');


    Route::livewire('/send-message/{senderId}/{receiverId}', 'ChatSingle')->name('send-message');


    Route::get('map', [MapController::class, 'index'])->name('map');

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
    Route::get('/all/Clinics',[ClinicsController::class,'index'])->name('all.Clincs');
    Route::get('/create/Clinics',[ClinicsController::class,'create'])->name('create.clincs');
    Route::post('/store/Clinics',[ClinicsController::class,'store'])->name('store.clincs');
    Route::get('/show/Clinics/{id}',[ClinicsController::class,'show'])->name('show.clincs');
    Route::get('/Retreat/Clinics',[ClinicsController::class,'Retreat'])->name('Retreat.clincs');
    Route::get('/edit/Clinics/{id}',[ClinicsController::class,'edit'])->name('edit.Clincs');
    Route::post('/update/Clinics/{id}',[ClinicsController::class,'update'])->name('update.Clincs');
    Route::get('/delete/Clinics/{id}',[ClinicsController::class,'destroy'])->name('delete.Clinics');
    Route::get('/show/delete/Clinics',[ClinicsController::class,'show_destroy'])->name('show.delete.Clincs');

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
    Route::get('/daily_reservation',[ReservationController::class,'daily_reservation'])->name('daily.reservation');
    Route::get('/Reservations',[ReservationController::class,'index'])->name('Reservations.all');

    Route::get('/create/waiting',[ReservationController::class,'create_waiting'])->name('create.waiting');
    Route::post('/store/waiting',[ReservationController::class,'storewaiting'])->name('store.waiting');
    Route::get('/show/waiting/{id}',[ReservationController::class,'show_waiting'])->name('show.waitin');
    Route::get('/Retreat/waiting',[ReservationController::class,'Retern_waiting'])->name('Retreat.waitin');
    Route::get('/edit/waiting/{id}',[ReservationController::class,'edit_waiting'])->name('edit.waitin');
    Route::post('/update/waiting/{id}',[ReservationController::class,'update_waiting'])->name('update.waiting');
    Route::get('delete/wating/{id}',[ReservationController::class,'delete_wating'])->name('delete.wating');




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

    Route::resource('roles', \App\Http\Controllers\RoleController::class);

    Route::resource('users', \App\Http\Controllers\UserController::class);
});
