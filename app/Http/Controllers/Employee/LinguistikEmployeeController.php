<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Models\Linguistik;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LinguistikEmployeeController extends Controller
{
    public function index(Request $request)
    {
        $Linguistik = Linguistik::where([
            ['name','!=',Null],
            [function ($query) use ($request) {
                if (($term = $request->term)) {
                    $query->orWhere('name', 'LIKE', '%' . $term . '%')->get();
                }
            }]
        ])
            ->orderBy('id', 'asc')
            ->simplePaginate(10);

        return view('employee/package/linguistik/index', compact('Linguistik'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
}
