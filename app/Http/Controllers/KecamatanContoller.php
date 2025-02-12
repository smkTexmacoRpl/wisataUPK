<?php

namespace App\Http\Controllers;

use App\Models\Kabupaten;
use App\Models\Kecamatan;

use Illuminate\Routing\Controllers\Middleware;


use Illuminate\Http\Request;


class KecamatanContoller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        new Middleware('auth');
    }
    public function index()
    {
        $kabs = Kabupaten::all();
        $kecamatans = Kecamatan::with('kabupaten')->get();       
        return view('admin.kecamatans.index', compact('kecamatans','kabs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
        return view('admin.kecamatans.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    //    dd($request->all());
        $validated = $request->validate([
            'kabupaten_id' => 'required|numeric |max:10',
            'kecamatan' => 'required|string|max:60',
            'keterangan' => 'nullable|string',
        ]);

        Kecamatan::create($validated);

        return redirect()->route('kecamatans.index')->with('success', 'Data berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kecamatan $kecamatan)
    {
        return view('admin.kecamatans.edit', compact('kecamatan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kecamatan $kecamatan)
    {
        $validated = $request->validate([
            'kabupaten_id' => 'required|numeric|max:10',
            'kecamatan' => 'required|string|max:60',
            'keterangan' => 'nullable|string',
        ]);

        $kecamatan->update($validated);

        return redirect()->route('kecamatans.index')->with('success', 'Data berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kecamatan $kecamatan)
    {
        $kecamatan->delete();

        return redirect()->route('kecamatans.index')->with('success', 'Data berhasil dihapus.');
    }
}
