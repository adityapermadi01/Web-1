<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Databarangcontroller;
use App\Http\Controllers\Detailpemantauancontroller;
use App\Http\Controllers\Detailpengunjungcontroller;
use App\Http\Controllers\Laporanpemantauancontroller;
use App\Http\Controllers\PasarAcontroller;
use App\Http\Controllers\Pasaranyarcontroller;
use App\Http\Controllers\Pasarbanyuasricontroller;
use App\Http\Controllers\PasarBcontroller;
use App\Http\Controllers\PengunjungController;
use App\Http\Controllers\Penjualancontroller;
use App\Http\Controllers\TokoController;
use App\Http\Controllers\Usercontroller;
use App\Http\Controllers\Userdetailcontroller;
use App\Http\Controllers\Userlaporanpemantauancontroller;
use App\Models\Pasaranyar;
use App\Models\Pasarbanyuasri;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [PengunjungController::class, 'index']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/Halaman_Admin', [AdminController::class, 'index'])->middleware(['auth:sanctum', 'verified']);
    Route::resource('databarang', Databarangcontroller::class);
    Route::resource('laporanpemantauan', Laporanpemantauancontroller::class);
    Route::resource('pasarbanyuasri', Pasarbanyuasricontroller::class);
    Route::get('/get-code-barang', [Pasarbanyuasricontroller::class, 'getCode'])->name('getCodeBarang');
    Route::resource('pasaranyar', Pasaranyarcontroller::class);
    Route::get('/get-code-barang', [Pasaranyarcontroller::class, 'getCode'])->name('getCodeBarang');
    Route::resource('toko', TokoController::class);

    Route::get('/cetak_detail', [Detailpemantauancontroller::class, 'cetakbanyuasri']);
    Route::get('/cetak_anyar', [Detailpemantauancontroller::class, 'cetakanyar']);

    // user
    Route::resource('Banyuasri_kepala', PasarBcontroller::class);
    Route::resource('Detailpasar_admin', Detailpemantauancontroller::class);

    //pengunjung
});
Route::get('/detailpengunjung', [Detailpengunjungcontroller::class, 'index']);
Route::get('/halamanuser', [Usercontroller::class, 'index']);
Route::resource('Userdetail', Userdetailcontroller::class);
Route::resource('userlaporanpemantauan', Userlaporanpemantauancontroller::class);
Route::get('/detailpenjualan', [Penjualancontroller::class, 'index']);
