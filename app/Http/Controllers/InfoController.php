<?php

namespace App\Http\Controllers;

use App\Models\Info;
use App\Models\Kategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class InfoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kategories = Kategory::get();
        $informasi = Info::with('kategori')->get();

        return view('admin.infos.index',compact('informasi','kategories'));
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
        // dd($request->all());
       
        
        if($request->hasFile('gambar_info'))
        {
            $gambar =$request->file('gambar_info');
            $file_name = time().'_'.$gambar->getClientOriginalName();
            $path = $request->file('gambar_info')->storeAs('info', $file_name, 'public');
            Info::create([
                'judul'=>$request->judul,
                'isi'=>$request->isi,
                 'slug'=>str()->slug($request->judul),
                'kategori_id' =>$request->kategori_id,
                'gambar_info' =>$path,

            ]);

        }
        $info = Info::create([
            'judul'=>$request->judul,
            'isi'=>$request->isi,
            'slug'=>str()->slug($request->judul),
            'kategori_id' =>$request->kategori_id,
        ]);
        return redirect()->route('informasi.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(Info $info)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Info $info)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Info $info)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Info $info)
    {
        //
    }
}
