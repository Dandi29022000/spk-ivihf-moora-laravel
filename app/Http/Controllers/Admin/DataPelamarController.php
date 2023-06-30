<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DataPelamar;
use App\Models\User;
use Illuminate\Http\Request;

class DataPelamarController extends Controller
{
    public function index(Request $request)
    {	
       
        $DataPelamar = DataPelamar::all();
        
        return view('admin/package/datapelamar/index', compact('DataPelamar'));
    }

    public function create()
    {
        $User = User::all();
        return view('admin/package/datapelamar/create', ['User' => $User]);
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
            'id_user' => 'required',
            'status' => 'required',
        ]);

        // Fungsi eloquent untuk menambah data
        $User = new DataPelamar;
        $User->id = $request->get('id');
        $User->id_user = $request->get('id_user');
        $User->status = $request->get('status');
        $User->save();

        // Jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('datapelamar.index')
            ->with('success', 'Data Pelamar Berhasil Ditambahkan!');
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
        $DataPelamar = DataPelamar::find($id);
        $User = User::all();
        return view('admin/package/datapelamar/update', ['User' => $User,'DataPelamar' => $DataPelamar]);
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
            'id_user' => 'required',
            'status' => 'required',
        ]);

        // Fungsi eloquent untuk mengupdate data inputan kita
        DataPelamar::find($id)->update($request->all());

        // Jika data berhasil diupdate, akan kembali ke halaman utama
        return redirect()->route('datapelamar.index')
            ->with('success', 'Data Pelamar Berhasil Diupdate!');
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
        DataPelamar::find($id)->delete();
        return redirect()->route('datapelamar.index')
            ->with('success', 'Data Pelamar Berhasil Dihapus!');
    }
}
