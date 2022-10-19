<?php

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

Route::get('/', function () {
    return redirect('home');
});

Route::get('/keluar',function(){
    Auth::logout();

    return redirect('/login');
});
Route::group(['middleware'=>'auth'],function(){
    Route::get('/supplier','\App\Http\Controllers\Supplier_controller@index');
    Route::get('/supplier/add','\App\Http\Controllers\Supplier_controller@add');
    Route::post('/supplier/add','\App\Http\Controllers\Supplier_controller@store');
    Route::get('/supplier/{id}','\App\Http\Controllers\Supplier_controller@edit');
    Route::put('/supplier/{id}','\App\Http\Controllers\Supplier_controller@update');
    Route::delete('/supplier/{id}','\App\Http\Controllers\Supplier_controller@delete');

    //manage buku
    Route::get('/produk','\App\Http\Controllers\Produk_controller@index');

    Route::get('/produk/add/kosong','\App\Http\Controllers\Produk_controller@kosong');

    Route::get('/produk/add','\App\Http\Controllers\Produk_controller@add');
    Route::post('/produk/add','\App\Http\Controllers\Produk_controller@store');

    Route::get('/produk/{id}','\App\Http\Controllers\Produk_controller@edit');
    Route::put('/produk/{id}','\App\Http\Controllers\Produk_controller@update');

    Route::delete('/produk/{id}','\App\Http\Controllers\Produk_controller@delete');

    //Pinjam Buku
    Route::get('/pinjam-buku','\App\Http\Controllers\Peminjaman_controller@index');
    Route::get('/pinjam-buku/{id}','\App\Http\Controllers\Peminjaman_controller@store');

    Route::get('/pinjam-buku/setujui/{id}','\App\Http\Controllers\Peminjaman_controller@setujui');

    Route::get('/pinjam-buku/tolak/{id}','\App\Http\Controllers\Peminjaman_controller@tolak');

    //pengembalian buku
    Route::get('pengembalian-buku','\App\Http\Controllers\Pengembalian_controller@index');
    Route::get('pengembalian-buku/{id}','\App\Http\Controllers\Pengembalian_controller@pengembalian');

    //manage anggota
    Route::get('/manage-anggota','\App\Http\Controllers\Anggota_controller@index');

    Route::get('/manage-anggota/add','\App\Http\Controllers\Anggota_controller@add');
    Route::post('/manage-anggota/add','\App\Http\Controllers\Anggota_controller@store');
    Route::get('/manage-anggota/{id}','\App\Http\Controllers\Anggota_controller@edit');
    Route::put('/manage-anggota/{id}','\App\Http\Controllers\Anggota_controller@update');
    Route::get('/manage-anggota/delete/{id}','\App\Http\Controllers\Anggota_controller@delete');
    //laporan
    Route::get('/laporan','\App\Http\Controllers\Laporan_controller@index');
    Route::get('/laporan/periode','\App\Http\Controllers\Laporan_controller@periode');

});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
