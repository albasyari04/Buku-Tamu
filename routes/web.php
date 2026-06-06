<?php

use App\Http\Controllers\TamuController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', fn() => redirect()->route('login'));

// ── Auth ──────────────────────────────────────────────────────
Route::get('/login',    [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login',   [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register',[AuthController::class, 'register']);
Route::post('/logout',  [AuthController::class, 'logout'])->name('logout');

// ── Sisi ADMIN ────────────────────────────────────────────────
Route::middleware(['auth', 'admin'])->group(function () {

    // Dashboard
    Route::get('/dashboard',            [TamuController::class, 'dashboard'])->name('dashboard');
    Route::post('/notifications/read-all', [TamuController::class, 'markNotificationsAsRead'])->name('notifications.read.all');
    Route::get('/dashboard/export-pdf', [TamuController::class, 'exportDashboardPDF'])->name('dashboard.export.pdf');
    Route::get('/dashboard/print',      [TamuController::class, 'printDashboard'])->name('dashboard.print');

    // Rute Tamu NON-resource (HARUS di atas Route::resource)
    Route::get('/tamu/export-pdf',        [TamuController::class, 'exportTamuPDF'])->name('tamu.export.pdf');
    Route::get('/tamu/import',            [TamuController::class, 'importForm'])->name('tamu.import.form');
    Route::post('/tamu/import',           [TamuController::class, 'importExcel'])->name('tamu.import');
    Route::get('/tamu/template-download', [TamuController::class, 'downloadTemplate'])->name('tamu.template.download');
    Route::get('/tamu/formulir-print',    [TamuController::class, 'printFormulir'])->name('tamu.formulir.print');

    // Resource Tamu
    Route::resource('tamu', TamuController::class);

    // Export & Print per-record tamu
    Route::get('/tamu/{id}/export-pdf', [TamuController::class, 'exportDetailPDF'])->name('tamu.exportDetailPDF');
    Route::get('/tamu/{id}/print',      [TamuController::class, 'printDetail'])->name('tamu.printDetail');

    // Resource Pegawai
    Route::resource('pegawai', PegawaiController::class);

    // Profile
    Route::get('/profile',                 [ProfileController::class, 'index'])->name('profile.index');
    Route::get('/profile/edit',            [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile/update',          [ProfileController::class, 'update'])->name('profile.update');
    Route::put('/profile/update-password', [ProfileController::class, 'updatePassword'])->name('profile.update-password');
});

// ── Sisi USER (Tamu) ──────────────────────────────────────────
Route::middleware(['auth', 'user'])->prefix('tamu-portal')->name('user.')->group(function () {

    // Dashboard user
    Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');

    // Form isi buku tamu
    Route::get('/isi-buku-tamu',  [UserController::class, 'formBukuTamu'])->name('form');
    Route::post('/isi-buku-tamu', [UserController::class, 'simpanBukuTamu'])->name('simpan');

    // Riwayat kunjungan
    Route::get('/riwayat', [UserController::class, 'riwayat'])->name('riwayat');
});