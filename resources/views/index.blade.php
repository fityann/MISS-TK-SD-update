
{{-- NAVIGASI --}}
@include('layouts.navbar')

{{-- KONTEN UTAMA --}}
<div class="relative z-10 pt-10 pb-16 px-4 flex-1 overflow-y-auto">

    {{-- JUDUL --}}
    <div class="text-center">
        <h1 class="text-5xl font-extrabold drop-shadow-lg animate-bounce text-yellow-600">
            Selamat Datang!
        </h1>
        <p class="mt-4 text-lg font-medium text-gray-800">
            Yuk, belajar sambil bermain dan mengenal dunia 🌈
        </p>
    </div>

    {{-- PILIH JENJANG --}}
    <div class="mt-16 max-w-4xl mx-auto">
        <h2 class="text-3xl font-extrabold text-center text-gray-900 mb-10">
            Pilih Jenjang Belajar
        </h2>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-10">

            {{-- PAUD --}}
            <a href="/paud"
               class="bg-green-300 hover:bg-green-400 transition transform hover:-translate-y-2 hover:scale-105 duration-300 rounded-3xl p-10 text-center shadow-[0_15px_25px_rgba(0,0,0,0.25)]">
                <img src="{{ asset('assets/img/paud.png') }}"
                     alt="PAUD"
                     class="mx-auto w-28 mb-6 animate-wiggle">
                <h3 class="text-3xl font-extrabold text-gray-900">PAUD Ajah</h3>
                <p class="mt-3 text-lg text-gray-700">
                    Belajar sambil bermain untuk usia dini
                </p>
            </a>

            {{-- TK --}}
            <a href="/tk"
               class="bg-purple-300 hover:bg-purple-400 transition transform hover:-translate-y-2 hover:scale-105 duration-300 rounded-3xl p-10 text-center shadow-[0_15px_25px_rgba(0,0,0,0.25)]">
                <img src="{{ asset('assets/img/tk.png') }}"
                     alt="TK"
                     class="mx-auto w-28 mb-6 animate-wiggle">
                <h3 class="text-3xl font-extrabold text-gray-900">TK</h3>
                <p class="mt-3 text-lg text-gray-700">
                    Siap membaca, menulis, dan berhitung
                </p>
            </a>

        </div>
    </div>

</div>

{{-- FOOTER --}}
<footer class="text-center py-6 text-sm text-gray-700">
    © 2025 Belajar Ceria
</footer>

{{-- ANIMASI --}}
<style>
    @keyframes wiggle {
        0%, 100% { transform: rotate(-3deg); }
        50% { transform: rotate(3deg); }
    }
    .animate-wiggle {
        animation: wiggle 1.5s ease-in-out infinite;
    }
</style>

