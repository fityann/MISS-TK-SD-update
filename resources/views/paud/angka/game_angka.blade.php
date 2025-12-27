<body style="background-image: url('{{ asset('assets/img/bg.png') }}');"
      class="bg-cover bg-center bg-no-repeat min-h-screen flex flex-col items-center relative">

    {{-- NAVBAR --}}
    @include('layouts.navbar')

    {{-- ============ POPUP MODAL INPUT NAMA ============ --}}
    <div id="modalNama"
        class="fixed inset-0 bg-black/50 flex items-center justify-center z-50">
        <div class="bg-white rounded-2xl p-6 w-80 text-center shadow-xl">
            <h2 class="text-xl font-bold mb-3 text-gray-700">Masukkan Nama Kamu</h2>

            <input id="playerName" type="text"
                   class="w-full border rounded-lg px-3 py-2 mb-4"
                   placeholder="Nama kamu...">

            <button onclick="mulaiKuis()"
                    class="w-full bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 rounded-lg">
                Mulai
            </button>
        </div>
    </div>

    {{-- ============ MAIN CONTENT KUIS ============ --}}
    <div class="pt-28 w-full max-w-xl mx-auto text-center px-5">

        {{-- Judul --}}
        <h1 class="text-3xl sm:text-4xl font-extrabold text-blue-600 mb-6 drop-shadow-lg">
            ✨ Kuis Hitung Gambar ✨
        </h1>

        {{-- Soal --}}
        <p class="text-lg font-semibold mb-4 text-gray-800">
            Soal ke- <span id="soalNow">1</span> / 10
        </p>

        {{-- Area Gambar --}}
        <div class="flex justify-center mb-8">
            <div id="imageRow"
                 class="flex flex-wrap gap-4 justify-center text-5xl sm:text-6xl px-3">
            </div>
        </div>

        {{-- Pertanyaan --}}
        <h2 class="text-2xl font-semibold text-gray-800 mb-4">
            Ada berapa gambar di atas?
        </h2>

        {{-- Pilihan Jawaban --}}
        <div id="options"
             class="grid grid-cols-3 gap-4 px-6 max-w-sm mx-auto">
        </div>

        {{-- Feedback --}}
        <p id="feedback" class="text-xl font-bold mt-6 h-10 flex items-center justify-center"></p>

        {{-- Score --}}
        <p class="text-lg mt-4 text-gray-700">
            Skor: <span id="score">0</span>
        </p>

        {{-- Finish Button --}}
        <button id="finishBtn"
                class="hidden mt-6 bg-green-500 hover:bg-green-600 text-white font-bold px-6 py-3 rounded-xl shadow-md text-xl"
                onclick="location.href='/leaderboard_angka'">
            Lihat Leaderboard
        </button>

    </div>

</body>


   <script>
    let score = 0;
    let totalSoal = 10;
    let currentSoal = 1;
    let namaPemain = null;

    const images = [
        "🍎","🍌","🍇","🍉","🍓",
        "⭐","🟢","🔵","🔴","🟡",
        "🐶","🐱","🐰","🐸","🐥"
    ];

    // ========== POPUP NAMA ==========
    function mulaiKuis() {
        const input = document.getElementById("playerName").value.trim();
        if (input === "") {
            alert("Nama tidak boleh kosong!");
            return;
        }

        namaPemain = input;
        localStorage.setItem("nama_angka", namaPemain);

        document.getElementById("modalNama").classList.add("hidden");

        generateQuestion();
    }

    // ========== SOAL ==========
    function generateQuestion() {

        if (currentSoal > totalSoal) {
            document.getElementById('feedback').textContent = "🎉 Kuis Selesai!";
            document.getElementById('feedback').className = "text-green-600 font-bold text-2xl";

            kirimScoreKeServer();

            document.getElementById('options').innerHTML = "";
            document.getElementById('finishBtn').classList.remove('hidden');
            return;
        }

        document.getElementById('soalNow').textContent = currentSoal;

        const row = document.getElementById('imageRow');
        const optionsContainer = document.getElementById('options');
        const feedback = document.getElementById('feedback');

        row.innerHTML = "";
        optionsContainer.innerHTML = "";
        feedback.textContent = "";

        const count = Math.floor(Math.random() * 6) + 3;
        const img = images[Math.floor(Math.random() * images.length)];

        for (let i = 0; i < count; i++) {
            let el = document.createElement("div");
            el.className = "text-5xl sm:text-6xl drop-shadow-md";
            el.textContent = img;
            row.appendChild(el);
        }

        let answers = [count];
        while (answers.length < 3) {
            let rand = Math.floor(Math.random() * 9) + 1;
            if (!answers.includes(rand)) answers.push(rand);
        }

        answers.sort(() => Math.random() - 0.5);

        answers.forEach(num => {
            let btn = document.createElement("button");
            btn.textContent = num;
            btn.className =
                "bg-yellow-400 hover:bg-yellow-500 text-white font-bold py-3 rounded-xl transition text-xl shadow-md";
            btn.onclick = () => checkAnswer(num, count);
            optionsContainer.appendChild(btn);
        });
    }

    function checkAnswer(selected, correct) {
        const feedback = document.getElementById('feedback');
        if (selected === correct) {
            feedback.textContent = "🎉 Benar!";
            feedback.className = "text-green-600 font-bold text-2xl";
            score++;
            document.getElementById('score').textContent = score;

            currentSoal++;
            setTimeout(generateQuestion, 1000);

        } else {
            feedback.textContent = "❌ Salah!";
            feedback.className = "text-red-600 font-bold text-2xl";
        }
    }

    // ========== SIMPAN SCORE ==========
    function kirimScoreKeServer() {
        fetch("/save_score_angka", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content
            },
            body: JSON.stringify({
                nama: namaPemain,
                score: score
            })
        });
    }
</script>

</body>
</html>
