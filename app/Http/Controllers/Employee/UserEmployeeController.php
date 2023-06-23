<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserEmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $User = User::where([
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

        return view('employee/package/user/index', compact('User'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
}
