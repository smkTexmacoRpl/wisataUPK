<?php

namespace App\Http\Controllers;

use App\Models\Kabupaten;
use Illuminate\Http\Request;



class KabupatenController extends Controller
{
   
    
    public function index()
    {
        $kabupatens = Kabupaten::all();
        return view('admin.kabupatens.index', compact('kabupatens'));
       
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('kabupatens.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'kabupaten' => 'required|string|max:60',
            'keterangan' => 'nullable|string',
        ]);

        Kabupaten::create($validated);

        return redirect()->route('kabupatens.index')->with('success', 'Data berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Kabupaten $kabupaten)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kabupaten $kabupaten)
    {
        return view('kabupatens.edit', compact('kabupaten'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kabupaten $kabupaten)
    {
        $validated = $request->validate([
            'kabupaten' => 'required|string|max:60',
            'keterangan' => 'nullable|string',
        ]);

        $kabupaten->update($validated);

        return redirect()->route('kabupatens.index')->with('success', 'Data berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kabupaten $kabupaten)
    {
        $kabupaten->delete();

        return redirect()->route('kabupatens.index')->with('success', 'Data berhasil dihapus.');
    }
}
