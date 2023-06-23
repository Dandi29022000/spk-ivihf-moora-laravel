<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Models\hfltsLinguistik;
use App\Models\Linguistik;
use Illuminate\Http\Request;

class HfltsLinguistikEmployeeController extends Controller
{
    public function index(Request $request)
    {	
       
        $hfltsLinguistik = hfltsLinguistik::all();
        
        return view('employee/package/hflts/index', compact('hfltsLinguistik'));
    }
}
