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
        Schema::create('penjualan__details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kdPenjualan'); 
            $table->foreign('kdPenjualan')->references('kdPenjualan')->on('penjualans');
            $table->unsignedBigInteger('kdObat'); 
            $table->foreign('kdObat')->references('kdObat')->on('obats');
            $table->integer('jumlah');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penjualan__details');
    }
};
