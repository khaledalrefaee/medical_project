<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\back\ClinicsController;
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


//clinics
Route::get('/all/Clincs',[ClinicsController::class,'index'])->name('all.Clincs');
Route::get('/create/Clincs',[ClinicsController::class,'create'])->name('create.clincs');
Route::post('/stror/Clincs',[ClinicsController::class,'store'])->name('store.clincs');
Route::get('/show/Clincs/{id}',[ClinicsController::class,'show'])->name('show.clincs');
Route::get('/Retreat/Clincs',[ClinicsController::class,'Retreat'])->name('Retreat.clincs');
Route::get('/edit/Clincs/{id}',[ClinicsController::class,'edit'])->name('edit.Clincs');
Route::post('/update/Clincs/{id}',[ClinicsController::class,'update'])->name('update.Clincs');
Route::get('delete/Clincs/{id}',[ClinicsController::class,'destroy'])->name('delet.Clincs');
