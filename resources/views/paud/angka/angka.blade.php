<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Belajar Angka</title>
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body style="background-image: url('{{ asset('assets/img/bg.png') }}');"
      class="bg-cover bg-center bg-no-repeat min-h-screen flex flex-col items-center text-black relative overflow-x-hidden">

  {{-- Navigasi --}}
 @include('layouts.navbar')

 {{-- Tombol Navigasi Atas --}}
<div class="w-full flex justify-between items-center px-6 pt-24">

  <!-- Tombol Kembali -->
  <a href="/tk"
     class="bg-green-400 hover:bg-green-500 text-white font-bold px-5 py-2 rounded-full shadow-md flex items-center gap-2 transition-transform hover:scale-105">
    ⬅️ Kembali
  </a>

  <!-- Tombol ke Kuis -->
  <a href="/kuis_angka"
     class="bg-purple-500 hover:bg-purple-600 text-white font-bold px-5 py-2 rounded-full shadow-md flex items-center gap-2 transition-transform hover:scale-105">
    🎯 Kuis Angka
  </a>
</div>

  {{-- Judul --}}
  <h1 class="text-4xl font-extrabold text-center text-blue-700 mt-6 mb-8 drop-shadow-md">
    🔢 Mari Belajar Angka 🔢
  </h1>

  {{-- Grid Angka --}}
  <div class="grid grid-cols-3 sm:grid-cols-5 gap-6 px-6 mb-12">
    @foreach(range(1, 10) as $angka)
      <div
        class="bg-white border-4 border-blue-400 rounded-3xl shadow-lg hover:scale-110 hover:rotate-2 transition-transform cursor-pointer flex flex-col items-center justify-center w-24 h-24"
        onclick="playNumber('{{ $angka }}')">

        {{-- Angka besar --}}
        <span class="text-4xl font-extrabold text-blue-600 drop-shadow-sm">
          {{ $angka }}
        </span>

        {{-- Teks angka --}}
        <span class="text-sm text-gray-600 font-medium mt-1">
          {{
            \Illuminate\Support\Str::ucfirst(
              \Illuminate\Support\Str::of(
                \Illuminate\Support\Str::replace(
                  ['1','2','3','4','5','6','7','8','9','10'],
                  ['satu','dua','tiga','empat','lima','enam','tujuh','delapan','sembilan','sepuluh'],
                  $angka
                )
              )
            )
          }}
        </span>
      </div>
    @endforeach
  </div>

  {{-- Audio player --}}
  <audio id="audioPlayer"></audio>

  {{-- Script --}}
  <script>
    function playNumber(num) {
      const audio = document.getElementById('audioPlayer');
      audio.src = `/assets/sound/${num}.mp3`;
      audio.play();

      // Efek klik lucu
      const el = event.currentTarget;
      el.classList.add("scale-125");
      setTimeout(() => el.classList.remove("scale-125"), 200);
    }
  </script>

  {{-- Footer --}}
  <footer class="text-center text-sm text-gray-700 mb-6">
    © 2025 Belajar Ceria
  </footer>

</body>
</html>
