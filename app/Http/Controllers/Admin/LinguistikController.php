<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Linguistik;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LinguistikController extends Controller
{
    public function index(Request $request)
    {
        $Linguistik = Linguistik::where([
            [function ($query) use ($request) {
                if (($term = $request->term)) {
                    $query->orWhere('name', 'LIKE', '%' . $term . '%')
                        ->orWhere('email', 'LIKE', '%' . $term . '%')
                        ->orWhere('alamat', 'LIKE', '%' . $term . '%')
                        ->orWhere('tanggal_lahir', 'LIKE', '%' . $term . '%')
                        ->orWhere('jenis_kelamin', 'LIKE', '%' . $term . '%')->get();
                }
            }]
        ])
            ->orderBy('id', 'asc')
            ->simplePaginate(5);

        return view('admin/package/linguistik/index', compact('Linguistik'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/package/linguistik/create');
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
            'name' => 'required',
            'image' => 'required'
        ]);

        $photo      = $request->file('image');
        $photo_name = time() . '_photo_' . $photo->getClientOriginalExtension();
        $photo_path = $photo->storeAs('fotoLinguistik', $photo_name, 'public');
        Linguistik::create([
            'name' => $request->name,
            'image' => $photo_path,
        ]);

        return redirect()->route('linguistik.index')
        ->with('success', 'Data Linguistik Berhasil Ditambahkan');
    }


    public function show($id)
    {
        // $Linguistik = Linguistik::find($id);
        // return view('admin/package/Linguistik/detail');
    }


    public function edit($id)
    {
        $Linguistik = Linguistik::find($id);
        // echo json_encode($Llinguistik);die();
        return view('admin/package/linguistik/update', compact('Linguistik'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'required'
        ]);
        
        if ($request->image && file_exists(storage_path('app/public/' . $request->image))) {
            Storage::delete(['public/' . $request->image]);
        }
        $image_name = $request->file('image')->store('images', 'public');

        $update = Linguistik::find($id);
        $update->name = $request->get('name');
        $update->image = $image_name;

        $update->save();

        //jika data berhasil diupdate, akan kembali ke halaman utama
        return redirect()->route('linguistik.index')
            ->with('success', 'Linguistik Berhasil Diupdate');
    }

    public function destroy($id)
    {
        // Fungsi eloquent untuk menghapus data
        Linguistik::find($id)->delete();
        return redirect('/admin/linguistik')
            ->with('success', 'Data Linguistik Berhasil Dihapus');
    }
}
