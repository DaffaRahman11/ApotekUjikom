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
        Schema::create('obats', function (Blueprint $table) {
            $table->bigIncrements('kdObat')->primary();
            $table->string('namaObat');
            $table->string('jenis');
            $table->string('satuan');
            $table->integer('hargaBeli');
            $table->integer('hargaJual');
            $table->integer('stok');
            $table->unsignedBigInteger('kdSuplier'); 
            $table->foreign('kdSuplier')->references('kdSuplier')->on('supliers');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('obats');
    }
};
