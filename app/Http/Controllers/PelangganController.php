<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Illuminate\Http\Request;

class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.pelanggan.dashboardDaftarPelanggan', ['pelanggans' => Pelanggan::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pelanggan.dashboardTambahPelanggan');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'namaPelanggan' =>'required|max:255|',
            'alamat' =>'required|max:255|',
            'kota' =>'required|max:255|',
            'telpon' =>'required|max:255|'

        ], [
            'namaPelanggan.required' => 'Nama Pelanggan Wajib Diisi.',
            'alamat.required' => 'Alamat tidak boleh kosong.',
            'kota.required' => 'Kota wajib diisi.',
            'telpon.required' => 'Nomor Telepon wajib diisi.',
            'namaPelanggan.max' => 'Nama pelanggan maksimal 255 karakter.',
            'alamat.max' => 'Alamat maksimal 255 karakter.',
            'kota.max' => 'Nama kota maksimal 255 karakter.',
            'telpon.max' => 'Nomor telepon maksimal 255 karakter.',
        ]);


        try{
            Pelanggan::create($validateData);
            return redirect('/dashboard/pelanggan')->with('success', 'Berhasil Menambahkan Pelanggan Baru');
        }catch (\Exception $e){
            
            return redirect('/dashboard/pelanggan')->with('error', 'Gagal Menambahkan Pelanggan Baru');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Pelanggan $pelanggan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pelanggan $pelanggan)
    {
        try {
            
            return view('admin.pelanggan.dashboardEditPelanggan', [
                'pelanggan' => $pelanggan
            ]);
        } catch (\Exception $e) {
            abort(404); // Jika dekripsi gagal, tampilkan halaman 404
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pelanggan $pelanggan)
    {   
        $validateData = $request->validate([
            'namaPelanggan' =>'sometimes|required|max:255|unique:pelanggans,namaPelanggan,'  . $pelanggan->kdPelanggan . ',kdPelanggan',
            'alamat' =>'sometimes|required|max:255',
            'kota' =>'sometimes|required|max:255',
            'telpon' =>'sometimes|required|max:255',

        ], [
            'namaPelanggan.required' => 'Nama Pelanggan Wajib Diisi.',
            'alamat.required' => 'Alamat tidak boleh kosong.',
            'kota.required' => 'Kota wajib diisi.',
            'telpon.required' => 'Nomor Telepon wajib diisi.',
            'namaPelanggan.max' => 'Nama pelanggan maksimal 255 karakter.',
            'alamat.max' => 'Alamat maksimal 255 karakter.',
            'kota.max' => 'Nama kota maksimal 255 karakter.',
            'telpon.max' => 'Nomor telepon maksimal 255 karakter.',
        ]);

        $nama = $pelanggan->namaPelanggan;
        try {
            
            Pelanggan::where('kdPelanggan', $pelanggan->kdPelanggan)->update(array_filter($validateData));
        
            return redirect('/dashboard/pelanggan')->with('success', 'Data Pelanggan Yang Bernama '.$nama.' Berhasil Diubah');
        } catch (\Exception $e) {
            return redirect('/dashboard/pelanggan')->with('error', 'Data Pelanggan Yang Bernama '.$nama.'Gagal Diubah');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pelanggan $pelanggan)
    {
        $nama = $pelanggan->namaPelanggan;
        try{
            Pelanggan::destroy($pelanggan->kdPelanggan);
            return redirect('/dashboard/pelanggan')->with('success', 'Data Pelanggan Yang Bernama '. $nama . ' Berhasil Di Hapus');

        }catch (\Exception $e){
            return redirect('/dashboard/klaster')->with('error', 'Data Pelanggan Yang Bernama '. $nama . ' Gagal Di Hapus');
        }
    }
}
