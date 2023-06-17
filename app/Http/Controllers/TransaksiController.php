<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Http\Request;
use App\Models\barang;
use App\Models\harga_barang;
use Carbon\Carbon;
use DB;

class TransaksiController extends Controller
{

    public function index()
    {
        $transaksis = Transaksi::latest()->paginate(5);
        return view('Transaksis.index',compact('transaksis'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        $nama_barang = barang::all();
        $harga_barang = barang::all();
        return view('transaksis.create',compact('nama_barang','harga_barang'));
    }

    public function store(Request $request)
    {
                $find_barang = barang::where('nama_barang', $request->nama_barang)->first();
                $total_harga = $request->stok  * $find_barang->harga_barang;
                if ($request->stok <= $find_barang->stok) {
                    if ($request->total_bayar < $total_harga) {
                        return redirect()->back()->with('error', 'Uang tidak cukup!');
                    }else{
                        Transaksi::create([
                            'nama_barang' => $request ->nama_barang,
                            'harga_barang' => $find_barang ->harga_barang,
                            'stok' => $request ->stok,
                            'total_harga' => $request ->stok  * $find_barang->harga_barang, 
                            'total_bayar' => $request ->total_bayar,
                            'kembalian' => $request ->total_bayar  - $request ->stok  * $find_barang ->harga_barang, 
                            'tanggal_beli' => Carbon::now(),
                            
                        ]);
                        DB::table('barangs')->where('nama_barang', $find_barang->nama_barang)->update(['stok' => $find_barang->stok - $request->stok]);
                    }
                }else{
                    return redirect()->back()->with('error', 'stok tidak memadai!');
                }

            return redirect()->route('transaksis.index')
            
            ->with('success','Transaksi Berhasil Ditambahkan.');
    }

    public function show(Transaksi $transaksi)
    {
        return view('transaksis.show',compact('transaksi'));
    }

    public function edit(Transaksi $transaksi)
    {
        $nama_barang = barang::all();
        $harga_barang = barang::all();
        return view('transaksis.edit',compact('transaksi','nama_barang', 'harga_barang'));
    }

    public function update(Request $request, Transaksi $transaksi)
    {
        
        $find_barang = barang::where('nama_barang', $request->nama_barang)->first();
        $total_harga = $request->stok  * $find_barang->harga_barang;
        if ($request->stok <= $find_barang->stok) {
            if ($request->total_bayar < $total_harga) {
                return redirect()->back()->with('error', 'Uang tidak cukup!');
            }else{
                Transaksi::create([
                    'nama_barang' => $request ->nama_barang,
                    'harga_barang' => $find_barang ->harga_barang,
                    'stok' => $request ->stok,
                    'total_harga' => $request ->stok  * $find_barang->harga_barang, 
                    'total_bayar' => $request ->total_bayar,
                    'kembalian' => $request ->total_bayar  - $request ->stok  * $find_barang ->harga_barang, 
                    'tanggal_beli' => Carbon::now(),
                    
                ]);
                DB::table('barangs')->where('nama_barang', $find_barang->nama_barang)->update(['stok' => $find_barang->stok - $request->stok]);
            }
        }else{
            return redirect()->back()->with('error', 'stok tidak memadai!');
        }
            return redirect()->route('transaksis.index')
            
            ->with('success','Transaksi updated successfully');
    }

    public function destroy(Transaksi $transaksi)
    {
        $cek = transaksi::find($transaksi)->first();
        $find_barang = barang::where('nama_barang', $cek->nama_barang)->first();
        // dd($find_barang->stok);
        if ($cek) {
            DB::table('barangs')->where('nama_barang', $cek->nama_barang)->update(['stok' => $find_barang->stok + $cek->stok]);
            $transaksi->delete();
        }
        // dd($cek->stok);
        return redirect()->route('transaksis.index')
        ->with('success','Transaksi deleted successfully');
    }

    public function getHarga(Request $request)
    {
        $hargas['nama_barang'] = Barang::where('nama_barang', $request->nama_barang)
                                ->first();

        return response()->json([
            'hargas' => $hargas,
        ]);
    }
}