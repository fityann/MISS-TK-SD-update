{{-- NAVIGASI --}}
@include('layouts.navbar1')

{{-- Konten utama --}}
<div class="relative z-10 pt-10 pb-10 px-4 flex-1 overflow-y-auto">
    <div class="text-center">
        <h1 class="text-5xl font-extrabold drop-shadow-lg animate-bounce text-yellow-600">
            Selamat Datang!
        </h1>
        <p class="mt-4 text-lg font-medium text-gray-800">
            Yuk, belajar sambil bermain dan mengenal dunia TK Bersama Arisss!
        </p>
    </div>

    <div class="mt-12 max-w-5xl mx-auto text-2xl font-bold text-gray-900">Pembelajaran</div>
    {{-- Kategori belajar --}}
    <div class="mt-12 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 max-w-5xl mx-auto">

        <a href="/paud/huruf"
            class="bg-yellow-300 hover:bg-yellow-400 transition transform hover:-translate-y-2 hover:rotate-1 duration-300 rounded-2xl p-6 text-center shadow-[0_10px_15px_rgba(0,0,0,0.2)]">
            <img src="{{ asset('assets/img/btn_abcs.png') }}" alt="Huruf" class="mx-auto w-20 mb-3 animate-wiggle">
            <h2 class="text-2xl font-bold text-gray-900">Belajar Huruf</h2>
            <p class="mt-2 text-sm text-gray-700">Kenali huruf dari A sampai Z!</p>
        </a>

        <a href="/angka"
            class="bg-blue-300 hover:bg-blue-400 transition transform hover:-translate-y-2 hover:rotate-1 duration-300 rounded-2xl p-6 text-center shadow-[0_10px_15px_rgba(0,0,0,0.2)]">
            <img src="{{ asset('assets/img/btn_numbers.png') }}" alt="Angka"
                class="mx-auto w-20 mb-3 animate-wiggle">
            <h2 class="text-2xl font-bold text-gray-900">Belajar Angka</h2>
            <p class="mt-2 text-sm text-gray-700">Hitung dari 1 sampai 10!</p>
        </a>

        <a href="/warna"
            class="bg-pink-300 hover:bg-pink-400 transition transform hover:-translate-y-2 hover:rotate-1 duration-300 rounded-2xl p-6 text-center shadow-[0_10px_15px_rgba(0,0,0,0.2)]">
            <img src="{{ asset('assets/img/btn_colors.png') }}" alt="Warna" class="mx-auto w-20 mb-3 animate-wiggle">
            <h2 class="text-2xl font-bold text-gray-900">Belajar Warna</h2>
            <p class="mt-2 text-sm text-gray-700">Temukan warna-warna indah di sekitarmu!</p>
        </a>
    </div>


    <div class="mt-12 max-w-5xl mx-auto text-2xl font-bold text-gray-900">Quiz Pembelajaran</div>
    <div class="mt-12 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8 max-w-5xl mx-auto">

        <a href="/paud/huruf/game"
            class="bg-yellow-300 hover:bg-yellow-400 transition transform hover:-translate-y-2 hover:rotate-1 duration-300 rounded-2xl p-6 text-center shadow-[0_10px_15px_rgba(0,0,0,0.2)]">
            <img src="{{ asset('assets/img/btn_abcs.png') }}" alt="Huruf" class="mx-auto w-20 mb-3 animate-wiggle">
            <h2 class="text-2xl font-bold text-gray-900">QuizBelajar Huruf</h2>
            <p class="mt-2 text-sm text-gray-700">Kenali huruf dari A sampai Z!</p>
        </a>

        <a href="/angka"
            class="bg-blue-300 hover:bg-blue-400 transition transform hover:-translate-y-2 hover:rotate-1 duration-300 rounded-2xl p-6 text-center shadow-[0_10px_15px_rgba(0,0,0,0.2)]">
            <img src="{{ asset('assets/img/btn_numbers.png') }}" alt="Angka"
                class="mx-auto w-20 mb-3 animate-wiggle">
            <h2 class="text-2xl font-bold text-gray-900">Quiz Belajar Angka</h2>
            <p class="mt-2 text-sm text-gray-700">Hitung dari 1 sampai 10!</p>
        </a>

        <a href="/warna"
            class="bg-pink-300 hover:bg-pink-400 transition transform hover:-translate-y-2 hover:rotate-1 duration-300 rounded-2xl p-6 text-center shadow-[0_10px_15px_rgba(0,0,0,0.2)]">
            <img src="{{ asset('assets/img/btn_colors.png') }}" alt="Warna" class="mx-auto w-20 mb-3 animate-wiggle">
            <h2 class="text-2xl font-bold text-gray-900">Quiz Belajar Warna</h2>
            <p class="mt-2 text-sm text-gray-700">Temukan warna-warna indah di sekitarmu!</p>
        </a>
    </div>
</div>

{{-- Footer --}}
<footer class="text-center py-6 text-sm text-gray-700">
    © 2025 Belajar Ceria
</footer>

{{-- Animasi tambahan --}}
<style>
    @keyframes wiggle {

        0%,
        100% {
            transform: rotate(-3deg);
        }

        50% {
            transform: rotate(3deg);
        }
    }

    .animate-wiggle {
        animation: wiggle 1.5s ease-in-out infinite;
    }
</style>
</body>

</html>
