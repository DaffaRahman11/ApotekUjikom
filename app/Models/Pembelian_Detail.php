<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pembelian_Detail extends Model
{
    /** @use HasFactory<\Database\Factories\PembelianDetailFactory> */
    use HasFactory;

    protected $guarded =['id'];

    public function pembelianDetailObat(): BelongsTo{
        return $this->belongsTo(Obat::class, 'kdObat');
    }
    
    public function detailKePembelian(): BelongsTo{
        return $this->belongsTo(Pembelian::class, 'kdPembelian');
    }
}
