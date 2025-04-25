<?php

namespace App\Models;

use App\Models\Pelanggan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Penjualan extends Model
{
    /** @use HasFactory<\Database\Factories\PenjualanFactory> */
    use HasFactory;

    protected $primaryKey = 'kdPenjualan';

    protected $keyType = 'int';  

    protected $guarded =['kdPenjualan'];

    public function penjualanPelanggan(): BelongsTo{
        return $this->belongsTo(Pelanggan::class, 'kdPelanggan');
    }

    public function penjualanKeDetail(): HasMany{
        return $this->hasMany(Penjualan_Detail::class);   
    }
}
