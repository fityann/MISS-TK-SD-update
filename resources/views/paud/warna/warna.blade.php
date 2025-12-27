<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Belajar Huruf</title>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body style="background-image: url('{{ asset('assets/img/bg.png') }}');" 
      class="bg-cover bg-center bg-no-repeat min-h-screen flex flex-col items-center justify-center text-black relative overflow-hidden">

       {{-- Navigasi --}}
   @include('layouts.navbar')

 {{-- Tombol Navigasi Atas --}}
<div class="w-full flex justify-between items-center px-6 pt-24">
  
  <!-- Tombol Kembali -->
  <a href="/" 
     class="bg-green-400 hover:bg-green-500 text-white font-bold px-5 py-2 rounded-full shadow-md flex items-center gap-2 transition-transform hover:scale-105">
    ⬅️ Kembali
  </a>

  <!-- Tombol ke Kuis -->
  <a href="/kuis_huruf" 
     class="bg-purple-500 hover:bg-purple-600 text-white font-bold px-5 py-2 rounded-full shadow-md flex items-center gap-2 transition-transform hover:scale-105">
    🎯 Kuis Warna
  </a>
</div>

  <!-- Judul -->
  <h1 class="text-4xl font-extrabold text-center text-pink-700 mb-6 drop-shadow-md">
    🎨 Mari Belajar Warna 🎨
  </h1>

  <!-- Grid warna -->
  <div class="grid grid-cols-2 sm:grid-cols-4 lg:grid-cols-5 gap-6 px-6">

    @php
      $colors = [
        ['name' => 'Merah', 'hex' => '#ef4444'],
        ['name' => 'Kuning', 'hex' => '#facc15'],
        ['name' => 'Hijau', 'hex' => '#22c55e'],
        ['name' => 'Biru', 'hex' => '#3b82f6'],
        ['name' => 'Ungu', 'hex' => '#a855f7'],
        ['name' => 'Oranye', 'hex' => '#f97316'],
        ['name' => 'Pink', 'hex' => '#ec4899'],
        ['name' => 'Coklat', 'hex' => '#92400e'],
        ['name' => 'Hitam', 'hex' => '#000000'],
        ['name' => 'Putih', 'hex' => '#ffffff'],
      ];
    @endphp

    @foreach($colors as $color)
      <div 
        class="relative rounded-3xl shadow-lg border-4 border-white hover:scale-110 transition-transform cursor-pointer flex flex-col items-center justify-center w-28 h-28"
        style="background-color: {{ $color['hex'] }};"
        onclick="playColor('{{ strtolower(str_replace(' ', '_', $color['name'])) }}')">

        <span class="text-white text-lg font-extrabold drop-shadow-md">
          {{ $color['name'] }}
        </span>

        @if($color['name'] === 'Putih')
          <span class="absolute inset-0 flex items-center justify-center text-gray-700 font-bold">Putih</span>
        @endif
      </div>
    @endforeach
  </div>

  <!-- Audio player -->
  <audio id="audioPlayer"></audio>

  <script>
    function playColor(name) {
      const audio = document.getElementById('audioPlayer');
      audio.src = `/assets/sound/${name}.mp3`; // misal merah.mp3, biru.mp3, dll
      audio.play();

      const el = event.currentTarget;
      el.classList.add("scale-125");
      setTimeout(() => el.classList.remove("scale-125"), 200);
    }
  </script>

  <!-- Footer -->
  <footer class="mt-10 text-sm text-gray-600">
    © 2025 Belajar Ceria
  </footer>

</body>
</html>
