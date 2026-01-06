<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Kuis Pengurangan TK</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.6.0/dist/confetti.browser.min.js"></script>
    <style>
        @keyframes wiggle { 0%, 100% { transform: rotate(-2deg); } 50% { transform: rotate(2deg); } }
        .wiggle { animation: wiggle 0.3s ease-in-out; }
        .bg-game {
            background-image: url('{{ asset('assets/img/kindergarten backgro.png') }}');
            background-size: cover; background-position: center;
        }
    </style>
</head>
<body class="bg-game min-h-screen flex flex-col font-sans relative overflow-x-hidden">

    @include('layouts.navbar')

    <div class="flex-grow flex items-center justify-center px-4 pt-20 pb-10">
        
        <div class="relative w-full max-w-lg bg-[#FFF9E3] rounded-[40px] border-[10px] border-[#D28E43] shadow-2xl p-6 text-center">
            
            <div class="absolute -top-6 left-1/2 transform -translate-x-1/2 bg-blue-600 text-white px-8 py-2 rounded-xl shadow-lg font-bold text-xl uppercase tracking-wider z-20">
                Pengurangan
            </div>

            <div class="absolute -left-10 top-1/4 hidden md:block w-24 z-10">
                <img src="https://cdn-icons-png.flaticon.com/512/1995/1995562.png" alt="Giraffe" class="drop-shadow-md">
            </div>
            <div class="absolute -right-10 top-1/4 hidden md:block w-24 z-10">
                <img src="https://cdn-icons-png.flaticon.com/512/616/616412.png" alt="Elephant" class="drop-shadow-md">
            </div>

            <div id="nameInputSection" class="py-8 space-y-5">
                <h3 class="text-2xl font-bold text-brown-800">Halo Teman Pintar!</h3>
                <p class="text-gray-600">Masukkan namamu untuk mulai kuis:</p>
                <input id="playerName" type="text" placeholder="Nama Kamu..." 
                       class="w-full p-4 rounded-2xl border-4 border-yellow-400 text-center text-xl font-bold focus:outline-none focus:ring-4 focus:ring-yellow-200">
                <button onclick="startQuizFlow()" class="w-full bg-blue-500 hover:bg-blue-600 text-white font-black py-4 rounded-2xl shadow-[0_6px_0_0_#1e40af] text-xl transition-all active:translate-y-1 active:shadow-none">
                    MULAI KUIS 🚀
                </button>
            </div>

            <div id="quizSection" class="hidden">
                <div class="flex justify-between items-center mb-4">
                    <div class="bg-white border-4 border-yellow-400 rounded-xl px-4 py-1 font-bold text-lg text-yellow-700">
                        ⭐ <span id="qNum">1</span>/10
                    </div>
                    <div class="bg-white border-4 border-yellow-400 rounded-xl px-4 py-1 font-bold text-lg text-yellow-700">
                        Poin: <span id="scoreVal">0</span>
                    </div>
                </div>

                <p id="labelPemain" class="text-sm font-semibold text-gray-500 mb-2 italic"></p>

                <div class="bg-white/50 rounded-3xl py-6 mb-6 flex justify-center items-center gap-4 text-6xl font-black text-gray-800 shadow-inner">
                    <span id="v1">0</span>
                    <span class="text-blue-500">-</span>
                    <span id="v2">0</span>
                    <span class="text-gray-400">=</span>
                </div>

                <div id="optionsGrid" class="grid grid-cols-2 gap-4">
                </div>
            </div>

            <div id="resultSection" class="hidden py-10">
                <h2 class="text-4xl font-black text-green-600 mb-2">SELESAI! 🏆</h2>
                <p id="finalMsg" class="text-xl font-bold text-gray-700 mb-6"></p>
                <button onclick="location.reload()" class="bg-orange-500 hover:bg-orange-600 text-white text-xl font-black px-10 py-3 rounded-2xl shadow-[0_5px_0_0_#c2410c] active:translate-y-1 active:shadow-none">
                    MAIN LAGI 🔁
                </button>
            </div>

        </div>
    </div>

    <audio id="sCorrect" src="/assets/sound/benar.mp3"></audio>
    <audio id="sWrong" src="/assets/sound/salah.mp3"></audio>

    <script>
        let currentQ = 1; let score = 0; let answer = 0; let playerName = "";

        function startQuizFlow() {
            const name = document.getElementById('playerName').value.trim();
            if(!name) { alert("Tulis namamu dulu ya! 😊"); return; }
            
            playerName = name;
            document.getElementById('nameInputSection').classList.add('hidden');
            document.getElementById('quizSection').classList.remove('hidden');
            document.getElementById('labelPemain').textContent = `👤 Pemain: ${playerName}`;
            loadQuestion();
        }

        function loadQuestion() {
            if (currentQ > 10) { showFinish(); return; }
            document.getElementById('qNum').textContent = currentQ;
            
            // Logika Pengurangan: n1 harus >= n2
            let n1 = Math.floor(Math.random() * 9) + 2; // angka 2-10
            let n2 = Math.floor(Math.random() * n1);    // angka 0 sampai n1
            
            answer = n1 - n2;
            document.getElementById('v1').textContent = n1;
            document.getElementById('v2').textContent = n2;

            const grid = document.getElementById('optionsGrid');
            grid.innerHTML = '';

            let choices = new Set([answer]);
            while(choices.size < 4) {
                let r = answer + (Math.floor(Math.random() * 5) - 2);
                if(r >= 0 && r !== answer) choices.add(r);
            }

            const colors = ['bg-[#4ADE80]', 'bg-[#FB923C]', 'bg-[#60A5FA]', 'bg-[#C084FC]'];
            const shadows = ['shadow-[0_5px_0_0_#16a34a]', 'shadow-[0_5px_0_0_#ea580c]', 'shadow-[0_5px_0_0_#2563eb]', 'shadow-[0_5px_0_0_#9333ea]'];

            Array.from(choices).sort(() => Math.random() - 0.5).forEach((val, i) => {
                const btn = document.createElement('button');
                btn.className = `${colors[i]} ${shadows[i]} text-white text-3xl font-black py-4 rounded-2xl transition-all active:translate-y-1 active:shadow-none`;
                btn.textContent = val;
                btn.dataset.value = val;
                btn.onclick = () => check(val, btn);
                grid.appendChild(btn);
            });
        }

        function check(val, btn) {
            const btns = document.querySelectorAll('#optionsGrid button');
            btns.forEach(b => b.disabled = true);

            if (val === answer) {
                score += 10;
                document.getElementById('scoreVal').textContent = score;
                btn.classList.replace(btn.classList[0], 'bg-green-600');
                btn.classList.add('wiggle', 'border-4', 'border-white');
                document.getElementById('sCorrect').play();
                confetti({ particleCount: 100, spread: 70, origin: { y: 0.6 } });
            } else {
                btn.classList.replace(btn.classList[0], 'bg-red-600');
                btn.classList.add('opacity-50', 'grayscale');
                document.getElementById('sWrong').play();

                // Validasi: Tombol benar akan bergoyang
                btns.forEach(b => {
                    if (parseInt(b.dataset.value) === answer) {
                        b.classList.add('wiggle', 'border-4', 'border-white');
                    }
                });
            }

            setTimeout(() => { currentQ++; loadQuestion(); }, 1500);
        }

        function showFinish() {
            document.getElementById('quizSection').classList.add('hidden');
            document.getElementById('resultSection').classList.remove('hidden');
            document.getElementById('finalMsg').textContent = `${playerName}, kamu dapat ${score} poin!`;
            
            fetch('/leaderboard/save', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json', 'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content },
                body: JSON.stringify({ quiz_type: "tk_pengurangan", score: score })
            }).catch(e => console.log("Save error"));
        }
    </script>
</body>
</html>