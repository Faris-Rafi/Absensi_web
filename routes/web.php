<?php

use App\Http\Controllers\AbsenController;
use App\Http\Controllers\DaftarKaryawanController;
use App\Http\Controllers\HistoryAbsenController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware('guest')->group(function () {
    Route::get('/', [LoginController::class, 'index']);
    Route::post('/', [LoginController::class, 'authenticate']);
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('index');
    });  
    Route::get('/dashboard/absen', [AbsenController::class, 'index']);
    Route::post('/dashboard/absen', [AbsenController::class, 'store']);
    Route::post('/dashboard/absen/pulang', [AbsenController::class, 'update']);
});

Route::middleware('admin')->group(function () {
    Route::get('/dashboard/daftar-karyawan', [DaftarKaryawanController::class, 'index']);
    Route::get('/dashboard/history-absen', [HistoryAbsenController::class, 'index']);
    Route::get('/dashboard/bukti-absen', [HistoryAbsenController::class, 'show']);
});

Route::post('/logout', [LoginController::class, 'logout']);

