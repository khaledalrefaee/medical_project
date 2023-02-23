<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\back\ClinicsController;
use App\Http\Controllers\back\DetilsControler;
use App\Http\Controllers\back\DoctorController;
use App\Http\Controllers\back\NuersController;
use App\Http\Controllers\back\PharmieseController;
use App\Http\Controllers\back\RoleController;
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

Route::get('/home' ,function (){
    return view('backend.index');
});


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
Route::post('/update/nuers/{id}',[NuersController::class,'update'])->name('update.nuers');
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


//Doctoer
Route::get('/all/doctoer',[DoctorController::class,'index'])->name('all_doctoer');
Route::get('/create/doctoer',[DoctorController::class,'create'])->name('create.doctoer');
Route::post('/stror/doctoer',[DoctorController::class,'store'])->name('store.doctoer');
Route::get('/show/doctoer/{id}',[DoctorController::class,'show'])->name('show.doctoer');
Route::get('/Retreat/doctoer',[DoctorController::class,'Retreat'])->name('Retreat.doctoer');
Route::get('/edit/doctoer/{id}',[DoctorController::class,'edit'])->name('edit.doctoer');
Route::post('/update/doctoer/{id}',[DoctorController::class,'update'])->name('update.doctoer');
Route::get('/delete/doctoer/{id}',[DoctorController::class,'destroy'])->name('delete.doctoer');
Route::get('/doctoer/search/{name}',[DoctorController::class,'search'])->name('search{name}');


//Details_Doctoer
Route::get('/all/Details',[DetilsControler::class,'index'])->name('all_Details');
Route::get('/create/details',[DetilsControler::class,'create'])->name('create.details');
Route::post('/stror/details',[DetilsControler::class,'store'])->name('store.details');
Route::get('/show/details/{id}',[DetilsControler::class,'show'])->name('show.details');
Route::get('/Retreat/details',[DetilsControler::class,'Retreat'])->name('Retreat.details');
Route::get('/edit/Details/{id}',[DetilsControler::class,'edit'])->name('edit.details');
Route::post('/update/Details/{id}',[DetilsControler::class,'update'])->name('update.details');
Route::get('/delete/Details/{id}',[DetilsControler::class,'destroy'])->name('delete.details');
Route::post('/Filter/Doctoer',[DetilsControler::class,'Filter_Doctoer'])->name('Filter_Doctoer');

//pharmese
Route::get('all/pharmese',[PharmieseController::class,'index'])->name('all.pharmese');
Route::get('/create/pharmese',[PharmieseController::class,'create'])->name('create.pharmese');
Route::post('/stror/pharmese',[PharmieseController::class,'store'])->name('store.pharmese');
Route::get('/edit/pharmese/{id}',[PharmieseController::class,'edit'])->name('edit.pharmese');
Route::post('/update/pharmese/{id}',[PharmieseController::class,'update'])->name('update.pharmese');
Route::get('/delete/pharmese/{id}',[PharmieseController::class,'destroy'])->name('delete.pharmese');


//
Route::view('add_User','livewire.Show_Form');
