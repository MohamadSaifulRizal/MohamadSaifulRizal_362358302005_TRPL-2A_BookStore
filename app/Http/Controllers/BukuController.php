<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Buku::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $query = $request->input('query');


    if (!$query) {
        return response()->json(['message' => 'Query is required'], 400);
    }

    $bukus = Buku::where('judul', 'LIKE', "%{$query}%")
        ->orWhereHas('kategori', function ($queryBuilder) use ($query) {
            $queryBuilder->where('nama_kategori', 'LIKE', "%{$query}%");
        })
        ->get();

    return response()->json($bukus);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $buku = Buku::find($id);
        return $buku ? response()->json($buku) : response()->json(['message' => 'Buku tidak ditemukan'], 404);
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
