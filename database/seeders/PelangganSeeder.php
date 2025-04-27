<?php

namespace Database\Seeders;

use App\Models\Pelanggan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PelangganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Pelanggan::create([
            'namaPelanggan'=> 'Daffa',
            'alamat'=> 'Jalan Merdeka',
            'kota'=> 'Probolinggo',
            'telpon'=> '0897777',
        ]);
        
        Pelanggan::create([
            'namaPelanggan'=> 'Rawan',
            'alamat'=> 'Jalan Pelita',
            'kota'=> 'Jember',
            'telpon'=> '12345',
        ]);
    }
}
