<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Admin Dashboard | Luxury Porsche</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-black text-white">
  <div class="max-w-6xl mx-auto py-10">
    <h1 class="text-3xl text-red-600 font-bold mb-6">📊 Data Konsultasi Pelanggan</h1>

    @if(empty($contacts))
      <p class="text-gray-400">Belum ada pesan yang masuk.</p>
    @else
      <table class="min-w-full text-left border border-gray-700">
        <thead class="bg-gray-800">
          <tr>
            <th class="px-4 py-2">Nama</th>
            <th class="px-4 py-2">Telepon</th>
            <th class="px-4 py-2">Mobil</th>
            <th class="px-4 py-2">Pesan</th>
            <th class="px-4 py-2">Waktu</th>
          </tr>
        </thead>
        <tbody>
          @foreach($contacts as $c)
            <tr class="border-t border-gray-700 hover:bg-gray-800">
              <td class="px-4 py-2">{{ $c['nama'] }}</td>
              <td class="px-4 py-2">{{ $c['telepon'] }}</td>
              <td class="px-4 py-2">{{ $c['mobil_nama'] }}</td>
              <td class="px-4 py-2">{{ $c['pesan'] ?? '-' }}</td>
              <td class="px-4 py-2">{{ $c['created_at'] }}</td>
            </tr>
          @endforeach
        </tbody>
      </table>
    @endif

    <div class="mt-6">
      <a href="{{ route('mobil.index') }}" class="bg-red-600 px-4 py-2 rounded hover:bg-red-700">← Kembali</a>
      <a href="{{ route('logout') }}" class="bg-gray-700 px-4 py-2 rounded hover:bg-gray-600 ml-2">Logout</a>
    </div>
  </div>
</body>
</html>
