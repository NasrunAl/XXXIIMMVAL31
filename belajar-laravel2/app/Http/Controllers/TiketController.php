<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TiketController extends Controller
{
    /**
     * Menampilkan halaman utama dengan pilihan tiket.
     */
    public function index()
    {
        // Mengembalikan view 'welcome' yang akan kita buat desainnya
        return view('welcome');
    }

    /**
     * Menampilkan informasi detail tiket berdasarkan parameter URL.
     */
    public function show($tempat, $harga)
    {
        // Mengirim data 'tempat' dan 'harga' ke view 'info_tiket'
        return view('info_tiket', [
            'tempat_wisata' => $tempat,
            'harga_tiket' => $harga
        ]);
    }
}
