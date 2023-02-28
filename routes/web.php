<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AbsenController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PulangAwalController;
use App\Http\Controllers\KaryawanCutiController;
use App\Http\Controllers\RiwayatAbsenController;
use App\Http\Controllers\DaftarKaryawanController;

Route::middleware('guest')->group(function () {
    Route::get('/', [LoginController::class, 'index']);
    Route::post('/', [LoginController::class, 'authenticate']);
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::get('/dashboard/absen', [AbsenController::class, 'index']);
    Route::post('/dashboard/absen/masuk', [AbsenController::class, 'store']);
    Route::post('/dashboard/absen/pulang/{attendance:uuid}', [AbsenController::class, 'update']);
    Route::post('/dashboard/absen/pulang-awal', [AbsenController::class, 'pengajuan']);
    Route::get('/dashboard/cuti-sakit', [KaryawanCutiController::class, 'index']);
    Route::post('/dashboard/cuti-sakit', [KaryawanCutiController::class, 'store']);
    Route::get('/dashboard/profile', [ProfileController::class, 'index']);
    Route::put('/dashboard/profile/update', [ProfileController::class, 'update']);
    Route::get('/dashboard/profile/riwayat', [ProfileController::class, 'show']);
});

Route::middleware('admin')->group(function () {
    Route::get('/dashboard/daftar-karyawan', [DaftarKaryawanController::class, 'index']);
    Route::get('/dashboard/register', [DaftarKaryawanController::class, 'create']);
    Route::post('/dashboard/register', [DaftarKaryawanController::class, 'store']);
    Route::delete('/dashboard/daftar-karyawan/{user:email}', [DaftarKaryawanController::class, 'destroy']);
    Route::get('/dashboard/daftar-karyawan/edit/{user:email}', [DaftarKaryawanController::class, 'edit']);
    Route::put('/dashboard/register', [DaftarKaryawanController::class, 'update']);
    Route::get('/dashboard/riwayat-absen', [RiwayatAbsenController::class, 'index']);
    Route::get('/dashboard/pulang-awal', [PulangAwalController::class, 'index']);
    Route::post('/dashboard/pulang-awal/approve/{attendance:uuid}', [PulangAwalController::class, 'approve']);
    Route::post('/dashboard/pulang-awal/reject/{attendance:uuid}', [PulangAwalController::class, 'reject']);
    Route::get('/dashboard/pengajuan-cuti-sakit', [KaryawanCutiController::class, 'show']);
    Route::post('/dashboard/pengajuan-cuti-sakit/approve/{modelsRequest:uuid}', [KaryawanCutiController::class, 'update']);
    Route::delete('/dashboard/pengajuan-cuti-sakit/reject/{modelsRequest:uuid}', [KaryawanCutiController::class, 'destroy']);
    Route::get('/dashboard/riwayat-absen/filter/{userId?}/{year?}/{date?}', [RiwayatAbsenController::class, 'Filter']);
});

Route::post('/logout', [LoginController::class, 'logout']);
