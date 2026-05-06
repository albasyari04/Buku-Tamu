<?php

use App\Http\Controllers\TamuController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController; // Tambahkan ini
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('dashboard');
});

// Auth Routes
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Protected Routes (hanya untuk admin yang sudah login)
Route::middleware(['auth', 'admin'])->group(function () {
    // Dashboard
    Route::get('/dashboard', [TamuController::class, 'dashboard'])->name('dashboard');
    
    // Export & Print Routes - HARUS DI ATAS resource routes
    Route::get('/dashboard/export-pdf', [TamuController::class, 'exportDashboardPDF'])->name('dashboard.export.pdf');
    Route::get('/dashboard/print', [TamuController::class, 'printDashboard'])->name('dashboard.print');
    Route::get('/tamu/export-pdf', [TamuController::class, 'exportTamuPDF'])->name('tamu.export.pdf');
    
    // Routes untuk Tamu
    Route::resource('tamu', TamuController::class);
    
    // Routes untuk Pegawai
    Route::resource('pegawai', PegawaiController::class);
    
    // Routes untuk Profile - TAMBAHKAN INI
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::put('/profile/update-password', [ProfileController::class, 'updatePassword'])->name('profile.update-password');
    
    Route::get('/tamu/{id}/export-pdf', [TamuController::class, 'exportDetailPDF'])->name('tamu.exportDetailPDF');
    Route::get('/tamu/{id}/print', [TamuController::class, 'printDetail'])->name('tamu.printDetail');
});