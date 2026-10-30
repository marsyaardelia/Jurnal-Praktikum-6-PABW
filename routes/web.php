<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LaporBanjirController;

Route::get('/', function () {
    return redirect()->route('laporan.index');
});

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::controller(LaporBanjirController::class)->group(function () {
        Route::get('/laporan', 'index')->name('laporan.index');
        Route::get('/laporan/buat', 'create')->name('laporan.create');
        Route::post('/laporan/konfirmasi', 'konfirmasi')->name('laporan.konfirmasi');
        Route::post('/laporan', 'store')->name('laporan.store');
        Route::patch('/laporan/{laporan}/status', 'updateStatus')->name('laporan.updateStatus');
        Route::delete('/laporan/{laporan}', 'destroy')->name('laporan.destroy');
    });
});


