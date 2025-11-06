<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>{{ $detail['nama'] }} | Luxury Porsche</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-black text-white">

<!-- Navbar -->
<nav class="bg-black border-b border-gray-800 sticky top-0 z-50">
  <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">

    <a href="{{ route('mobil.index') }}" class="text-blue-500 font-semibold hover:text-blue-400">← Kembali</a>

    <div class="flex items-center space-x-3">
      <!-- 🔴 Logo EM Lingkaran -->
      <div class="flex flex-col items-center">
        <div class="w-10 h-10 flex items-center justify-center rounded-full bg-blue-600 text-white font-bold text-lg shadow-lg">
          LP
        </div>
        <span class="text-xs text-gray-400 mt-1 tracking-wider">Indonesia</span>
      </div>

      <!-- 🔹 Teks Brand -->
      <h1 class="text-xl font-bold text-blue-600">Luxury Porsche</h1>
    </div>
  </div>
</nav>

<!-- Detail Mobil -->
<section class="max-w-6xl mx-auto px-6 py-12 grid md:grid-cols-2 gap-10 items-center">
  <div>
    <img src="{{ asset($detail['foto']) }}" alt="{{ $detail['nama'] }}" class="rounded-xl shadow-xl">
  </div>

  <div>
    <h2 class="text-4xl font-bold mb-2">{{ $detail['nama'] }}</h2>
    <p class="text-blue-500 text-2xl mb-4">{{ $detail['harga'] }}</p>
    <p class="text-gray-400 mb-6">{{ $detail['deskripsi'] }}</p>

    <ul class="space-y-2 text-gray-300 mb-6">
      <li><strong>Tahun:</strong> {{ $detail['tahun'] }}</li>
      <li><strong>Warna:</strong> {{ $detail['warna'] }}</li>
      <li><strong>Transmisi:</strong> {{ $detail['transmisi'] }}</li>
    </ul>

    <!-- Tombol buka modal -->
    <button onclick="toggleModal(true)" class="inline-block bg-blue-600 px-6 py-3 rounded-full hover:bg-blue-700 transition text-lg font-semibold">
      Hubungi Konsultan
    </button>
  </div>
</section>

<!-- Modal Hubungi Konsultan -->
<div id="contactModal" class="hidden fixed inset-0 bg-black bg-opacity-70 flex justify-center items-center z-50">
  <div class="bg-gray-900 rounded-2xl p-8 w-full max-w-md relative">
    <button onclick="toggleModal(false)" class="absolute top-3 right-3 text-gray-400 hover:text-white text-2xl">&times;</button>
    <h3 class="text-2xl font-bold mb-4 text-center text-blue-500">Hubungi Konsultan</h3>

    @if(session('success'))
      <div class="bg-green-600 text-white p-3 rounded mb-4 text-center">
        {{ session('success') }}
      </div>
    @endif

    <form method="POST" action="{{ route('contact.process') }}" class="space-y-4">
      @csrf
      <input type="hidden" name="mobil_nama" value="{{ $detail['nama'] }}">
      <input type="hidden" name="mobil_harga" value="{{ $detail['harga'] }}">

      <div>
        <label class="block text-sm text-gray-300 mb-1">Nama Lengkap</label>
        <input type="text" name="nama" class="w-full p-2 rounded bg-gray-800 text-white" required>
      </div>

      <div>
        <label class="block text-sm text-gray-300 mb-1">Nomor Telepon / WhatsApp</label>
        <input type="text" name="telepon" class="w-full p-2 rounded bg-gray-800 text-white" required>
      </div>

      <div>
        <label class="block text-sm text-gray-300 mb-1">Email (Opsional)</label>
        <input type="email" name="email" class="w-full p-2 rounded bg-gray-800 text-white">
      </div>

      <div>
        <label class="block text-sm text-gray-300 mb-1">Pesan Tambahan</label>
        <textarea name="pesan" rows="3" class="w-full p-2 rounded bg-gray-800 text-white" placeholder="Contoh: Saya ingin test drive"></textarea>
      </div>

      <div class="flex justify-between items-center">
        <button type="submit" class="bg-blue-600 px-4 py-2 rounded hover:bg-blue-700 transition">Kirim</button>

        <!-- Tombol WhatsApp -->
        <a href="https://wa.me/6281234567890?text=Halo%20saya%20tertarik%20dengan%20{{ urlencode($detail['nama']) }}%20({{ urlencode($detail['harga']) }})"
           target="_blank"
           class="bg-green-600 px-4 py-2 rounded hover:bg-green-700 transition">
          WhatsApp
        </a>
      </div>
    </form>
  </div>
</div>

<!-- Footer -->
<footer class="text-center py-6 border-t border-gray-800 text-gray-500">
  © 2025 Luxury Porsche Indonesia
</footer>

<!-- Script Modal -->
<script>
function toggleModal(show) {
  document.getElementById('contactModal').classList.toggle('hidden', !show);
}
</script>

</body>
</html>
