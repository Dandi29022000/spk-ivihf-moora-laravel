<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Transaksi;
use App\Models\DataPeran;
use App\Models\DataPelamar;
use App\Models\PosisiPekerjaan;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function index(Request $request)
    {	
       
        $Transaksi = Transaksi::all();
        
        return view('admin/package/transaksi/index', compact('Transaksi'));
    }

    public function create()
    {
        $DataPeran = DataPeran::all();
        $PosisiPekerjaan = PosisiPekerjaan::all();
        $DataPelamar = DataPelamar::all();

        return view('admin/package/transaksi/create', 
        ['DataPeran' => $DataPeran, 
        'DataPelamar' => $DataPelamar, 
        'PosisiPekerjaan' => $PosisiPekerjaan]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Melakukan validasi data
        $request->validate([
            'tanggal' => 'required',
            'nama' => 'required',
            'keterangan' => 'required',
            'id_posisi' => 'required',
            'id_penilai' => 'required',
            'id_pelamar' => 'required',
        ]);

        // Fungsi eloquent untuk menambah data
        $User = new Transaksi;
        $User->id = $request->get('id');
        $User->tanggal = $request->get('tanggal');
        $User->nama = $request->get('nama');
        $User->keterangan = $request->get('keterangan');
        $User->id_posisi = $request->get('id_posisi');
        $User->id_penilai = $request->get('id_penilai');
        $User->id_pelamar = $request->get('id_pelamar');
        $User->save();

        // Jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('transaksi.index')
            ->with('success', 'Transaksi Berhasil Ditambahkan!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // Menampilkan detail data dengan menemukan berdasarkan Nim Mahasiswa untuk diedit
        $Transaksi = Transaksi::find($id);
        $DataPeran = DataPeran::all();
        $PosisiPekerjaan = PosisiPekerjaan::all();
        $DataPelamar = DataPelamar::all();

        return view('admin/package/transaksi/update', 
        ['DataPeran' => $DataPeran, 
        'DataPelamar' => $DataPelamar, 
        'PosisiPekerjaan' => $PosisiPekerjaan, 
        'Transaksi' => $Transaksi]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Melakukan validasi data
        $request->validate([
            'tanggal' => 'required',
            'nama' => 'required',
            'keterangan' => 'required',
            'id_posisi' => 'required',
            'id_penilai' => 'required',
            'id_pelamar' => 'required',
        ]);

        // Fungsi eloquent untuk mengupdate data inputan kita
        Transaksi::find($id)->update($request->all());

        // Jika data berhasil diupdate, akan kembali ke halaman utama
        return redirect()->route('transaksi.index')
            ->with('success', 'Transaksi Berhasil Diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Fungsi eloquent untuk menghapus data
        Transaksi::find($id)->delete();
        return redirect()->route('transaksi.index')
            ->with('success', 'Transaksi Berhasil Dihapus!');
    }
}
