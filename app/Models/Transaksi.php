<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    protected $fillable = [
            'nama_barang' ,
            'harga_barang' ,
            'stok' ,
            'total_harga' ,
            'total_bayar' ,
            'kembalian' ,
            'tanggal_beli' ,
    ];
}