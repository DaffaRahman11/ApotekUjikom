<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Obat extends Model
{
    /** @use HasFactory<\Database\Factories\ObatFactory> */
    use HasFactory;

    protected $primaryKey = 'kdObat';

    protected $keyType = 'int';  

    protected $guarded =['kdObat'];

    public function obatPenjualanDetail(): HasMany{
        return $this->hasMany(Penjualan_Detail::class);   
    }
    
    public function obatPembelianDetail(): HasMany{
        return $this->hasMany(Pembelian_Detail::class);   
    }

    public function obatKeSuplier(): BelongsTo{
        return $this->belongsTo(Suplier::class, 'kdSuplier');
    }
}
