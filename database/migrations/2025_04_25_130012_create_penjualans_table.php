<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('penjualans', function (Blueprint $table) {
            $table->bigIncrements('kdPenjualan')->primary();
            $table->timestamp('tanggalPenjualan')->useCurrent();
            $table->unsignedBigInteger('kdPelanggan'); 
            $table->foreign('kdPelanggan')->references('kdPelanggan')->on('pelanggans');
            $table->integer('total');
            $table->integer('diskon');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penjualans');
    }
};
