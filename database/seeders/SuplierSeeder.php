<?php

namespace Database\Seeders;

use App\Models\Suplier;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SuplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Suplier::create([
            'namaSuplier'=> 'PT Bodrexin',
            'alamat'=> 'Jakarta Timur',
            'kota'=> 'Jakarta',
            'telpon'=> '12345',
        ]);
        Suplier::create([
            'namaSuplier'=> 'PT Paracetamol',
            'alamat'=> 'Sumbersari',
            'kota'=> 'Jember',
            'telpon'=> '12345',
        ]);
    }
}
