<?php

namespace App\Models;

use App\Models\Penjualan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pelanggan extends Model
{
    /** @use HasFactory<\Database\Factories\PelangganFactory> */
    use HasFactory;

    protected $primaryKey = 'kdPelanggan';

    protected $keyType = 'int';  

    protected $guarded =['kdPelanggan'];

    public function pelangganPenjualan(): HasMany{
        return $this->hasMany(Penjualan::class);   
    }

}
