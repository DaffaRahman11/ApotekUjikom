<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SuplierController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\PembelianController;
use App\Http\Controllers\PenjualanController;


Route::get('/', [LoginController::class, 'index'])->name('login');
Route::post('/', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);
Route::resource('/dashboard/pelanggan', PelangganController::class);
Route::resource('/dashboard/suplier', SuplierController::class);
Route::resource('/dashboard/obat', ObatController::class);
Route::resource('/dashboard/penjualan', PenjualanController::class);
Route::resource('/dashboard/pembelian', PembelianController::class);