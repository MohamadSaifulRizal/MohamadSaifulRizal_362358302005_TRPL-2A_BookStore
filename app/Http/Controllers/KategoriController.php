<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
// use App\Models\Kategori;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Kategori::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_buku' => 'required|string|max:255', 
            'harga' => 'required|numeric|min:1000', 
        ], [
            'nama_buku.required' => 'Nama buku tidak boleh kosong.', 
            'harga.required' => 'Harga buku wajib diisi.', 
            'harga.min' => 'Harga minimal adalah Rp 1.000.', 
        ]);

        $kategori = new Kategori(); 
        $kategori->nama_buku = $request->input('nama_buku');
        $kategori->harga = $request->input('harga');
        $kategori->save();

        // return response()->json([
        //     'message' => 'Buku berhasil ditambahkan',
        //     'kategori' => $kategori
        // ], 201);



        $request->validate(['nama_kategori' => 'required']);
        $kategori = Kategori::create($request->all());
        return response()->json($kategori, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
