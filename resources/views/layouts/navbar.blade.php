<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Belajar Ceria</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</head>

<body style="background-image: url('{{ asset('assets/img/bg.png') }}');"
    class="bg-cover bg-center bg-no-repeat min-h-screen flex flex-col text-black relative overflow-x-hidden">

    <!-- 🌈 Navbar -->
    <nav class="fixed top-0 left-0 w-full bg-white/70 backdrop-blur-md shadow-md z-50" x-data="{ open: false }">
        <div class="max-w-7xl mx-auto flex justify-between items-center px-6 py-3">

            <!-- Logo -->
            <h1 class="text-xl md:text-2xl font-extrabold text-yellow-600">
                🌟 Belajar Ceria 🌟
            </h1>

            <!-- Tombol Mobile -->
            <button @click="open = !open" class="md:hidden text-yellow-600 focus:outline-none text-3xl">
                ☰
            </button>

            <!-- Menu Desktop -->
            <ul class="hidden md:flex gap-6 text-gray-800 font-medium">
                <li><a href="/" class="hover:text-yellow-500 transition">Beranda</a></li>
                <li><a href="/huruf" class="hover:text-yellow-500 transition">Huruf</a></li>
                <li><a href="/angka" class="hover:text-yellow-500 transition">Angka</a></li>
                <li><a href="/warna" class="hover:text-yellow-500 transition">Warna</a></li>
                @auth
                    <li><a href="/dashboard" class="hover:text-yellow-500 transition">Dashboard</a></li>
                    <li>
                        <form method="POST" action="/logout">
                            @csrf
                            <button class="hover:text-red-500 transition">Logout</button>
                        </form>
                    </li>
                @else
                    {{-- <li><a href="/login" class="hover:text-yellow-500 transition">Login</a></li> --}}
                    {{-- <li><a href="/register" class="hover:text-yellow-500 transition">Register</a></li> --}}
                @endauth
            </ul>
        </div>

        <!-- Menu Mobile -->
        <div x-show="open" x-transition
            class="md:hidden bg-white/90 backdrop-blur-lg shadow-lg rounded-b-2xl px-6 py-4 space-y-2 text-center">

            <a href="/" class="block py-2 font-semibold hover:text-yellow-500">Beranda</a>
            <a href="/huruf" class="block py-2 font-semibold hover:text-yellow-500">Huruf</a>
            <a href="/angka" class="block py-2 font-semibold hover:text-yellow-500">Angka</a>
            <a href="/warna" class="block py-2 font-semibold hover:text-yellow-500">Warna</a>

            @auth
                <a href="/dashboard" class="block py-2 font-semibold hover:text-yellow-500">Dashboard</a>
                <form method="POST" action="/logout">
                    @csrf
                    <button class="block w-full py-2 font-semibold hover:text-red-500">Logout</button>
                </form>
            @else
                {{-- <a href="/login" class="block py-2 font-semibold hover:text-yellow-500">Login</a> --}}
                {{-- <a href="/register" class="block py-2 font-semibold hover:text-yellow-500">Register</a> --}}
            @endauth
        </div>
    </nav>

    <!-- Konten halaman -->
    <div class="pt-24">
        @yield('content')
    </div>

</body>

</html>
