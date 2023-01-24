<?php

namespace App\Http\Controllers;

use App\Models\Datasiswa;
use Illuminate\Http\Request;
use App\Models\Rombel;
use App\Models\Rayon;

class DatasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datasiswas = Datasiswa::latest()->paginate(5);
        return view('datasiswas.index',compact('datasiswas'))
        ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rombel = rombel::all();
        $rayon = rayon::all();
        return view('datasiswas.create',compact('rombel','rayon'));
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
        'nis' => 'required',
        'name' => 'required', 
        'rombel' => 'required',
        'rayon' => 'required', 
        ]);
        Datasiswa::create($request->all());
        return redirect()->route('datasiswas.index')
        ->with('success','Datasiswa created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Datasiswa  $datasiswa
     * @return \Illuminate\Http\Response
     */
    public function show(Datasiswa $datasiswa)
    {
        return view('datasiswas.show',compact('datasiswa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Datasiswa  $datasiswa
     * @return \Illuminate\Http\Response
     */
    public function edit(Datasiswa $datasiswa)
    {
        return view('datasiswas.edit',compact('datasiswa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Datasiswa  $datasiswa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Datasiswa $datasiswa)
    {
        $request->validate([
        'nis' => 'required',
        'name' => 'required',
        'rombel' => 'required',
        'rayon' => 'required',
        ]);
        $datasiswa->update($request->all());
        return redirect()->route('datasiswas.index')
        ->with('success','Datasiswa updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Datasiswa  $datasiswa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Datasiswa $datasiswa)
    {
        $datasiswa->delete();
        return redirect()->route('datasiswas.index')
        ->with('success','Datasiswa deleted successfully');
    }
}