<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\SuplierController;
use App\Http\Controllers\PelangganController;

Route::get('/', function () {
    return view('admin.suplier.dashboardDaftarSuplier');
});

Route::resource('/dashboard/pelanggan', PelangganController::class);
Route::resource('/dashboard/suplier', SuplierController::class);
Route::resource('/dashboard/obat', ObatController::class);