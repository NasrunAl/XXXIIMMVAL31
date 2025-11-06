<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

// =======================================================
// DATA MOBIL
// =======================================================
function getLuxuryCars() {
    return 
        [
        [
            'id' => 1,
            'nama' => 'Porsche 911 GT3 RS (Black Edition)',
            'harga' => 'Rp 7.889.000.000',
            'foto' => 'images/14.png',
            'deskripsi' => 'Elegan dan agresif dalam satu paket. Varian hitam legam ini menonjolkan sisi misterius dan berwibawa, dilengkapi mesin 525cv yang mampu melesat dari 0–100 km/jam hanya dalam 3,2 detik, dengan kecepatan puncak 296 km/jam.',
            'tahun' => 2003,
            'transmisi' => 'Automatic',
            'warna' => '(Black Edition)',
        ],
        [
            'id' => 2,
            'nama' => 'Porsche 911 GT3 RS (Crimson Red)',
            'harga' => 'Rp 7.000.000.000',
            'foto' => 'images/15.png',
            'deskripsi' => 'Kekuatan dan gairah bersatu dalam warna merah menyala. Dengan performa identik — 525cv, akselerasi 3,2 detik, dan 296 km/jam, mobil ini memancarkan karakter berani yang siap menaklukkan lintasan maupun jalanan kota.',
            'tahun' => 2003,
            'transmisi' => 'Automatic',
            'warna' => '(Crimson Red)',
        ],
        [
            'id' => 3,
            'nama' => 'Porsche 911 GT3 RS (Verde Racing)',
            'harga' => 'Rp 8.100.000.000',
            'foto' => 'images/gambar7.jpg',
            'deskripsi' => 'Varian hijau terang ini melambangkan jiwa kompetitif dan semangat muda. Didesain untuk mereka yang ingin tampil beda, mobil ini tetap membawa tenaga buas 525cv dengan kontrol presisi khas Porsche GT.',
            'tahun' => 2003,
            'transmisi' => 'PDK 8-Speed',
            'warna' => '(Verde Racing)',
        ],
        [
            'id' => 4,
            'nama' => 'Porsche 934 Turbo (Classic Orange)',
            'harga' => 'Rp 6.800.000.000',
            'foto' => 'images/gambar6.jpg',
            'deskripsi' => 'Legenda klasik yang kembali hidup. Dengan tenaga 550cv dan kecepatan maksimum 286 km/jam, 934 Turbo membawa nuansa retro dari era balap 70-an — lengkap dengan desain bodi membulat dan detail krom yang menawan.',
            'tahun' => 1976,
            'transmisi' => 'PDK 8-Speed',
            'warna' => '(Classic Orange)',
        ],
        [
            'id' => 5,
            'nama' => 'Porsche 911 GT3 RS (Sky Blue Edition)',
            'harga' => 'Rp 8.000.000.000',
            'foto' => 'images/gambar5.jpg',
            'deskripsi' => 'Perpaduan performa ekstrem dan tampilan menenangkan. Varian biru muda ini melesat hingga 296 km/jam dengan akselerasi dalam 3 detik, membuktikan bahwa kecepatan bisa tampil elegan.',
            'tahun' => 2003,
            'transmisi' => 'Automatic',
            'warna' => '(Sky Blue Edition)',
        ],
        [
            'id' => 6,
            'nama' => 'Porsche 911 GT3 RS (Black and White Edition)',
            'harga' => 'Rp 8.500.000.000',
            'foto' => 'images/gambar4.jpg',
            'deskripsi' => 'Perpaduan performa ekstrem dan tampilan Sporty. Varian Black and White mampu ini melesat hingga 296 km/jam dengan akselerasi dalam 3 detik, membuktikan bahwa kecepatan bisa tampil gagah.',
            'tahun' => 2003,
            'transmisi' => 'Dual-Clutch 8-Speed',
            'warna' => '(Black and White Edition)',
        ],
        [
            'id' => 7,
            'nama' => 'Porsche 911 Carrera (Tipe 992, Gentian Blue Metallic)',
            'harga' => 'Rp 12.809.000.000',
            'foto' => 'images/6.png',
            'deskripsi' => 'Perpaduan performa modern dan tampilan elegan. Varian biru metalik ini melesat dengan presisi tinggi berkat teknologi mesin twin-turbo canggih, membuktikan bahwa kecepatan bisa tampil sangat menawan. Desainnya yang telah disempurnakan dan interior futuristik menawarkan kenyamanan dan konektivitas kelas atas.',
            'tahun' => 2022,
            'transmisi' => 'Automatic',
            'warna' => 'Gentian Blue Metallic',
        ],
        [
            'id' => 8,
            'nama' => 'Porsche 911 Carrera (Tipe 992, Gentian Grey Metallic)',
            'harga' => 'Rp 12.000.000.000',
            'foto' => 'images/5.png',
            'deskripsi' => 'Perpaduan performa modern dan tampilan elegan. Varian biru metalik ini melesat dengan presisi tinggi berkat teknologi mesin twin-turbo canggih, membuktikan bahwa kecepatan bisa tampil sangat menawan. Desainnya yang telah disempurnakan dan interior futuristik menawarkan kenyamanan dan konektivitas kelas atas.',
            'tahun' => 2022,
            'transmisi' => 'Automatic',
            'warna' => 'Gentian Grey Metallic',
        ],
        [
            'id' => 9,
            'nama' => 'Porsche 911 Klasik (Tipe 964, Emerald Green)',
            'harga' => 'Rp 9.700.000.000',
            'foto' => 'images/9.png',
            'deskripsi' => 'Legenda klasik yang kembali hidup. Dengan karakter mesin air-cooled yang tak tergantikan dan desain bodi menawan, Tipe 964 dalam warna hijau zamrud ini membawa nuansa otentik dari era kejayaan Porsche. Ini adalah ode untuk pengalaman berkendara analog yang murni, di mana setiap putaran mesin terasa dan terdengar.',
            'tahun' => 1976,
            'transmisi' => 'PDK-Speed 8',
            'warna' => 'Emerald Green',
        ],
        [
            'id' => 10,
            'nama' => 'Porsche 911 GT2 (Tipe 993, Speed Yellow)',
            'harga' => 'Rp 120.000.000.000',
            'foto' => 'images/2.png',
            'deskripsi' => 'Ikon air-cooled terakhir, ditenagai monster twin-turbo. Dikenal sebagai "The Widowmaker", 993 GT2 adalah puncak performa analog. Dengan fender super lebar, sayap belakang masif, dan tenaga buas yang dikirim ke roda belakang, mobil ini adalah murni adrenalin—mobil balap homologasi yang legal untuk jalan raya.',
            'tahun' => 1993,
            'transmisi' => 'Automatic 7-Speed',
            'warna' => 'Speed Yellow',
        ],
        [
            'id' => 11,
            'nama' => 'Porsche 911 GT2 (Tipe 993, Classic White)',
            'harga' => 'Rp 8.300.000.000',
            'foto' => 'images/12.png',
            'deskripsi' => 'Keanggunan brutal dalam balutan warna putih klasik. Versi ini menonjolkan setiap lekukan agresif dari fender rivet-on dan sayap dua tingkatnya. 993 GT2 adalah perayaan terakhir dari era air-cooled Porsche, menggabungkan rekayasa murni dengan tenaga twin-turbo yang menuntut rasa hormat dari pengemudinya.',
            'tahun' => 1993,
            'transmisi' => 'PDK 8-Speed',
            'warna' => 'Classic White',
        ],
        [
            'id' => 12,
            'nama' => 'Porsche 911 Turbo (Tipe 964, Signal Orange)',
            'harga' => 'Rp 3.500.000.000',
            'foto' => 'images/8.png',
            'deskripsi' => 'Pesona turbo-lag klasik dengan siluet wide-body abadi. Inilah ikon yang mendefinisikan supercar tahun 90-an. 964 Turbo, dengan fender melengkung yang khas dan sayap whale-tail ikonik, menawarkan pengalaman berkendara turbocharged yang menantang namun sangat memuaskan, lengkap dengan raungan mesin air-cooled yang legendaris.',
            'tahun' => 1992,
            'transmisi' => 'PDK 8-Speed',
            'warna' => 'Crimson Red',
        ],
    ];
}

// =======================================================
// LOGIN / LOGOUT
// =======================================================
Route::get('/', fn() => redirect()->route('login'));

Route::get('/login', fn() => view('login'))->name('login');

Route::post('/login', function (Request $request) {
    if ($request->username === 'admin' && $request->password === '3115') {
        session(['logged_in' => true]);
        return redirect()->route('mobil.index');
    }
    return back()->with('error', 'Username atau password salah.');
})->name('login.process');

Route::get('/logout', function () {
    session()->forget('logged_in');
    return redirect()->route('login')->with('success', 'Anda berhasil logout.');
})->name('logout');

// =======================================================
// 🔒 PROTEKSI HALAMAN (WAJIB LOGIN)
// =======================================================

// ✅ Halaman daftar mobil
Route::get('/mobil', function () {
    if (!session('logged_in')) {
        return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');
    }

    $mobils = getLuxuryCars();
    return view('mobil.index', compact('mobils'));
})->name('mobil.index');

// ✅ Halaman detail mobil
Route::get('/mobil/{id}', function ($id) {
    if (!session('logged_in')) {
        return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');
    }

    $detail = collect(getLuxuryCars())->firstWhere('id', $id);
    abort_unless($detail, 404, 'Mobil tidak ditemukan');
    return view('mobil.detail', compact('detail'));
})->name('mobil.detail');

// ✅ Form hubungi konsultan
Route::post('/contact', function (Request $request) {
    $request->validate([
        'mobil_nama' => 'required|string',
        'mobil_harga' => 'required|string',
        'nama' => 'required|string|max:100',
        'telepon' => 'required|string|max:30',
        'email' => 'nullable|email',
        'pesan' => 'nullable|string|max:2000',
    ]);

    $data = [
        'id' => (string) Str::uuid(),
        'mobil_nama' => $request->mobil_nama,
        'mobil_harga' => $request->mobil_harga,
        'nama' => $request->nama,
        'telepon' => $request->telepon,
        'email' => $request->email,
        'pesan' => $request->pesan,
        'created_at' => now()->toDateTimeString(),
    ];

    $path = storage_path('app/contacts.json');
    $all = file_exists($path) ? json_decode(file_get_contents($path), true) : [];
    $all[] = $data;
    file_put_contents($path, json_encode($all, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE));

    return back()->with('success', 'Pesan Anda telah dikirim. Konsultan kami akan segera menghubungi Anda.');
})->name('contact.process');

// ✅ Admin Dashboard (opsional)
Route::get('/admin', function () {
    $path = storage_path('app/contacts.json');
    $contacts = file_exists($path) ? json_decode(file_get_contents($path), true) : [];
    return view('admin.dashboard', compact('contacts'));
})->name('admin.dashboard');