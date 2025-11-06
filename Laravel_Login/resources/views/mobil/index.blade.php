<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Koleksi Porsche | Luxury Porsche</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
</head>
<body class="bg-black text-white">

<!-- 🔹 Navbar -->
<nav class="bg-black border-b border-gray-800 sticky top-0 z-50">
  <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
    <div class="flex items-center space-x-3">
      <!-- 🔴 Logo EM -->
      <div class="flex flex-col items-center">
        <div class="w-10 h-10 flex items-center justify-center rounded-full bg-blue-600 text-white font-bold text-lg shadow-lg">
          LP
        </div>
        <span class="text-xs text-gray-400 mt-1 tracking-wider">Indonesia</span>
      </div>

      <!-- 🔹 Teks Brand -->
      <h1 class="text-2xl font-bold text-blue-600">Luxury Porsche</h1>
    </div>

    <!-- 🔹 Tombol Logout -->
    <a href="{{ route('logout') }}" class="bg-gray-700 px-4 py-2 rounded-full hover:bg-gray-600 transition">Logout</a>
  </div>
</nav>

<!-- ✅ Alert Notifikasi -->
@if(session('error'))
  <div class="max-w-3xl mx-auto mt-6">
    <div class="bg-blue-600 text-white p-4 rounded-xl shadow-lg text-center font-semibold">
      {{ session('error') }}
    </div>
  </div>
@endif

@if(session('success'))
  <div class="max-w-3xl mx-auto mt-6">
    <div class="bg-green-600 text-white p-4 rounded-xl shadow-lg text-center font-semibold">
      {{ session('success') }}
    </div>
  </div>
@endif

<!-- 🔹 Koleksi Mobil -->
<section class="max-w-7xl mx-auto px-6 py-12">
  <h2 class="text-4xl font-semibold mb-10 text-center">Koleksi Mobil Porsche</h2>

  <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-10">
    @foreach($mobils as $m)
      <div class="bg-gray-900 rounded-xl overflow-hidden shadow-xl hover:scale-105 transform transition" data-aos="fade-up">
        <img src="{{ asset($m['foto']) }}" class="w-full h-56 object-cover" alt="{{ $m['nama'] }}">
        <div class="p-5">
          <h3 class="text-xl font-bold mb-2">{{ $m['nama'] }}</h3>
          <p class="text-blue-500 text-lg mb-3">{{ $m['harga'] }}</p>
          <p class="text-gray-400 text-sm mb-4">{{ $m['deskripsi'] }}</p>
          <a href="{{ route('mobil.detail', $m['id']) }}" class="inline-block bg-blue-600 px-4 py-2 rounded-full hover:bg-red-700 transition">Detail</a>
        </div>
      </div>
    @endforeach
  </div>
</section>

<!-- 🔹 Footer -->
<footer class="text-center py-6 border-t border-gray-800 text-gray-500">
  © 2025 Luxury Porsche Indonesia
</footer>

<!-- 🔹 Animasi Scroll -->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>AOS.init();</script>

</body>
</html>
