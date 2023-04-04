<?php

// controller POINT OF SALES
Use App\Http\Controllers\TransaksiController;
Use App\Http\Controllers\BarangController;
Use App\Http\Controllers\DistributorController;
Use App\Http\Controllers\MerekController;
Use App\Http\Controllers\RayonController;
use App\Http\Controllers\HomeController;
use App\Models\Datasiswa;
Use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
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


//route POINT OF SALES
Route::get('/get-harga', [TransaksiController::class, 'getHarga'])->name('getHarga');
Route::resource('mereks', MerekController::class);
Route::resource('distributors', DistributorController::class);
Route::resource('barangs', BarangController::class);
Route::resource('transaksis', TransaksiController::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('admin/home', [HomeController::class, 'adminHome'])->name('admin.home')->middleware('is_admin');
