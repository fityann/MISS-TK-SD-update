<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pilih Materi Matematika</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .bg-game {
            background-image: url('{{ asset('assets/img/kindergarten backgro.png') }}');
            background-size: cover;
            background-position: center;
        }
        /* Animasi melayang imut */
        .floating {
            animation: floating 3s ease-in-out infinite;
        }
        @keyframes floating {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-8px); }
        }
        /* Efek klik tombol */
        .btn-pop:active {
            transform: scale(0.95);
        }
    </style>
</head>
<body class="bg-game min-h-screen flex flex-col font-sans overflow-hidden">

    @include('layouts.navbar')

    <div class="flex-grow flex flex-col items-center justify-center px-4">
        
        <div class="relative mb-10">
            <div class="bg-white border-[6px] border-yellow-400 rounded-full px-10 py-2 shadow-lg relative z-10">
                <h1 class="text-2xl md:text-3xl font-black text-orange-600 uppercase tracking-tight">
                    PILIH GAME SERU! ✏️
                </h1>
            </div>
            <div class="absolute -right-4 -top-2 text-4xl transform rotate-12"></div>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-4 gap-6 max-w-4xl w-full">
            
            <a href="/tk/matematika/tambah/game" class="btn-pop group">
                <div class="flex flex-col items-center">
                    <img src="https://cdn-icons-png.flaticon.com/512/4207/4207253.png" class="w-16 h-16 z-20 floating mb-[-10px]" alt="Ayam">
                    <div class="bg-[#E91E63] w-full aspect-square max-w-[160px] rounded-[30px] border-[6px] border-white shadow-xl flex items-center justify-center text-white text-6xl font-black shadow-[0_8px_0_0_#ad1457] group-hover:brightness-110 transition-all">
                        +
                    </div>
                    <div class="mt-4 bg-white border-2 border-pink-200 px-5 py-1 rounded-full text-sm font-black text-pink-600 shadow-sm uppercase">Tambah</div>
                </div>
            </a>

            <a href="/tk/matematika/kurang/game" class="btn-pop group">
                <div class="flex flex-col items-center">
                    <img src="https://cdn-icons-png.flaticon.com/512/1995/1995562.png" class="w-16 h-16 z-20 floating mb-[-10px] animation-delay-200" alt="Jerapah">
                    <div class="bg-[#707070] w-full aspect-square max-w-[160px] rounded-[30px] border-[6px] border-white shadow-xl flex items-center justify-center text-white text-6xl font-black shadow-[0_8px_0_0_#4a4a4a] group-hover:brightness-110 transition-all">
                        -
                    </div>
                    <div class="mt-4 bg-white border-2 border-gray-200 px-5 py-1 rounded-full text-sm font-black text-gray-600 shadow-sm uppercase">Kurang</div>
                </div>
            </a>

            <a href="/tk/matematika/kali/game" class="btn-pop group">
                <div class="flex flex-col items-center">
                    <img src="https://cdn-icons-png.flaticon.com/512/616/616412.png" class="w-16 h-16 z-20 floating mb-[-10px] animation-delay-500" alt="Gajah">
                    <div class="bg-[#4CAF50] w-full aspect-square max-w-[160px] rounded-[30px] border-[6px] border-white shadow-xl flex items-center justify-center text-white text-6xl font-black shadow-[0_8px_0_0_#2e7d32] group-hover:brightness-110 transition-all">
                        ×
                    </div>
                    <div class="mt-4 bg-white border-2 border-green-200 px-5 py-1 rounded-full text-sm font-black text-green-600 shadow-sm uppercase">Kali</div>
                </div>
            </a>

            <a href="#" class="btn-pop group">
                <div class="flex flex-col items-center">
                    <img src="https://cdn-icons-png.flaticon.com/512/434/434845.png" class="w-16 h-16 z-20 floating mb-[-10px] animation-delay-700" alt="Panda">
                    <div class="bg-[#FF9800] w-full aspect-square max-w-[160px] rounded-[30px] border-[6px] border-white shadow-xl flex items-center justify-center text-white text-6xl font-black shadow-[0_8px_0_0_#ef6c00] group-hover:brightness-110 transition-all">
                        ÷
                    </div>
                    <div class="mt-4 bg-white border-2 border-orange-200 px-5 py-1 rounded-full text-sm font-black text-orange-600 shadow-sm uppercase">Bagi</div>
                </div>
            </a>

        </div>
    </div>

</body>
</html>