<?php

use App\Http\Controllers\PelangganController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('admin.suplier.dashboardDaftarSuplier');
});

Route::resource('/dashboard/pelanggan', PelangganController::class);