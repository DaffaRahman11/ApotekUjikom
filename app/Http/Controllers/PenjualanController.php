<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use App\Models\Pelanggan;
use App\Models\Penjualan;
use App\Models\Penjualan_Detail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.penjualan.dashboardDaftarPenjualan', ['penjualans' => Penjualan::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.penjualan.dashboardTambahPenjualan', ['obats' => Obat::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'namaPelanggan' => 'required|string',
            'obat' => 'required|array',
        ]);

        // Simpan data pelanggan jika belum ada
        $pelanggan = Pelanggan::firstOrCreate(['namaPelanggan' => $request->namaPelanggan]);

        // Simpan data penjualan
        $penjualan = Penjualan::create([
            'kdPelanggan' => $pelanggan->kdPelanggan,
            'total' => 0, // Total nanti dihitung berdasarkan detail penjualan
            'diskon' => 0, // Jika ada diskon, nanti bisa ditambahkan
        ]);

        $totalPenjualan = 0;

        // Proses data obat yang dibeli dan simpan di penjualan_details
        foreach ($request->obat as $obatData) {
            // Pastikan hanya obat yang dipilih yang diproses
            if (isset($obatData['checked']) && $obatData['checked'] == '1') {
                $obat = Obat::find($obatData['kdObat']);
                $jumlah = $obatData['jumlah'];

                if ($obat && $jumlah > 0) {
                    // Mengurangi stok obat
                    $obat->stok -= $jumlah;
                    $obat->save();

                    // Menambahkan data ke penjualan_details
                    Penjualan_Detail::create([
                        'kdPenjualan' => $penjualan->kdPenjualan,
                        'kdObat' => $obatData['kdObat'],
                        'jumlah' => $jumlah,
                    ]);

                    // Menghitung total penjualan
                    $totalPenjualan += $obat->hargaJual * $jumlah;
                }
            }
        }

        // Update total penjualan
        $penjualan->update(['total' => $totalPenjualan]);

        // Kirim data transaksi penjualan ke view selanjutnya
        return redirect()->route('penjualan.index')->with('success', 'Transaksi berhasil.');
    }



    /**
     * Display the specified resource.
     */
    public function show(Penjualan $penjualan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Penjualan $penjualan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Penjualan $penjualan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Penjualan $penjualan)
    {
        //
    }
}
