<?php

namespace App\Http\Controllers;

use App\Models\Suplier;
use Illuminate\Http\Request;

class SuplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.suplier.dashboardDaftarSuplier', ['supliers' => Suplier::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.suplier.dashboardTambahSuplier');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'namaSuplier' =>'required|max:255|',
            'alamat' =>'required|max:255|',
            'kota' =>'required|max:255|',
            'telpon' =>'required|max:255|'

        ], [
            'namaSuplier.required' => 'Nama Supplier Wajib Diisi.',
            'alamat.required' => 'Alamat tidak boleh kosong.',
            'kota.required' => 'Kota wajib diisi.',
            'telpon.required' => 'Nomor Telepon wajib diisi.',
            'namaSuplier.max' => 'Nama Supplier maksimal 255 karakter.',
            'alamat.max' => 'Alamat maksimal 255 karakter.',
            'kota.max' => 'Nama kota maksimal 255 karakter.',
            'telpon.max' => 'Nomor telepon maksimal 255 karakter.',
        ]);


        try{
            Suplier::create($validateData);
            return redirect('/dashboard/suplier')->with('success', 'Berhasil Menambahkan Supplier Baru');
        }catch (\Exception $e){
            
            return redirect('/dashboard/suplier')->with('error', 'Gagal Menambahkan Supplier Baru');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Suplier $suplier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Suplier $suplier)
    {
        try {
            
            return view('admin.suplier.dashboardEditSuplier', [
                'suplier' => $suplier
            ]);
        } catch (\Exception $e) {
            abort(404); // Jika dekripsi gagal, tampilkan halaman 404
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Suplier $suplier)
    {
        $validateData = $request->validate([
            'namaSuplier' =>'sometimes|required|max:255|unique:supliers,namaSuplier,'  . $suplier->kdSuplier . ',kdSuplier',
            'alamat' =>'sometimes|required|max:255',
            'kota' =>'sometimes|required|max:255',
            'telpon' =>'sometimes|required|max:255',

        ], [
            'namaSuplier.required' => 'Nama Supplier Wajib Diisi.',
            'alamat.required' => 'Alamat tidak boleh kosong.',
            'kota.required' => 'Kota wajib diisi.',
            'telpon.required' => 'Nomor Telepon wajib diisi.',
            'namaSuplier.max' => 'Nama Supplier maksimal 255 karakter.',
            'alamat.max' => 'Alamat maksimal 255 karakter.',
            'kota.max' => 'Nama kota maksimal 255 karakter.',
            'telpon.max' => 'Nomor telepon maksimal 255 karakter.',
        ]);

        $nama = $suplier->namaSuplier;
        try {
            
            Suplier::where('kdSuplier', $suplier->kdSuplier)->update(array_filter($validateData));
        
            return redirect('/dashboard/suplier')->with('success', 'Data Supplier Yang Bernama '.$nama.' Berhasil Diubah');
        } catch (\Exception $e) {
            return redirect('/dashboard/suplier')->with('error', 'Data Supplier Yang Bernama '.$nama.'Gagal Diubah');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Suplier $suplier)
    {
        $nama = $suplier->namaSuplier;
        try{
            Suplier::destroy($suplier->kdSuplier);
            return redirect('/dashboard/suplier')->with('success', 'Data Supplier Yang Bernama '. $nama . ' Berhasil Di Hapus');

        }catch (\Exception $e){
            return redirect('/dashboard/suplier')->with('error', 'Data Supplier Yang Bernama '. $nama . ' Gagal Di Hapus');
        }
    }
}
