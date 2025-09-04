<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HospitalController;
use App\Http\Controllers\PatientController;

Route::get('/', function () { return redirect()->route('login'); });

// Auth (login menggunakan username)
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login'])->name('login.post');
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

// Protected resource routes
Route::middleware('auth')->group(function () {
    Route::resource('hospitals', HospitalController::class);
    Route::get('patients/filter', [PatientController::class, 'filter'])->name('patients.filter');
    Route::resource('patients', PatientController::class);
});