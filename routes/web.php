<?php

use App\Http\Controllers\UserCon;
use App\Http\Controllers\LoginCon;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\ProdukCon;
use App\Http\Controllers\RegisterCon;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardCon;
use App\Http\Controllers\pembelianCon;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('components.home');
});

Route::get('/produk', function () {
    return view('components.produk',[
        'produk'=> DB::table('produk')->get()
    ]);
});



// Login

Route::get('/masuk', [LoginCon::class, 'login'])->name('login');
Route::post('actionlogin', [LoginCon::class, 'actionlogin'])->name('actionlogin');
Route::get('dashboard', [DashboardCon::class, 'index'])->name('dashboard')->
middleware('auth');
Route::get('actionlogout', [LoginCon::class, 'actionlogout'])->name('actionlogout')->
middleware('auth');


// Register

Route::get('register', [RegisterCon::class, 'register'])->name('register');
Route::post('register/action', [RegisterCon::class, 'actionregister'])-> name('actionregister');


// Pembelian
Route::get('/pembelian', [pembelianCon::class, 'index'])->name('indexpembelian')->middleware('auth');
Route::get('/pembelian/input', [pembelianCon::class, 'input'])->name('inputpembelian')->middleware('auth');
Route::post('/tambah-pembelian', [pembelianCon::class, 'storeinput'])->name('storeInputpembelian')->middleware('auth');
Route::get('/pembelian/update/{id}', [pembelianCon::class, 'update'])->name('updatepembelian')->middleware('auth');
Route::post('/pembelian/storeupdate/{id}', [pembelianCon::class, 'storeupdate'])->name('storeUpdatepembelian')->middleware('auth');
Route::get('/pembelian/delete/{kode_pembelian}', [pembelianCon::class, 'delete'])->name('deletepembelian')->middleware('auth');

// User
Route::get('/user/tampil', [UserCon::class, 'index'])->name('indexUser')->middleware('auth');
Route::get('/user/input', [UserCon::class, 'input'])->name('inputUser')->middleware('auth');
Route::post('/user/storeinput', [UserCon::class, 'storeinput'])->name('storeInputUser')->middleware('auth');
Route::get('/user/update/{id}', [UserCon::class, 'update'])->name('updateUser')->middleware('auth');
Route::post('/user/storeupdate', [UserCon::class, 'storeupdate'])->name('storeUpdateUser')->middleware('auth');
Route::get('/user/delete/{id}', [UserCon::class, 'delete'])->name('deleteUser')->middleware('auth');

// Produk dashboard
Route::get('/produk-ds/tampil', [produkCon::class, 'index'])->name('indexproduk')->middleware('auth');
Route::get('/produk-ds/input', [produkCon::class, 'input'])->name('inputproduk')->middleware('auth');
Route::post('/produk-ds/storeinput', [produkCon::class, 'storeinput'])->name('storeInputproduk')->middleware('auth');
Route::get('/produk-ds/update/{id}', [produkCon::class, 'update'])->name('updateproduk')->middleware('auth');
Route::post('/produk-ds/storeupdate', [produkCon::class, 'storeupdate'])->name('storeUpdateproduk')->middleware('auth');
Route::get('/produk-ds/delete/{id}', [produkCon::class, 'delete'])->name('deleteproduk')->middleware('auth');
Route::get('/produk-ds/upload', [produkCon::class, 'upload'])->name('upload')->middleware('auth');
Route::post('/produk-ds/uploadproses', [produkCon::class, 'uploadproses'])->name('uploadproses')->middleware('auth');
