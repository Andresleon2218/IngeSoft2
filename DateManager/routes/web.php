<?php

use App\Http\Controllers\DateController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\UserController;
use App\Models\User;

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

Route::get('/',[LandingController::class, 'index']);
Auth::routes(['verify'=>true]);

 Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('dashboard/downloadClientspdf', [PdfController::class, 'downloadClient'])->name('downloadClient');
Route::get('dashboard/downloadProspdf', [PdfController::class, 'downloadPro'])->name('downloadPro');
Route::get('dashboard/downloadSchedulespdf', [PdfController::class, 'downloadSchedule'])->name('downloadSchedule');
Route::get('dashboard/streamClientspdf', [PdfController::class, 'streamClient'])->name('streamClient');
Route::get('dashboard/streamProspdf', [PdfController::class, 'streamPro'])->name('streamPro');
Route::get('dashboard/streamSchedulespdf', [PdfController::class, 'streamSchedule'])->name('streamSchedule');

Route::get('dashboard/excelClient', [UserController::class, 'exportClient'])->name('excelClient');
Route::get('dashboard/excelPro', [UserController::class, 'exportPro'])->name('excelPro');
Route::get('dashboard/excelSchedule', [UserController::class, 'exportSchedule'])->name('excelSchedule');

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::resource('/dates',DateController::class)->names('dates');

Route::resource('/schedule',ScheduleController::class)->names('schedule');

Route::get('users/{pro}/editPro', [UserController::class, 'editPro'])->name('editPro');
Route::put('users/{user}/update', [UserController::class, 'update'])->name('updatePro');
Route::put('users/{user}/update', [UserController::class, 'update'])->name('updatePro');

Route::get('users/createPro', [UserController::class, 'createPro'])->name('createPro');

Route::delete('users/{user}/destroy', [UserController::class, 'destroy'])->name('destroyUser');
Route::get('users/{pro}/showPro', [UserController::class, 'showPro'])->name('showPro');

Route::get('users/indexPro', [UserController::class, 'indexPro'])->name('indexPro');


