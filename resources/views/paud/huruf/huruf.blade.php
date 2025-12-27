<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Belajar Huruf</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body 
    style="background-image: url('{{ asset('assets/img/bg.png') }}');"
    class="bg-cover bg-center bg-no-repeat min-h-screen flex flex-col items-center text-black relative overflow-x-hidden"
>

    {{-- NAVBAR --}}
    @include('layouts.navbar')

    {{-- Top Navigation Button --}}
    <div class="w-full flex justify-between items-center px-6A">

        {{-- Tombol Kembali --}}
        <a href="/"
           class="bg-green-400 hover:bg-green-500 text-white font-bold px-5 py-2 rounded-full shadow-md flex items-center gap-2 transition-transform hover:scale-105">
            ⬅️ Kembali
        </a>

        {{-- Judul --}}
        <h1 class="text-4xl font-extrabold text-center text-purple-700 mt-6 mb-8 drop-shadow-md">
            ✨ Mari Belajar Huruf ✨
        </h1>

        {{-- Tombol ke Kuis --}}
        <a href="/kuis_huruf"
           class="bg-purple-500 hover:bg-purple-600 text-white font-bold px-5 py-2 rounded-full shadow-md flex items-center gap-2 transition-transform hover:scale-105">
            🎯 Kuis Huruf
        </a>
    </div>

    {{-- Grid Huruf --}}
    <div class="grid grid-cols-3 sm:grid-cols-6 md:grid-cols-8 gap-6 px-6 mb-12">
        @foreach(range('A', 'Z') as $huruf)
            <div
                class="bg-white border-4 border-yellow-400 rounded-3xl shadow-lg hover:scale-110 hover:rotate-2 transition-transform cursor-pointer flex flex-col items-center justify-center w-24 h-24"
                onclick="playSound('{{ strtolower($huruf) }}')"
            >
                <span class="text-4xl font-extrabold text-blue-600 drop-shadow-sm">
                    {{ $huruf }}
                </span>

                <span class="text-2xl font-semibold text-pink-500 -mt-1">
                    {{ strtolower($huruf) }}
                </span>
            </div>
        @endforeach
    </div>

    {{-- Audio player --}}
    <audio id="audioPlayer"></audio>

    {{-- Script suara --}}
    <script>
        function playSound(letter) {
            const audio = document.getElementById('audioPlayer');
            audio.src = `/assets/sound/${letter}.mp3`;
            audio.play();

            // animasi klik
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
