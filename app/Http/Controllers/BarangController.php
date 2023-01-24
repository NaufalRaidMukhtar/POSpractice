<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use App\Models\merek;
use App\Models\distributor;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barangs = Barang::latest()->paginate(5);
        return view('barangs.index',compact('barangs'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $merek = merek::all();
        $distributor = distributor::all();
        return view('barangs.create',compact('merek','distributor'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([

            'nama_barang' => 'required',
            'nama_merek' => 'required',
            'nama_distributor' => 'required',
            'harga_barang' => 'required',
            'harga_beli' => 'required',
            'stok' => 'required',
            'tgl_masuk' => 'required',
            'nama_petugas' => 'required',
            
            ]);
            
            Barang::create($request->all());
            
            return redirect()->route('barangs.index')
            
            ->with('success','Barang created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function show(Barang $barang)
    {
        return view('barangs.show',compact('barang'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function edit(Barang $barang)
    {
        $merek = Merek::all();
        $distributor = Distributor::all();
        return view('barangs.edit',compact('barang', 'merek', 'distributor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Barang $barang)
    {
        $request->validate([

            'nama_barang' => 'required',
            'nama_merek' => 'required',
            'nama_distributor' => 'required',
            'harga_barang' => 'required',
            'harga_beli' => 'required',
            'stok' => 'required',
            'tgl_masuk' => 'required',
            'nama_petugas' => 'required',
            
            ]);
            
            $barang->update($request->all());
            
            return redirect()->route('barangs.index')
            
            ->with('success','Barang updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function destroy(Barang $barang)
    {
        $barang->delete();
        return redirect()->route('barangs.index')
        ->with('success','Barang deleted successfully');
    }
}