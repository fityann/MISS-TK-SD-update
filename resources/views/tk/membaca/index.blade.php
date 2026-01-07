@include('layouts.navbar')
<div class="flex justify-center">
<body class="bg-blue-100 min-h-screen flex items-center justify-center">

<div id="app" class="bg-white w-full max-w-xl p-6 rounded-2xl shadow-xl text-center">

    <h1 class="text-3xl font-bold mb-2">📖 Belajar Membaca</h1>
    <p class="text-lg mb-4">Soal <span id="questionNumber">1</span> dari 10</p>

    <!-- KATA -->
    <div id="word" class="flex justify-center gap-2 text-5xl font-bold mb-6"></div>

    <!-- PILIHAN HURUF -->
    <div id="choices" class="grid grid-cols-4 gap-4 mb-4"></div>

    <!-- PESAN -->
    <p id="message" class="text-xl font-semibold h-8"></p>

</div>
</div>
@include('layouts.script')

</body>
</html>
