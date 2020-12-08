<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\DateController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Professional\ScheduleController;
use App\Http\Controllers\Admin\ClientController;
use App\Http\Controllers\Admin\SpecialtyController;
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
Route::resource('schedules',ScheduleController::class)->names('schedule');
Route::get('schedules/downloadPDF',[ScheduleController::class,'downloadPDF'])->name('schedule.downloadPDF');
Route::get('schedules/streamPDF', [ScheduleController::class, 'streamPDF'])->name('schedule.streamPDF');
Route::get('schedules/excel', [ScheduleController::class, 'exportExcel'])->name('schedule.exportExcel');

////////////////////////// FIN DEL MÓDULO DEL PROFESIONAL ////////////////////////



Route::get('dashboard/downloadClientspdf', [PdfController::class, 'downloadClient'])->name('downloadClient');
Route::get('dashboard/downloadProspdf', [PdfController::class, 'downloadPro'])->name('downloadPro');

Route::get('dashboard/streamClientspdf', [PdfController::class, 'streamClient'])->name('streamClient');
Route::get('dashboard/streamProspdf', [PdfController::class, 'streamPro'])->name('streamPro');


Route::get('dashboard/excelClient', [UserController::class, 'exportClient'])->name('excelClient');
Route::get('dashboard/excelPro', [UserController::class, 'exportPro'])->name('excelPro');



Route::resource('/dates',DateController::class)->names('dates');



Route::get('users/{pro}/editPro', [UserController::class, 'editPro'])->name('editPro');
Route::put('users/{user}/update', [UserController::class, 'update'])->name('updatePro');
Route::put('users/{user}/update', [UserController::class, 'update'])->name('updatePro');

Route::get('users/createPro', [UserController::class, 'createPro'])->name('createPro');

Route::delete('users/{user}/destroy', [UserController::class, 'destroy'])->name('destroyUser');
Route::get('users/{pro}/showPro', [UserController::class, 'showPro'])->name('showPro');

Route::get('users/indexPro', [UserController::class, 'indexPro'])->name('indexPro');
Route::post('users/create',[UserController::class,'store'])->name('user.store');

