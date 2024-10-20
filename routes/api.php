<?php

use App\Http\Controllers\BukuController;
use App\Http\Controllers\KategoriController;
use App\Models\Buku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('kategoris', KategoriController::class);
Route::apiResource('bukus', BukuController::class); 
Route::get('bukus/search', [BukuController::class, 'search']);
