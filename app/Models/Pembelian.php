<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pembelian extends Model
{
    /** @use HasFactory<\Database\Factories\PembelianFactory> */
    use HasFactory;

    protected $primaryKey = 'kdPembelian';

    protected $keyType = 'int';  

    protected $guarded =['kdPembelian'];

    public function pembelianSuplier(): BelongsTo{
        return $this->belongsTo(Suplier::class, 'kdSuplier');
    }

    public function PembelianKeDetail(): HasMany{
        return $this->hasMany(Pembelian_Detail::class);   
    }
}
