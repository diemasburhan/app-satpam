<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SatpamController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\JadwalTugasController;
use App\Http\Controllers\LaporanKejadianController;
use App\Http\Controllers\RoutineCheckController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

Route::middleware('guest')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('register', [RegisteredUserController::class, 'store'])->name('register.store');
    
    Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('login', [AuthenticatedSessionController::class, 'store']);
});

Route::middleware('auth')->group(function () {
    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/laporankejadian', [LaporanKejadianController::class, 'index'])->name('laporankejadian.index');
    Route::get('/satpam', [SatpamController::class, 'index'])->name('satpam.index');
});

Route::resource('satpam', SatpamController::class);
Route::resource('jadwal', JadwalController::class);
Route::resource('laporankejadian', LaporanKejadianController::class);
Route::resource('jadwal', JadwalTugasController::class);
Route::resource('routine-check', RoutineCheckController::class);

Route::put('/jadwal/{id}/update-status', [JadwalController::class, 'updateStatus'])->name('jadwal.updateStatus');
Route::put('/routine-check/{id}/update-status', [RoutineCheckController::class, 'updateStatus'])->name('routine-check.updateStatus');
