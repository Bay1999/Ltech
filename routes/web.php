<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\TeknisiController;
use App\Http\Controllers\SparepartController;
use App\Http\Controllers\PembelianController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\ServisController;

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
    return view('layouts.dashboard');
})->name('dashboard');

Route::get('/teknisi', [TeknisiController::class, 'index'])->name('teknisi.index');
Route::get('/teknisi/add', [TeknisiController::class, 'create'])->name('teknisi.create');
Route::get('/teknisi/edit/{id}', [TeknisiController::class, 'edit'])->name('teknisi.edit');
Route::post('/teknisi/store', [TeknisiController::class, 'store'])->name('teknisi.store');
Route::delete('/teknisi/destroy/{id}', [TeknisiController::class, 'destroy'])->name('teknisi.destroy');
Route::post('/teknisi/update/{id}', [TeknisiController::class, 'update'])->name('teknisi.update');

Route::get('/sparepart/data', [SparepartController::class, 'index'])->name('sparepart.data.index');
Route::get('/sparepart/data/add', [SparepartController::class, 'create'])->name('sparepart.data.create');
Route::post('/sparepart/data/store', [SparepartController::class, 'store'])->name('sparepart.data.store');
Route::post('/sparepart/data/harga/{id}', [SparepartController::class, 'update_harga'])->name('sparepart.data.update_harga');
Route::post('/sparepart/data/update/{id}', [SparepartController::class, 'update'])->name('sparepart.data.update');
Route::get('/sparepart/data/edit/{id}', [SparepartController::class, 'edit'])->name('sparepart.data.edit');
Route::delete('/sparepart/data/destroy/{id}', [SparepartController::class, 'destroy'])->name('sparepart.data.destroy');

Route::get('/sparepart/pembelian', [PembelianController::class, 'index'])->name('sparepart.pembelian.index');
Route::get('/sparepart/pembelian/add', [PembelianController::class, 'create'])->name('sparepart.pembelian.create');
Route::get('/sparepart/pembelian/edit/{id}', [PembelianController::class, 'edit'])->name('sparepart.pembelian.edit');
Route::post('/sparepart/pembelian/update/{id}', [PembelianController::class, 'update'])->name('sparepart.pembelian.update');
Route::delete('/sparepart/pembelian/destroy/{id}', [PembelianController::class, 'destroy'])->name('sparepart.pembelian.destroy');
Route::post('/sparepart/pembelian/store', [PembelianController::class, 'store'])->name('sparepart.pembelian.store');

Route::get('/sparepart/penjualan', [PenjualanController::class, 'index'])->name('sparepart.penjualan.index');
Route::get('/sparepart/penjualan/add', [PenjualanController::class, 'create'])->name('sparepart.penjualan.create');
Route::post('/sparepart/penjualan/store', [PenjualanController::class, 'store'])->name('sparepart.penjualan.store');
Route::delete('/sparepart/penjualan/destroy/{id}', [PenjualanController::class, 'destroy'])->name('sparepart.penjualan.destroy');

Route::get('/servis/masuk', [ServisController::class, 'masuk'])->name('servis.masuk');
Route::get('/servis/masuk/add', [ServisController::class, 'create'])->name('servis.masuk.create');
Route::post('/servis/masuk/store', [ServisController::class, 'store'])->name('servis.masuk.store');
Route::get('/servis/masuk/cetak/{id}', [ServisController::class, 'cetak'])->name('servis.masuk.cetak');
Route::get('/servis/masuk/ambil/{id}', [ServisController::class, 'ambil'])->name('servis.masuk.ambil');
Route::post('/servis/masuk/selesai/{id}', [ServisController::class, 'selesai'])->name('servis.masuk.selesai');
Route::post('/servis/masuk/simpan_ambil', [ServisController::class, 'simpan_ambil'])->name('servis.masuk.diambil');

Route::get('/servis/keluar', [ServisController::class, 'keluar'])->name('servis.keluar');

Auth::routes();
