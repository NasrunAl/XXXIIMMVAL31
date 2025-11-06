<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Luxury Porsche | Porsche Collection</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
</head>
<body class="bg-black text-white font-sans">

<!-- Hero Section -->
<section class="relative h-screen flex items-center justify-center text-center bg-cover bg-center" style="background-image: url('/images/garage.jpg');">
  <div class="bg-black bg-opacity-70 p-10 rounded-xl" data-aos="fade-up">
    <h1 class="text-5xl font-bold mb-4 tracking-wide">LUXURY PORSCHE</h1>
    <p class="text-gray-300 mb-6">Kolektor Mobil Porsche Mewah & Eksklusif</p>
    <a href="{{ route('mobil.index') }}" class="px-6 py-3 bg-red-600 hover:bg-red-700 rounded-full text-lg font-semibold">Jelajahi Koleksi</a>
  </div>
</section>

<footer class="text-center py-4 text-gray-500 bg-black border-t border-gray-800">
  © 2025 Luxury Porsche Indonesia
</footer>

<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>AOS.init();</script>
</body>
</html>
