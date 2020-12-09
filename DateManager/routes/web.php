<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\SpecialtyController;
use App\Http\Controllers\User\DateController;
use App\Http\Controllers\Professional\ScheduleController;
use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Admin\ProfessionalController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
| Ruta de back
*/

Route::get('/', function () {
    return view('welcome');
})->name('welcome')->middleware('guest');

Auth::routes(['verify'=>true]);

// --------------------- Rutas del perfil --------------------
Route::get('me',[ProfileController::class,'show'])->name('profile');
Route::get('me/update',[ProfileController::class,'edit'])->name('profile.edit');
Route::put('me/update',[ProfileController::class,'update'])->name('profile.update');
Route::delete('me/delete',[ProfileController::class,'destroy'])->name('profile.delete');


////////////////////////////////// MÓDULO DEL CLIENTE ///////////////////////////////

// -------------------- Ruta de las especialidades ---------------------
Route::get('dates/specialties',[SpecialtyController::class,'indexToClient'])->name('date.specialties');

// -------------------- Ruta de los profesionales ---------------------
Route::get('dates/specialties/{specialty}/professionals',[ProfessionalController::class,'indexToClient'])->name('date.professionals');

// -------------------- Ruta de los horarios ---------------------
Route::get('dates/specialties/{specialty}/professionals/{professional}/schedules',[ScheduleController::class,'indexToClient'])->name('date.schedules');

// -------------------- Rutas de la creación de las citas ---------------------
Route::get('dates/specialties/{specialty}/professionals/{professional}/schedules/{schedule}/create',[DateController::class,'create'])->name('date.createDate');

// -------------------- Rutas de las citas ---------------------
Route::resource('dates',DateController::class)->names('date');

//////////////////////////// FIN DEL MÓDULO DEL CLIENTE /////////////////////////////


//////////////////////////// MÓDULO DEL ADMINISTRADOR /////////////////

// ---------------- Rutas de las especialidades -------------
Route::resource('specialties', SpecialtyController::class)->names('specialty');

// --------------- Rutas de los profesionales --------------
Route::resource('professionals', ProfessionalController::class)->names('professional');

// -------------- Rutas de los clientes -------------------
Route::resource('clients', ClientController::class)->names('client');

////////////////////////// FIN DEL MÓDULO DEL ADMINISTRADOR ////////////////////////////


////////////////////////////// MÓDULO DEL PROFESIONAL ////////////////////////////

// ------------------- Rutas de los horarios --------------------
Route::get('schedules/downloadPDF',[ScheduleController::class,'downloadPDF'])->name('schedule.downloadPDF');
Route::get('schedules/streamPDF', [ScheduleController::class,'streamPDF'])->name('schedule.streamPDF');
Route::get('schedules/excel', [ScheduleController::class,'exportExcel'])->name('schedule.exportExcel');
Route::resource('schedules',ScheduleController::class)->names('schedule');

////////////////////////// FIN DEL MÓDULO DEL PROFESIONAL ////////////////////////


Route::get('dashboard/downloadClientspdf', [PdfController::class, 'downloadClient'])->name('downloadClient');
Route::get('dashboard/downloadProspdf', [PdfController::class, 'downloadPro'])->name('downloadPro');

Route::get('dashboard/streamClientspdf', [PdfController::class, 'streamClient'])->name('streamClient');
Route::get('dashboard/streamProspdf', [PdfController::class, 'streamPro'])->name('streamPro');
