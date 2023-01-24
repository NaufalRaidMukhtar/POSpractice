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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transaksis = Transaksi::latest()->paginate(5);
        return view('Transaksis.index',compact('transaksis'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $nama_barang = barang::all();
        $harga_barang = barang::all();
        return view('transaksis.create',compact('nama_barang','harga_barang'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    // {
    //             $find_barang = barang::where('nama_barang', $request->nama_barang)->first();
    //             $total_harga = $request->total_barang  * $find_barang->harga_barang;
    //             if ($request->total_barang <= $find_barang->stok) {
    //                 if ($request->total_bayar < $total_harga) {
    //                     return redirect()->back()->with('error', 'Uang tidak cukup!');
    //                 }else{
    //                     Transaksi::create([
    //                         'nama_barang' => $request ->nama_barang,
    //                         'harga_barang' => $find_barang ->harga_barang,
    //                         'total_barang' => $request ->total_barang,
    //                         'total_harga' => $request ->total_barang  * $find_barang->harga_barang, 
    //                         'total_bayar' => $request ->total_bayar,
    //                         'kembalian' => $request ->total_bayar  - $request ->total_barang  * $find_barang ->harga_barang, 
    //                         'tanggal_beli' => Carbon::now(),
                            
    //                     ]);
    //                     DB::table('barangs')->where('nama_barang', $find_barang->nama_barang)->update(['stok' => $find_barang->stok - $request->total_barang]);
    //                 }
    //             }else{
    //                 return redirect()->back()->with('error', 'stok tidak memadai!');
    //             }

    //         return redirect()->route('transaksis.index')
            
    //         ->with('success','Transaksi Berhasil Ditambahkan.');
    // }

    $find_barang = Barang::where('nama_barang', $request->nama_barang)->first();
    if ($request->stok <= $find_barang->stok) {
        if ($find_barang->harga_barang <= $request->total_bayar) {
            $cek = Transaksi::create([
                'nama_barang' => $request->nama_barang ,
                'harga_barang' => $find_barang->harga_barang ,
                'stok' => $request->stok,
                'total_harga' => $request->stok * $find_barang->harga_barang,
                'total_bayar' => $request->total_bayar,
                'kembalian' => $request->total_bayar - $request->stok * $find_barang->harga_barang,
                'tanggal_beli' => Carbon::now() ,
            ]);
            DB::table('barangs')->where('nama_barang', $request->nama_barang)->update(['stok' => $find_barang->stok - $request->stok]);
        }else{
            return redirect()->back()->with('error', 'Uang tidak cukup untuk membeli! ');
        }
    }else{
        return redirect()->back()->with('error', 'stok tidak cukup !');
    }
    return redirect()->route('transaksis.index')
    ->with('success','transaksi created successfully.');
}


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function show(Transaksi $transaksi)
    {
        return view('transaksis.show',compact('transaksi'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaksi $transaksi)
    {
        $nama_barang = barang::all();
        $harga_barang = barang::all();
        return view('transaksis.edit',compact('transaksi','nama_barang', 'harga_barang'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaksi $transaksi)
    {
        
    //     $find_barang = barang::where('nama_barang', $request->nama_barang)->first();
    //     $total_harga = $request->total_barang  * $find_barang->harga_barang;
    //     if ($request->total_barang <= $find_barang->stok) {
    //         if ($request->total_bayar < $total_harga) {
    //             return redirect()->back()->with('error', 'Uang tidak cukup!');
    //         }else{
    //             Transaksi::create([
    //                 'nama_barang' => $request ->nama_barang,
    //                 'harga_barang' => $find_barang ->harga_barang,
    //                 'total_barang' => $request ->total_barang,
    //                 'total_harga' => $request ->total_barang  * $find_barang->harga_barang, 
    //                 'total_bayar' => $request ->total_bayar,
    //                 'kembalian' => $request ->total_bayar  - $request ->total_barang  * $find_barang ->harga_barang, 
    //                 'tanggal_beli' => Carbon::now(),
                    
    //             ]);
    //             DB::table('barangs')->where('nama_barang', $find_barang->nama_barang)->update(['stok' => $find_barang->stok - $request->total_barang]);
    //         }
    //     }else{
    //         return redirect()->back()->with('error', 'stok tidak memadai!');
    //     }
    //         return redirect()->route('transaksis.index')
            
    //         ->with('success','Transaksi updated successfully');
    // }

    $find_barang = Barang::where('nama_barang', $request->nama_barang)->first();
        if ($request->stok <= $find_barang->stok) {
            if ($find_barang->harga_barang <= $request->total_bayar) {
                $cek = Transaksi::create([
                    'nama_barang' => $request->nama_barang ,
                    'harga_barang' => $find_barang->harga_barang ,
                    'stok' => $request->stok,
                    'total_harga' => $request->stok * $find_barang->harga_barang,
                    'total_bayar' => $request->total_bayar,
                    'kembalian' => $request->total_bayar - $request->stok * $find_barang->harga_barang,
                    'tanggal_beli' => Carbon::now() ,
                ]);
                DB::table('barangs')->where('nama_barang', $request->nama_barang)->update(['stok' => $find_barang->stok - $request->stok]);
            }else{
                return redirect()->back()->with('error', 'Uang tidak cukup untuk membeli');
            }
        }else{
            return redirect()->back()->with('error', 'stok tidak cukup');
        }
        return redirect()->route('transaksis.index')
        ->with('success','transaksi created successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaksi $transaksi)
    {
        $cek = transaksi::find($transaksi)->first();
        $find_barang = barang::where('nama_barang', $cek->nama_barang)->first();
        // dd($find_barang->stok);
        if ($cek) {
            DB::table('barangs')->where('nama_barang', $cek->nama_barang)->update(['stok' => $find_barang->stok + $cek->total_barang]);
            $transaksi->delete();
        }
        // dd($cek->total_barang);
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