<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Materi Pengurangan Ceria</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .bg-game {
            background-image: url('{{ asset('assets/img/kindergarten backgro.png') }}');
            background-size: cover; background-position: center;
        }
        .slider-wrapper {
            display: flex;
            transition: transform 0.5s ease-in-out;
        }
        .slide-page {
            min-width: 100%;
        }
    </style>
</head>
<body class="bg-game min-h-screen flex flex-col font-sans relative overflow-x-hidden">

    @include('layouts.navbar')

    {{-- Container Utama --}}
    <div class="flex-grow flex flex-col items-center justify-center px-4 pt-24 pb-12">
        
        {{-- TOMBOL KEMBALI (Sejajar dengan Box) --}}
        <div class="w-full max-w-5xl mb-4">
            <a href="/tk/matematika/pilih"
               class="inline-block bg-green-400 hover:bg-green-500 text-white font-bold px-5 py-2 rounded-full shadow-md transition-transform hover:scale-105">
                ⬅️ Kembali
            </a>
        </div>

        {{-- BOX MATERI --}}
        <div class="relative w-full max-w-5xl bg-[#FFF9E3] rounded-[40px] border-[10px] border-[#D28E43] shadow-2xl p-4 md:p-8">
            
            <div class="absolute -top-7 left-1/2 transform -translate-x-1/2 bg-red-600 text-white px-12 py-3 rounded-2xl shadow-lg font-black text-2xl uppercase tracking-widest z-20">
                PENGURANGAN
            </div>

            {{-- Tombol Panah Kiri --}}
            <button onclick="moveSlide(-1)" class="absolute -left-6 top-1/2 -translate-y-1/2 bg-orange-500 text-white p-3 rounded-full shadow-lg z-30 hidden md:block border-4 border-white">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="4" d="M15 19l-7-7 7-7" />
                </svg>
            </button>

            <div class="overflow-hidden mt-8">
                <div id="mainSlider" class="slider-wrapper">
                    
                    {{-- HALAMAN 1 (Tabel 1-5) --}}
                    <div class="slide-page grid grid-cols-2 md:grid-cols-5 gap-3">
                        @php
                            $colors = ['bg-pink-100 border-pink-300', 'bg-blue-100 border-blue-300', 'bg-green-100 border-green-300', 'bg-yellow-100 border-yellow-300', 'bg-purple-100 border-purple-300'];
                            $textColors = ['text-pink-600', 'text-blue-600', 'text-green-600', 'text-yellow-600', 'text-purple-600'];
                        @endphp
                        @for ($i = 1; $i <= 5; $i++)
                        <div class="{{ $colors[$i-1] }} border-2 rounded-2xl p-3 shadow-sm">
                            <h4 class="text-center font-black text-lg mb-2 {{ $textColors[$i-1] }}">Tabel {{ $i }}</h4>
                            <div class="space-y-1 text-sm md:text-base font-bold text-gray-700">
                                @for ($j = 1; $j <= 10; $j++)
                                <div class="flex justify-between border-b border-white/50 px-1">
                                    <span>{{ $i + $j }} - {{ $i }}</span>
                                    <span class="text-black">= {{ $j }}</span>
                                </div>
                                @endfor
                            </div>
                        </div>
                        @endfor
                    </div>

                    {{-- HALAMAN 2 (Tabel 6-10) --}}
                    <div class="slide-page grid grid-cols-2 md:grid-cols-5 gap-3">
                        @php
                            $colors2 = ['bg-orange-100 border-orange-300', 'bg-cyan-100 border-cyan-300', 'bg-emerald-100 border-emerald-300', 'bg-indigo-100 border-indigo-300', 'bg-rose-100 border-rose-300'];
                            $textColors2 = ['text-orange-600', 'text-cyan-600', 'text-emerald-600', 'text-indigo-600', 'text-rose-600'];
                        @endphp
                        @for ($i = 6; $i <= 10; $i++)
                        <div class="{{ $colors2[$i-6] }} border-2 rounded-2xl p-3 shadow-sm">
                            <h4 class="text-center font-black text-lg mb-2 {{ $textColors2[$i-6] }}">Tabel {{ $i }}</h4>
                            <div class="space-y-1 text-sm md:text-base font-bold text-gray-700">
                                @for ($j = 1; $j <= 10; $j++)
                                <div class="flex justify-between border-b border-white/50 px-1">
                                    <span>{{ $i + $j }} - {{ $i }}</span>
                                    <span class="text-black">= {{ $j }}</span>
                                </div>
                                @endfor
                            </div>
                        </div>
                        @endfor
                    </div>

                </div>
            </div>

            {{-- Tombol Panah Kanan --}}
            <button onclick="moveSlide(1)" class="absolute -right-6 top-1/2 -translate-y-1/2 bg-orange-500 text-white p-3 rounded-full shadow-lg z-30 hidden md:block border-4 border-white">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="4" d="M9 5l7 7-7 7" />
                </svg>
            </button>

            <div class="mt-8 flex justify-center">
                <a href="/tk/matematika/materimtk" class="bg-blue-500 hover:bg-blue-600 text-white font-black px-10 py-3 rounded-2xl shadow-[0_5px_0_0_#1e40af] active:translate-y-1 active:shadow-none uppercase">
                    Selesai Belajar 🏠
                </a>
            </div>

        </div>
    </div>

    {{-- SCRIPT JAVASCRIPT YANG LENGKAP --}}
    <script>
        let currentSlide = 0;
        const totalSlides = 2; // Karena ada Halaman 1 dan Halaman 2

        function moveSlide(direction) {
            const slider = document.getElementById('mainSlider');
            currentSlide += direction;
            
            // Supaya tidak bablas keluar batas slide
            if (currentSlide < 0) {
                currentSlide = 0;
            } else if (currentSlide >= totalSlides) {
                currentSlide = totalSlides - 1;
            }
            
            // Geser slidernya
            slider.style.transform = `translateX(-${currentSlide * 100}%)`;
        }
    </script>

</body>
</html>