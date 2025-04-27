<?php

namespace Database\Seeders;

use App\Models\Obat;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ObatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Obat::create([
            'namaObat'=> 'Paracetamol',
            'jenis'=> 'Demam',
            'satuan'=> 'Kaplet',
            'hargaBeli'=> '4500',
            'hargaJual'=> '5000',
            'stok'=> '10',
            'kdSuplier'=> '2',
        ]);
        Obat::create([
            'namaObat'=> 'Bodrex ',
            'jenis'=> 'Sakit Kepala',
            'satuan'=> 'Pack',
            'hargaBeli'=> '10000',
            'hargaJual'=> '11000',
            'stok'=> '15',
            'kdSuplier'=> '1',
        ]);
        
    }
}
