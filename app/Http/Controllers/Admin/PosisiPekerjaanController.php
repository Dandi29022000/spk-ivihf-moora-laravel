<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PosisiPekerjaan;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PosisiPekerjaanController extends Controller
{
    public function index(Request $request)
    {
        $PosisiPekerjaan = PosisiPekerjaan::where([
            ['posisi','!=',Null],
            [function ($query) use ($request) {
                if (($term = $request->term)) {
                    $query->orWhere('posisi', 'LIKE', '%' . $term . '%')->get();
                }
            }]
        ])
            ->orderBy('id', 'asc')
            ->simplePaginate(10);

        return view('admin/package/posisipekerjaan/index', compact('PosisiPekerjaan'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/package/posisipekerjaan/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'posisi' => 'required'
        ]);

        PosisiPekerjaan::create([
            'posisi' => $request->posisi
        ]);

        return redirect()->route('posisipekerjaan.index')
        ->with('success', 'Data Posisi Pekerjaan Berhasil Ditambahkan!');
    }


    public function show($id)
    {
        // $PosisiPekerjaan = PosisiPekerjaan::find($id);
        // return view('admin/package/PosisiPekerjaan/detail');
    }


    public function edit($id)
    {
        $PosisiPekerjaan = PosisiPekerjaan::find($id);
        // echo json_encode($LPosisiPekerjaan);die();
        return view('admin/package/posisipekerjaan/update', compact('PosisiPekerjaan'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'posisi' => 'required'
        ]);

        $update = PosisiPekerjaan::find($id);
        $update->posisi = $request->get('posisi');

        $update->save();

        //jika data berhasil diupdate, akan kembali ke halaman utama
        return redirect()->route('posisipekerjaan.index')
            ->with('success', 'Posisi Pekerjaan Berhasil Diupdate!');
    }

    public function destroy($id)
    {
        // Fungsi eloquent untuk menghapus data
        PosisiPekerjaan::find($id)->delete();
        return redirect('/admin/posisipekerjaan')
            ->with('success', 'Data Posisi Pekerjaan Berhasil Dihapus!');
    }
}
