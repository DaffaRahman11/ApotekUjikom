<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use App\Models\Pembelian;
use App\Models\Pembelian_Detail;
use App\Models\Suplier;
use Illuminate\Http\Request;

class PembelianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.pembelian.dashboardDaftarPembelian', ['pembelians' => Pembelian::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pembelian.dashboardTambahPembelian', ['obats' => Obat::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        {
            // Validasi input
            $request->validate([
                'namaSuplier' => 'required|string',
                'obat' => 'required|array',
            ]);
    
            // Simpan data pelanggan jika belum ada
            $suplier = Suplier::firstOrCreate(['namaSuplier' => $request->namaSuplier]);
    
            // Simpan data penjualan
            $pembelian = Pembelian::create([
                'kdSuplier' => $suplier->kdSuplier,
                'total' => 0, // Total nanti dihitung berdasarkan detail penjualan
                'diskon' => 0, // Jika ada diskon, nanti bisa ditambahkan
            ]);
    
            $totalPembelian = 0;
    
            // Proses data obat yang dibeli dan simpan di penjualan_details
            foreach ($request->obat as $obatData) {
                // Pastikan hanya obat yang dipilih yang diproses
                if (isset($obatData['checked']) && $obatData['checked'] == '1') {
                    $obat = Obat::find($obatData['kdObat']);
                    $jumlah = $obatData['jumlah'];
    
                    if ($obat && $jumlah > 0) {
                        // Menambah stok obat
                        $obat->stok += $jumlah;
                        $obat->save();
    
                        // Menambahkan data ke penjualan_details
                        Pembelian_Detail::create([
                            'kdPembelian' => $pembelian->kdPembelian,
                            'kdObat' => $obatData['kdObat'],
                            'jumlah' => $jumlah,
                        ]);
    
                        // Menghitung total penjualan
                        $totalPembelian += $obat->hargaBeli * $jumlah;
                    }
                }
            }
    
            // Update total penjualan
            $pembelian->update(['total' => $totalPembelian]);
    
            // Kirim data transaksi penjualan ke view selanjutnya
            return redirect()->route('penjualan.index')->with('success', 'Transaksi berhasil.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Pembelian $pembelian)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pembelian $pembelian)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pembelian $pembelian)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pembelian $pembelian)
    {
        //
    }
}
