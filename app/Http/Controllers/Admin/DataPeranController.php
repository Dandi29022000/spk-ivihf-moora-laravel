<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DataPeran;
use App\Models\User;
use Illuminate\Http\Request;

class DataPeranController extends Controller
{
    public function index(Request $request)
    {	
       
        $DataPeran = DataPeran::all();
        
        return view('admin/package/dataperan/index', compact('DataPeran'));
    }

    public function create()
    {
        $User = User::all();
        return view('admin/package/dataperan/create', ['User' => $User]);
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
        $User = new DataPeran;
        $User->id = $request->get('id');
        $User->id_user = $request->get('id_user');
        $User->status = $request->get('status');
        $User->save();

        // Jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('dataperan.index')
            ->with('success', 'Data Peran Admin Berhasil Ditambahkan!');
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
        $DataPeran = DataPeran::find($id);
        $User = User::all();
        return view('admin/package/dataperan/update', ['User' => $User,'DataPeran' => $DataPeran]);
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
        DataPeran::find($id)->update($request->all());

        // Jika data berhasil diupdate, akan kembali ke halaman utama
        return redirect()->route('dataperan.index')
            ->with('success', 'Data Peran Admin Berhasil Diupdate!');
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
        DataPeran::find($id)->delete();
        return redirect()->route('dataperan.index')
            ->with('success', 'Data Peran Admin Berhasil Dihapus!');
    }
}
