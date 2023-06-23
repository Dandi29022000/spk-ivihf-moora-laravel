<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Criteria;

class CriteriaController extends Controller
{
    public function tampilform(){
        return view('admin/package/kriteria/create');
    }

    public function index(){
        $criterias = Criteria::all();
        // return Resource::collection($criterias);

        return view('admin/package/kriteria/index',['data_kriteria' => $criterias]);
    }

    public function tampileditkriteria($id)
    {
        $data_kriteria = DB::table('criterias')->where('id', $id)->get();
        return view('admin/package/kriteria/update', ['data_kriteria' => $data_kriteria]);
    }

    public function postkriteria(Request $request)
    {
        $request->validate([
            'code' => 'required|string|max:4|unique:criterias',
            'name' => 'required|string|max:255'
        ]);

        $criteria = Criteria::create($request->all());

        return redirect('/admin/kriteria');
        // dd($request->all());
    }

    public function updatekriteria(Request $request)
    {
        // update data 
        DB::table('criterias')->where('id', $request->id)->update([
            'name' => $request->name
        ]);
        return redirect('/admin/kriteria')
        ->with('success', 'Kriteria berhasil diupdate!');
        // dd($request->all());        
    }
    
    public function delskriteria($id)
    {
        // menghapus data sub berdasarkan id yang dipilih
        DB::table('criterias')->where('id',$id)->delete();
        return redirect('/admin/kriteria');
    }
}