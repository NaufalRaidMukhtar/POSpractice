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
Use Illuminate\Support\Facades\route;
use App\Http\Controllers\PDFController;







//route POINT OF SALES
Route::get('/get-harga', [TransaksiController::class, 'getHarga'])->name('getHarga');
Route::resource('mereks', MerekController::class);
Route::resource('distributors', DistributorController::class);
Route::resource('barangs', BarangController::class);
Route::resource('transaksis', TransaksiController::class);

// untuk multi auth
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('admin/home', [HomeController::class, 'adminHome'])->name('admin.home')->middleware('is_admin');

// untuk PDF
Route::get('generate-pdf', [PDFController::class, 'generatePDF']);
Route::get('/', function () {
    return view('welcome');
});