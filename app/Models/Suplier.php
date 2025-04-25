<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Suplier extends Model
{
    /** @use HasFactory<\Database\Factories\SuplierFactory> */
    use HasFactory;

    protected $primaryKey = 'kdSuplier';

    protected $keyType = 'int';  

    protected $guarded =['kdSuplier'];

    public function suplierPembelian(): HasMany{
        return $this->hasMany(Pembelian::class);   
    }

    public function suplierKeObat(): HasMany{
        return $this->hasMany(Obat::class);   
    }
}
