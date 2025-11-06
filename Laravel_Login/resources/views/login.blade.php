<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Login | Luxury Porsche</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="relative text-white flex items-center justify-center min-h-screen bg-cover bg-center"
      style="background-image: url('https://i.pinimg.com/736x/29/91/96/299196638050b920f805fbf650637d01.jpg');">

  <!-- 🔳 Overlay agar teks terlihat jelas -->
  <div class="absolute inset-0 bg-black/60"></div>

  <!-- 🔐 Container utama -->
  <div class="relative z-10 bg-gray-900/80 p-10 rounded-2xl shadow-2xl w-96 border border-gray-800 backdrop-blur-sm">
    
    <!-- 🔴 Logo -->
    <div class="flex flex-col items-center mb-6">
      <div class="w-14 h-14 flex items-center justify-center rounded-full bg-blue-600 text-white font-bold text-xl shadow-lg">
        LP
      </div>
      <span class="text-xs text-gray-400 mt-1 tracking-wider">Indonesia</span>
    </div>

    <h1 class="text-3xl font-bold text-center text-blue-600 mb-8">Luxury Porsche</h1>

    <!-- ✅ Alert -->
    @if(session('error'))
      <div class="bg-blue-600 text-white text-sm p-3 rounded mb-4 text-center font-semibold alert">
        {{ session('error') }}
      </div>
    @endif

    @if(session('success'))
      <div class="bg-green-600 text-white text-sm p-3 rounded mb-4 text-center font-semibold alert">
        {{ session('success') }}
      </div>
    @endif

    <!-- 🔐 Form Login -->
    <form method="POST" action="{{ route('login.process') }}">
      @csrf
      <div class="mb-4">
        <label class="block text-sm text-gray-300 mb-1">Username</label>
        <input type="text" name="username" class="w-full p-2 rounded bg-gray-800/80 border border-gray-700 focus:border-blue-600 outline-none" required>
      </div>

      <div class="mb-6">
        <label class="block text-sm text-gray-300 mb-1">Password</label>
        <input type="password" name="password" class="w-full p-2 rounded bg-gray-800/80 border border-gray-700 focus:border-blue-600 outline-none" required>
      </div>

      <button type="submit" class="w-full py-2 bg-blue-600 hover:bg-blue-700 rounded-lg font-semibold transition">
        Masuk
      </button>
    </form>
  </div>

  <!-- ⏱️ Auto-hide alert -->
  <script>
    setTimeout(() => {
      document.querySelectorAll('.alert').forEach(a => a.remove());
    }, 3000);
  </script>

</body>
</html>
