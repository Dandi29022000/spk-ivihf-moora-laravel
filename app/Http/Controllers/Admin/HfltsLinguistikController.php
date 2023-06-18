<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\hfltsLinguistik;
use App\Models\Linguistik;
use Illuminate\Http\Request;

class HfltsLinguistikController extends Controller
{
    public function index(Request $request)
    {	
       
        $hfltsLinguistik = hfltsLinguistik::all();
        
        return view('admin/package/hflts/index', compact('hfltsLinguistik'));
    }

    public function create()
    {
        $Linguistik = Linguistik::all();
        return view('admin/package/hflts/create', ['Linguistik' => $Linguistik]);
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
            'id_linguistik' => 'required',
            'A' => 'required',
            'B' => 'required',
            'C' => 'required',
            'D' => 'required',
        ]);

        // Fungsi eloquent untuk menambah data
        $Linguistik = new hfltsLinguistik;
        $Linguistik->id = $request->get('id');
        $Linguistik->id_linguistik = $request->get('id_linguistik');
        $Linguistik->A = $request->get('A');
        $Linguistik->B = $request->get('B');
        $Linguistik->C = $request->get('C');
        $Linguistik->D = $request->get('D');
        $Linguistik->save();

        // Jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('hflts.index')
            ->with('success', 'HFLTS - Linguistik Berhasil Ditambahkan');
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
        $hfltsLinguistik = hfltsLinguistik::with('hflts_linguistik')->where('id', $id)->first();
        $Linguistik = Linguistik::all();
        return view('admin/package/hflts/update', ['Linguistik' => $Linguistik,'hfltsLinguistik' => $hfltsLinguistik]);
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
            'id_linguistik' => 'required',
            'A' => 'required',
            'B' => 'required',
            'C' => 'required',
            'D' => 'required',
        ]);

        $Linguistik = new Linguistik;
        $Linguistik->id = $request->get('id_linguistik');

        // Fungsi eloquent untuk mengupdate data inputan kita
        hfltsLinguistik::find($id)->update($request->all());

        // Jika data berhasil diupdate, akan kembali ke halaman utama
        return redirect()->route('hflts.index')
            ->with('success', 'HFLTS - Linguistik Berhasil Diupdate');
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
        hfltsLinguistik::find($id)->delete();
        return redirect()->route('hflts.index')
            ->with('success', 'HFLTS - Linguistik Berhasil Dihapus');
    }
}
