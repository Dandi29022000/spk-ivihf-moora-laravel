<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Alternative;
use App\Models\RatioAlternative;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class AlternativeController extends Controller
{
    public function tampilform(){
        return view('admin/package/alternatif/create');
    }

    public function index(){
        $alternatives = Alternative::orderBy('code', 'asc')->get();
        // return AlternativeResource::collection($alternatives);

        return view('admin/package/alternatif/index',['alternatives' => $alternatives]);
    }

    public function postalternatif(Request $request)
    {
        $this->validate($request, [
            'code' => 'required|string|max:4|unique:alternatives',
            'name' => 'required|string|max:255'
        ]);

        $alternative = Alternative::create($request->all());

        return redirect('/admin/alternatif');
        
        // dd($request->all());
    }

    public function tampileditalternatif($id)
    {
        $alternatives = DB::table('Alternatives')->where('id', $id)->get();
        return view('admin/package/alternatif/update', ['alternatives' =>  $alternatives]);
    }

    public function updatealternatif(Request $request, $id)
    {
        // update data 
        DB::table('alternatives')->where('id', $request->id)->update([
            'name' => $request->name
        ]);

        return redirect('/admin/alternatif')
        ->with('success', 'Alternatif berhasil diupdate!');
    }

    public function delalternatif($id){
        // menghapus data sub berdasarkan id yang dipilih
        DB::table('alternatives')->where('id',$id)->delete();
        return redirect('/admin/alternatif');
    }
}
