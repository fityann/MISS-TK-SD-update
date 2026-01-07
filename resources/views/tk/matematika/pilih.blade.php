<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Belajar atau Bermain?</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .bg-game {
            background-image: url('{{ asset('assets/img/kindergarten backgro.png') }}');
            background-size: cover;
            background-position: center;
        }

        /* Animasi Bouncy yang lebih halus */
        .btn-bouncy {
            transition: all 0.2s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }

        .btn-bouncy:hover {
            transform: translateY(-5px) scale(1.05);
        }

        .btn-bouncy:active {
            transform: scale(0.95);
        }

        .shimmer {
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.3) 0%, rgba(255, 255, 255, 0) 50%);
        }
    </style>
</head>

<body class="bg-game min-h-screen flex flex-col font-sans overflow-hidden">
    @include('layouts.navbar')

    <div class="w-full max-w-5xl mb-6">
        <a href="/tk"
            class="inline-block ml-5 bg-green-400 hover:bg-green-500 text-white font-bold px-5 py-2 rounded-full shadow-md transition-transform hover:scale-105">
            ⬅️ Kembali
        </a>
    </div>

    <div class="flex-grow flex flex-col items-center justify-center px-6">
        <div class="flex flex-col sm:flex-row gap-6 md:gap-10 items-center justify-center w-full max-w-4xl">
            <a href="/tk/matematika/materimtk" class="btn-bouncy group relative w-full sm:w-auto">
                <div class="absolute -top-10 left-1/2 -translate-x-1/2 text-4xl drop-shadow-sm">📖</div>

                <div
                    class="bg-[#A2D149] border-[6px] border-white px-10 py-4 rounded-[35px] shadow-[0_10px_0_0_#689F38] relative overflow-hidden text-center">
                    <div class="absolute inset-0 shimmer"></div>
                    <span
                        class="text-white text-3xl md:text-4xl font-black tracking-wide uppercase drop-shadow-md relative z-10">
                        BELAJAR
                    </span>
                </div>
            </a>
            <a href="/tk/matematika/gamemtk" class="btn-bouncy group relative w-full sm:w-auto">
                <div class="absolute -top-10 left-1/2 -translate-x-1/2 text-4xl drop-shadow-sm">🎮</div>

                <div
                    class="bg-[#F06292] border-[6px] border-white px-10 py-4 rounded-[35px] shadow-[0_10px_0_0_#C2185B] relative overflow-hidden text-center">
                    <div class="absolute inset-0 shimmer"></div>
                    <span
                        class="text-white text-3xl md:text-4xl font-black tracking-wide uppercase drop-shadow-md relative z-10">
                        BERMAIN
                    </span>
                </div>
            </a>
        </div>
        <div class="mt-16 bg-white/80 backdrop-blur-sm border-2 border-yellow-400 px-6 py-2 rounded-2xl shadow-md">
            <p class="text-lg md:text-xl font-bold text-orange-600 text-center italic">
                Halo Teman Pintar! Pilih salah satu ya ✨
            </p>
        </div>
    </div>
</body>

</html>
