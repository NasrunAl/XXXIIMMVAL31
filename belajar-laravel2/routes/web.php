<?php

use Illuminate\Support\Facades\Route;

Route::get('/profil/{Siti}', function ($Siti) {
        return "Halo, ini adalah profil milik: <b>$Siti</b>";
});    

Route::get('/produk/{kategori}/{id}', function ($kategori, $id) {
    return "Kategori: <b>$kategori</b> <br> ID Produk: <b>$id</b>";
});

Route::get('/profil/{Siti}', function ($Siti) {
    return view('profil', ['Siti' => $Siti]);
});

use App\Http\Controllers\TiketController;

// Route untuk halaman utama (menu pilihan tiket)
Route::get('/', [TiketController::class, 'index']);

// Route untuk menampilkan info tiket berdasarkan parameter
Route::get('/tiket/{tempat}/{harga}', [TiketController::class, 'show']);