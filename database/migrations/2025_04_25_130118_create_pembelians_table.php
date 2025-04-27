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
        Schema::create('pembelians', function (Blueprint $table) {
            $table->bigIncrements('kdPembelian')->primary();
            $table->timestamp('tanggalPembelian')->useCurrent();
            $table->unsignedBigInteger('kdSuplier'); 
            $table->foreign('kdSuplier')->references('kdSuplier')->on('supliers');
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
        Schema::dropIfExists('pembelians');
    }
};
