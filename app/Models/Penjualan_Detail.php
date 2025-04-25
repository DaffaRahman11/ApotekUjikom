<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Penjualan_Detail extends Model
{
    /** @use HasFactory<\Database\Factories\PenjualanDetailFactory> */
    use HasFactory;

    protected $guarded =['id'];

    public function detailKePenjualan(): BelongsTo{
        return $this->belongsTo(Penjualan::class, 'kdPenjualan');
    }
    
    public function penjualanDetailObat(): BelongsTo{
        return $this->belongsTo(Obat::class, 'kdObat');
    }
}
