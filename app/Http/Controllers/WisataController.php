<?php

namespace App\Http\Controllers;

use App\Models\Wisata;
use App\Models\Kategory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\View\View;

class WisataController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $kategories = Kategory::all();
        $wisatas = Wisata::all();
        return view('admin.wisata.index', compact('wisatas', 'kategories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $request->validated([
        //     'nama_wisata' => 'required|string',
        //     'alamat' => 'required|string',
        //     'deskripsi' => 'nullable|string',
        //     'kategori_id' => 'required|numeric |max:10',
        //     'user_id' => Auth::user()->id,
        // ]);

        Wisata::create([
            'nama_wisata' => $request->wisata,
            'alamat' => $request->alamat,
            'deskripsi' => $request->deskripsi,
            'kategori_id' => $request->kategori_id,
            'alamat' => $request->alamat,
            'user_id' => Auth::user()->id,
        ]);



        return redirect()->route('wisatas.index')->with('success', 'Data berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Wisata $wisata)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Wisata $wisata)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Wisata $wisata)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Wisata $wisata)
    {
        //
    }
}
