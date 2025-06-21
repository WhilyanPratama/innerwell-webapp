<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\JadwalDokterController;
use App\Http\Controllers\ResepsionisDashboardController;
use App\Http\Controllers\PasienPendaftaranController;
use App\Http\Controllers\DokterDashboardController;
use App\Http\Controllers\PasienDashboardController;
use App\Http\Controllers\AntrianBoardController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\ManajemenDashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MidtransController; 

Route::get('/', function () {
    return view('home');
});

Route::get('/antrian/board/{poli}', [AntrianBoardController::class, 'index'])->name('antrian.board');

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
    Route::get('/resepsionis/dashboard', [ResepsionisDashboardController::class, 'index'])->name('resepsionis.dashboard');
    Route::get('/dokter/dashboard', [DokterDashboardController::class, 'index'])->name('dokter.dashboard');
    Route::post('/dokter/antrian/{antrian}/next', [DokterDashboardController::class, 'nextPatient'])->name('dokter.next');
    Route::post('/dokter/antrian/{antrian}/skip', [DokterDashboardController::class, 'skipPatient'])->name('dokter.skip');
    Route::post('/dokter/antrian/{antrian}/process-skipped', [DokterDashboardController::class, 'processSkippedPatient'])->name('dokter.process-skipped');
    Route::get('/dokter/medical-record/{pasien}', [DokterDashboardController::class, 'viewMedicalRecord'])->name('dokter.medical-record');
    Route::get('/dashboard/pasien/pembayaran', [PembayaranController::class, 'index'])->name('pasien.pembayaran');
    Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/pembayaran/create/{rekamMedisDetail}', [AdminDashboardController::class, 'create'])->name('pembayaran.create');
    Route::post('/pembayaran/store/{rekamMedisDetail}', [AdminDashboardController::class, 'store'])->name('pembayaran.store');
    Route::get('/pembayaran/show/{pembayaran}', [AdminDashboardController::class, 'show'])->name('pembayaran.show');
});

// Admin routes
Route::middleware('role:admin')->group(function () {
    Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/pembayaran/create/{rekamMedisDetail}', [AdminDashboardController::class, 'create'])->name('pembayaran.create');
    Route::post('/pembayaran/store/{rekamMedisDetail}', [AdminDashboardController::class, 'store'])->name('pembayaran.store');
    Route::get('/pembayaran/show/{pembayaran}', [AdminDashboardController::class, 'show'])->name('pembayaran.show');
});

// Dokter routes
Route::middleware('role:dokter')->group(function () {
    Route::resource('jadwal', JadwalDokterController::class);
    Route::get('/dokter/dashboard', [DokterDashboardController::class, 'index'])->name('dokter.dashboard');
    Route::post('/dokter/antrian/{antrian}/next', [DokterDashboardController::class, 'nextPatient'])->name('dokter.next');
    Route::post('/dokter/antrian/{antrian}/skip', [DokterDashboardController::class, 'skipPatient'])->name('dokter.skip');
    Route::post('/dokter/antrian/{antrian}/process-skipped', [DokterDashboardController::class, 'processSkippedPatient'])->name('dokter.process-skipped');
    Route::get('/dokter/medical-record/{pasien}', [DokterDashboardController::class, 'viewMedicalRecord'])->name('dokter.medical-record');
    
});

// Pasien routes
Route::middleware(['auth', 'role:pasien'])->group(function () {
    Route::get('/pasien/dashboard', [PasienDashboardController::class, 'index'])->name('pasien.dashboard'); 
    Route::get('/pendaftaran/create', [PasienPendaftaranController::class, 'create'])->name('pendaftaran.create');
    Route::post('/pendaftaran', [PasienPendaftaranController::class, 'store'])->name('pendaftaran.store');
    Route::get('/pendaftaran/jadwal-dokter', [PasienPendaftaranController::class, 'getJadwalDokter'])->name('pendaftaran.jadwal-dokter');
    Route::get('/pendaftaran/status', [PasienPendaftaranController::class, 'status'])->name('pendaftaran.status');
    Route::get('/antrian/board/{poli}', [AntrianBoardController::class, 'index'])->name('antrian.board');
    Route::get('/pembayaran/show/{pembayaran}', [PasienDashboardController::class, 'showInvoice'])->name('pembayaran.show');
    Route::get('/pasien/pembayaran/pay/{pembayaran}', [MidtransController::class, 'pay'])->name('pasien.pembayaran.pay');
});

// Manajemen routes
Route::middleware('role:manajemen')->group(function () {
    Route::get('/manajemen/dashboard', [ManajemenDashboardController::class, 'index'])->name('manajemen.dashboard');
    Route::get('/manajemen/invoice/{pembayaran}', [ManajemenDashboardController::class, 'showInvoice'])->name('manajemen.invoice.show');

});

// Resepsionis routes
Route::middleware('role:resepsionis')->group(function () {
    Route::get('/resepsionis/dashboard', [ResepsionisDashboardController::class, 'index'])->name('resepsionis.dashboard');
    Route::post('/resepsionis/dashboard/{pendaftaran}/validate', [ResepsionisDashboardController::class, 'validate'])->name('resepsionis.validate');
});

// Midtrans Notification Route 
Route::post('/midtrans/callback', [MidtransController::class, 'callback'])->name('midtrans.callback');
