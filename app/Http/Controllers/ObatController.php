<?php

namespace App\Http\Controllers;

use App\Models\Obat;
use App\Models\Suplier;
use Illuminate\Http\Request;

class ObatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.obat.dashboardDaftarObat', ['obats' => Obat::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.obat.dashboardTambahObat', ['supliers' => Suplier::all()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'namaObat' =>'required|max:255|',
            'jenis' =>'required|max:255|',
            'satuan' =>'required|max:255|',
            'hargaBeli' =>'required|integer|',
            'hargaJual' =>'required|integer|',
            'stok' =>'required|integer|',
            'kdSuplier' => 'required|exists:supliers,kdSuplier'

        ], [
            'namaObat.required' => 'Nama Obat Wajib Diisi.',
            'jenis.required' => 'Jenis Obat tidak boleh kosong.',
            'satuan.required' => 'Satuan wajib diisi.',
            'hargaBeli.required' => 'Harga Beli wajib diisi.',
            'hargaJual.required' => 'Harga Jual wajib diisi.',
            'stok.required' => 'Stok wajib diisi.',
            'kdSuplier.required' => 'Nama Supplier wajib diisi.',
            
            'namaObat.max' => 'Nama Obat maksimal 255 karakter.',
            'jenis.max' => 'Jenis Obat maksimal 255 karakter.',
            'satuan.max' => 'Satuan Obat maksimal 255 karakter.',
            'hargaBeli.integer' => 'Harga Beli Harus Angka',
            'hargaJual.integer' => 'Harga Jual Harus Angka',
            'stok.integer' => 'Stok Harus Angka',
        ]);


        try{
            Obat::create($validateData);
            return redirect('/dashboard/obat')->with('success', 'Berhasil Menambahkan Obat Baru');
        }catch (\Exception $e){
            
            return redirect('/dashboard/obat')->with('error', 'Gagal Menambahkan Obat Baru');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Obat $obat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Obat $obat)
    {
        try {
            
            return view('admin.obat.dashboardEditObat', [
                'obat' => $obat], ['supliers' => Suplier::all()]);
        } catch (\Exception $e) {
            abort(404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Obat $obat)
    {



        $validateData = $request->validate([
            'namaObat' =>'sometimes|required|max:255|unique:obats,namaObat,'  . $obat->kdObat . ',kdObat',
            'jenis' =>'required|max:255|',
            'satuan' =>'required|max:255|',
            'hargaBeli' =>'required|integer|',
            'hargaJual' =>'required|integer|',
            'stok' =>'required|integer|',
            'kdSuplier' => 'required|exists:supliers,kdSuplier'

        ], [
            'namaObat.required' => 'Nama Obat Wajib Diisi.',
            'jenis.required' => 'Jenis Obat tidak boleh kosong.',
            'satuan.required' => 'Satuan wajib diisi.',
            'hargaBeli.required' => 'Harga Beli wajib diisi.',
            'hargaJual.required' => 'Harga Jual wajib diisi.',
            'stok.required' => 'Stok wajib diisi.',
            'kdSuplier.required' => 'Nama Supplier wajib diisi.',
            
            'namaObat.max' => 'Nama Obat maksimal 255 karakter.',
            'jenis.max' => 'Jenis Obat maksimal 255 karakter.',
            'satuan.max' => 'Satuan Obat maksimal 255 karakter.',
            'hargaBeli.integer' => 'Harga Beli Harus Angka',
            'hargaJual.integer' => 'Harga Jual Harus Angka',
            'stok.integer' => 'Stok Harus Angka',
        ]);

        $nama = $obat->namaObat;
        try {
            
            Obat::where('kdObat', $obat->kdObat)->update(array_filter($validateData));
        
            return redirect('/dashboard/obat')->with('success', 'Data Obat Yang Bernama '.$nama.' Berhasil Diubah');
        } catch (\Exception $e) {
            return redirect('/dashboard/obat')->with('error', 'Data Obat Yang Bernama '.$nama.'Gagal Diubah');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Obat $obat)
    {
        $nama = $obat->namaObat;
        try{
            Obat::destroy($obat->kdObat);
            return redirect('/dashboard/obat')->with('success', 'Data Obat Yang Bernama '. $nama . ' Berhasil Di Hapus');

        }catch (\Exception $e){
            return redirect('/dashboard/obat')->with('error', 'Data Obat Yang Bernama '. $nama . ' Gagal Di Hapus');
        }
    }
}
