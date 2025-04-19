<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\JadwalDokterController;
use App\Http\Controllers\ResepsionisDashboardController;
use App\Http\Controllers\PasienPendaftaranController;
use App\Http\Controllers\DokterDashboardController;
use App\Http\Controllers\PasienDashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::middleware('guest')->group(function () {
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/pendaftaran/create', [PasienPendaftaranController::class, 'create'])->name('pendaftaran.create');
    Route::post('/pendaftaran', [PasienPendaftaranController::class, 'store'])->name('pendaftaran.store');
    Route::get('/pendaftaran/jadwal-dokter', [PasienPendaftaranController::class, 'getJadwalDokter'])->name('pendaftaran.jadwal-dokter');
    Route::get('/pendaftaran/status', [PasienPendaftaranController::class, 'status'])->name('pendaftaran.status');
    Route::post('/resepsionis/dashboard/{pendaftaran}/validate', [ResepsionisDashboardController::class, 'validate'])->name('resepsionis.validate');
    Route::resource('jadwal', JadwalDokterController::class);
    Route::get('/dokter/dashboard', [DokterDashboardController::class, 'index'])->name('dokter.dashboard');
    Route::get('/resepsionis/dashboard', [ResepsionisDashboardController::class, 'index'])->name('resepsionis.dashboard');
    Route::post('/dokter/antrian/{antrian}/next', [DokterDashboardController::class, 'nextPatient'])->name('dokter.next');
    Route::post('/dokter/antrian/{antrian}/skip', [DokterDashboardController::class, 'skipPatient'])->name('dokter.skip');
});

// Admin routes
Route::middleware('role:admin')->group(function () {
    Route::get('/admin/dashboard', [DashboardController::class, 'admin'])->name('admin.dashboard');
});

// Dokter routes
Route::middleware('role:dokter')->group(function () {
    Route::resource('jadwal', JadwalDokterController::class);
    Route::get('/dokter/dashboard', [DokterDashboardController::class, 'index'])->name('dokter.dashboard');
    Route::post('/dokter/antrian/{antrian}/next', [DokterDashboardController::class, 'nextPatient'])->name('dokter.next');
    Route::post('/dokter/antrian/{antrian}/skip', [DokterDashboardController::class, 'skipPatient'])->name('dokter.skip');
    
});

// Pasien routes
Route::middleware('role:pasien')->group(function () {
    Route::get('/pasien/dashboard', [PasienDashboardController::class, 'index'])->name('pasien.dashboard'); 
    Route::get('/pendaftaran/create', [PasienPendaftaranController::class, 'create'])->name('pendaftaran.create');
    Route::post('/pendaftaran', [PasienPendaftaranController::class, 'store'])->name('pendaftaran.store');
    Route::get('/pendaftaran/jadwal-dokter', [PasienPendaftaranController::class, 'getJadwalDokter'])->name('pendaftaran.jadwal-dokter');
    Route::get('/pendaftaran/status', [PasienPendaftaranController::class, 'status'])->name('pendaftaran.status');
});

// Manajemen routes
Route::middleware('role:manajemen')->group(function () {
    Route::get('/manajemen/dashboard', [DashboardController::class, 'manajemen'])->name('manajemen.dashboard');
});

// Resepsionis routes
Route::middleware('role:resepsionis')->group(function () {
    Route::get('/resepsionis/dashboard', [ResepsionisDashboardController::class, 'index'])->name('resepsionis.dashboard');
    Route::post('/resepsionis/pendaftaran/{pendaftaran}/validate', [ResepsionisDashboardController::class, 'validate'])->name('resepsionis.validate');
});
