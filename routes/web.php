<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\WebController;
use App\Http\Controllers\KecamatanController;
use App\Http\Controllers\PenjualController;
use App\Http\Controllers\TempatController;
use App\Http\Controllers\DashboardController;

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

Route::get('/', [WebController::class, 'index'])->name('index');
Route::get('/penjual', [WebController::class, 'penjual'])->name('penjual');

Route::get('/sejarah', function () {
    return view('sejarah');
});

Route::get('/kecamatan/{id_kecamatan}', [WebController::class, 'kecamatan'])->name('kecamatan');

Auth::routes();

Route::prefix('dashboard')->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    //Kecamatan
    Route::get('kecamatan', [KecamatanController::class, 'index'])->name('kecamatan.index');
    Route::post('kecamatan/create', [KecamatanController::class, 'store'])->name('kecamatan.create');
    Route::get('kecamatan/edit/{id_kecamatan}', [KecamatanController::class, 'edit'])->name('kecamatan.edit');
    Route::post('kecamatan/update/{id_kecamatan}', [KecamatanController::class, 'update']);
    Route::get('kecamatan/delete/{id_kecamatan}', [KecamatanController::class, 'delete'])->name('kecamatan.delete');

    //Penjual
    Route::get('penjual', [PenjualController::class, 'index'])->name('penjual.index');
    Route::post('penjual/create', [PenjualController::class, 'store'])->name('penjual.create');
    Route::get('penjual/edit/{id_penjual}', [PenjualController::class, 'edit'])->name('penjual.edit');
    Route::post('penjual/update/{id_penjual}', [PenjualController::class, 'update']);
    Route::get('penjual/delete/{id_penjual}', [PenjualController::class, 'delete'])->name('penjual.delete');

    //Tempat
    Route::get('tempat', [TempatController::class, 'index'])->name('tempat.index');
    Route::post('tempat/create', [TempatController::class, 'store'])->name('tempat.create');
    Route::get('tempat/edit/{id_tempat}', [TempatController::class, 'edit'])->name('tempat.edit');
    Route::post('tempat/update/{id_tempat}', [TempatController::class, 'update']);
    Route::get('tempat/delete/{id_tempat}', [TempatController::class, 'delete'])->name('tempat.delete');
});



