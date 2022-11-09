<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ListController;
use App\Http\Controllers\KecamatanController;
use App\Http\Controllers\TempatController;

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
    return view('index');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

//Kecamatan
Route::get('/kecamatan', [KecamatanController::class, 'index'])->name('kecamatan.index');
Route::post('kecamatan/create', [KecamatanController::class, 'store'])->name('kecamatan.create');
Route::get('kecamatan/edit/{id_kecamatan}', [KecamatanController::class, 'edit'])->name('kecamatan.edit');
Route::post('kecamatan/update/{id_kecamatan}', [KecamatanController::class, 'update']);
Route::get('kecamatan/delete/{id_kecamatan}', [KecamatanController::class, 'delete'])->name('kecamatan.delete');