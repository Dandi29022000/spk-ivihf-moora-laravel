<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\LinguistikController;
use App\Http\Controllers\Admin\HfltsLinguistikController;
use App\Http\Controllers\Admin\CriteriaController;
use App\Http\Controllers\Admin\AlternativeController;
use App\Http\Controllers\Employee\EmployeeController;
use App\Http\Controllers\Employee\UserEmployeeController;
use App\Http\Controllers\Employee\LinguistikEmployeeController;
use App\Http\Controllers\Employee\HfltsLinguistikEmployeeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

// Auth
Route::controller(LoginController::class)->group(function () {
    Route::get('login', 'login')->name('login');
    Route::get('register', 'register')->name('register');
    Route::post('postlogin', 'postLogin')->name('postlogin');
    Route::post('postregister', 'postregister')->name('register.post');
    Route::get('logout', 'logout')->name('logout');
});

// ADMIN
Route::group(['middleware' => ['auth', 'CekLevel:admin']], function () {
    Route::get('/admin', [AdminController::class, 'index']);

    // DATA USER
    Route::resource('/admin/user', UserController::class);

    // DATA TABEL LINGUISTIK
    Route::resource('/admin/linguistik', LinguistikController::class);

    // DATA TABEL HFLTS - LINGUISTIK
    Route::resource('/admin/hflts', HfltsLinguistikController::class);

    // DATA KRITERIA
    Route::get('/admin/kriteria', [CriteriaController::class, 'index']);
    Route::get('/admin/kriteria/form', [CriteriaController::class, 'tampilform']);
    Route::post('/admin/kriteria/form/postkriteria', [CriteriaController::class, 'postkriteria'])->name('postkriteria');
    Route::get('/admin/kriteria/formedit/{id}', [CriteriaController::class, 'tampileditkriteria'])->name('editkriteria');
    Route::post('/admin/kriteria/formedit/updatekriteria/{id}', [CriteriaController::class, 'updatekriteria'])->name('updatekriteria');
    Route::get('/admin/kriteria/hapuskriteria/{criteria}', [CriteriaController::class, 'delskriteria'])->name('hapuskriteria');

    // DATA ALTERNATIVE
    Route::get('/admin/alternatif', [AlternativeController::class, 'index']);
    Route::get('/admin/alternatif/form', [AlternativeController::class, 'tampilform']);
    Route::post('/admin/alternatif/form/postalternatif', [AlternativeController::class, 'postalternatif'])->name('postalternatif');
    Route::get('/admin/alternatif/formedit/{id}', [AlternativeController::class, 'tampileditalternatif'])->name('editalternatif');
    Route::post('/admin/alternatif/formedit/updatealternatif/{id}', [AlternativeController::class, 'updatealternatif'])->name('updatealternatif');
    Route::get('/admin/alternatif/hapusalternatif/{alternative}', [AlternativeController::class, 'delalternatif'])->name('hapusalternatif');
});

// EMPLOYEE
Route::group(['middleware' => ['auth', 'CekLevel:employee']], function () {
    Route::get('/employee', [EmployeeController::class, 'index']);

    // DATA USER
    Route::get('/employee/user', [UserEmployeeController::class, 'index']);

    // DATA TABEL LINGUISTIK
    Route::get('/employee/linguistik', [LinguistikEmployeeController::class, 'index']);

    // DATA TABEL HFLTS - LINGUISTIK
    Route::get('/employee/hflts', [HfltsLinguistikEmployeeController::class, 'index']);
});
