<?php

use App\Http\Controllers\DateController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\ScheduleController;

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

Route::get('dashboard/downloadClientspdf', PdfController::class, 'downloadClient');
Route::get('dashboard/downloadProspdf', PdfController::class, 'downloadPro');

Route::get('dashboard/streamClientspdf', PdfController::class, 'streamClient');
Route::get('dashboard/streamProspdf', PdfController::class, 'streamPro');
Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::resource('/dates',DateController::class)->names('dates');

Route::resource('/schedule',ScheduleController::class)->names('schedule');
