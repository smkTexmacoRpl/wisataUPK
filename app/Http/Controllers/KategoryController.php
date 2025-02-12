<?php

namespace App\Http\Controllers;

use App\Models\Kategory;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;

class KategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ktgs = Kategory::all();
        return view('admin.kategories.index', compact('ktgs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return view('admin.kategories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kategori' => 'required|string|max:60',
        ]);

        Kategory::create([
            'kategori' => $request->kategori,
            'slug' => str()->slug($request->kategori),  
        ]);

        return redirect()->route('kategories.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Kategory $kategory)
    {
       //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kategory $kategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kategory $kategory)
    {
        $request->validate([
            'kategori' => 'required|string|max:60',
        ]);

        Kategory::where('id', $kategory->id)->update([
            'kategori' => $request->kategori,
            'slug' => str()->slug($request->kategori),
        ]);

        return redirect()->route('kategories.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kategory $kategory)
    {
        $kategory->delete();
        return redirect()->route('kategories.index');
    }
}
