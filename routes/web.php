<?php

// ini adalah controller Transaksi
Use App\Http\Controllers\TransaksiController;

// ini adalah controller Barang
Use App\Http\Controllers\BarangController;

// ini adalah controller distributor
Use App\Http\Controllers\DistributorController;

// ini adalah controller merek
Use App\Http\Controllers\MerekController;

// ini adalah controller rayon
Use App\Http\Controllers\RayonController;


// ini adalah controller rombel
Use App\Http\Controllers\RombelController;

// ini adalah controller datasiswa
Use App\Http\Controllers\DatasiswaController;

// ini adalah controller product
Use App\Http\Controllers\ProductController;

//ini adalah Controller Login
use App\Http\Controllers\LoginController;

//ini adalah Controller register
use App\Http\Controllers\RegisterController;

use App\Models\Datasiswa;
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
    return view('welcome');
});

Route::get('index', function () {
    return view('index');
});

Route::get('/transaksis', function () {
return view('index');
});

Route::get('/login', function () {
    return view('index');
    });
 
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');

Route::post('/login', [LoginController::class, 'authenticate']);

Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index']);

Route::post('/register', [RegisterController::class, 'store']);

Route::get('/get-harga', [TransaksiController::class, 'getHarga'])->name('getHarga');




// ini adalah route menuju halaman product
Route::resource('products', ProductController::class);

// ini adalah route menuju halaman datasiswa
Route::resource('datasiswas', DatasiswaController::class);

// ini adalah route menuju halaman rombel
Route::resource('rombels', RombelController::class);

// ini adalah route menuju halaman rayon
Route::resource('rayons', RayonController::class);

// ini adalah route menuju halaman merek
Route::resource('mereks', MerekController::class);

// ini adalah route menuju halaman distributor
Route::resource('distributors', DistributorController::class);

// ini adalah route menuju halaman barang
Route::resource('barangs', BarangController::class);

// ini adalah route menuju halaman transaksi
Route::resource('transaksis', TransaksiController::class);