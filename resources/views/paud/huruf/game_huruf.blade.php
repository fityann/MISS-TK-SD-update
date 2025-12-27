<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Kuis Huruf Interaktif</title>

  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

  <style>
    @keyframes wiggle { 0%,100%{transform:rotate(-5deg);}50%{transform:rotate(5deg);} }
    .wiggle { animation: wiggle 0.3s ease-in-out; }
  </style>
</head>

<body class="bg-gradient-to-b from-pink-200 to-yellow-100 min-h-screen flex flex-col font-sans">

  {{-- NAV --}}
  @include('layouts.navbar')

  <!-- WRAPPER BIAR TENGAH -->
  <div class="flex flex-col items-center w-full px-4 sm:px-6 pt-28 pb-16">

    <!-- Tombol Kembali (Lebih Rapi & Deket Card) -->
    <a href="/paud/huruf"
       class="self-start mb-6 bg-green-500 hover:bg-green-600 text-white text-sm font-semibold
              px-5 py-2 rounded-full shadow-md flex items-center gap-2 transition transform hover:scale-105">
      ⬅️ Kembali
    </a>

    <!-- CARD UTAMA -->
    <div class="w-[92%] max-w-lg bg-white rounded-3xl shadow-xl p-7 text-center
                border border-gray-100 backdrop-blur-sm">

      <h1 class="text-3xl font-extrabold text-pink-600 drop-shadow-sm mb-2">
        🎯 Kuis Huruf Interaktif
      </h1>

      <p class="text-gray-600 mb-7 text-base">
        Masukkan nama kamu dan siap-siap dengerin pertanyaan!
      </p>

      <!-- INPUT NAMA -->
      <div id="nameInput" class="space-y-4">
        <input id="playerName"
               type="text"
               placeholder="Masukkan namamu..."
               class="border-2 border-pink-300 rounded-xl p-3 w-full text-center text-lg
                      focus:outline-none focus:ring-2 focus:ring-pink-400 shadow-sm" />

        <button onclick="startQuizSetup()"
                class="bg-blue-500 hover:bg-blue-600 text-white font-semibold px-6 py-3 rounded-full
                       shadow-md w-full text-lg transition transform hover:scale-105">
          🚀 Mulai Kuis
        </button>
      </div>

      <!-- AREA KUIS -->
      <div id="quizArea" class="hidden">
        <p id="playerLabel" class="text-lg font-semibold text-gray-700 mb-1"></p>
        <p id="questionNumber" class="text-sm text-gray-500 mb-6"></p>

        <button onclick="playQuestion()"
                class="bg-pink-500 hover:bg-pink-600 text-white text-base font-bold px-6 py-3
                       rounded-full shadow-md mb-5 transition transform hover:scale-105">
          🔊 Putar Pertanyaan
        </button>

        <div id="choices" class="grid grid-cols-3 gap-4"></div>

        <p id="feedback" class="text-xl font-bold mt-4"></p>
      </div>

      <!-- HASIL -->
      <div id="result" class="hidden mt-8">
        <h2 class="text-3xl font-bold text-green-600 mb-3">
          🎉 Kuis Selesai!
        </h2>

        <p id="scoreDisplay" class="text-lg font-semibold text-gray-800"></p>

        <button onclick="restartQuiz()"
                class="mt-5 bg-blue-500 hover:bg-blue-600 text-white px-6 py-2 rounded-full shadow-md
                       transition transform hover:scale-105">
          🔁 Ulangi Kuis
        </button>
      </div>

      <!-- LEADERBOARD -->
      <div id="leaderboard" class="mt-10">
        <h3 class="text-lg font-bold text-gray-700 mb-2 flex justify-center items-center gap-2">
          🏆 Skor Tertinggi
        </h3>

        <ul id="scoreList" class="text-gray-800 text-base space-y-1"></ul>
      </div>

    </div>
  </div>

  <!-- AUDIO -->
  <audio id="questionAudio"></audio>
  <audio id="feedbackAudio"></audio>

<script>
    const letters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ'.split('');
    let currentQuestion = 0;
    let score = 0;
    let questions = [];
    let playerName = "";

    function startQuizSetup() {
      const nameInput = document.getElementById('playerName').value.trim();
      if (nameInput === "") {
        alert("Masukkan namamu dulu ya 👧🧒");
        return;
      }
      playerName = nameInput;
      document.getElementById('nameInput').classList.add('hidden');
      document.getElementById('quizArea').classList.remove('hidden');
      document.getElementById('playerLabel').textContent = `👤 Pemain: ${playerName}`;
      startQuiz();
    }

    function startQuiz() {
      questions = shuffle([...letters]).slice(0, 10);
      currentQuestion = 0;
      score = 0;
      showQuestion();
    }

    function showQuestion() {
      document.getElementById('feedback').textContent = '';
      if (currentQuestion >= questions.length) {
        endQuiz();
        return;
      }

      const correctLetter = questions[currentQuestion];
      document.getElementById('questionNumber').textContent =
        `Soal ${currentQuestion + 1} dari ${questions.length}`;

      const choices = shuffle([correctLetter, ...getRandomLetters(2, correctLetter)]);
      const container = document.getElementById('choices');
      container.innerHTML = '';

      choices.forEach(letter => {
        const btn = document.createElement('button');
        btn.textContent = letter;
        btn.className = "bg-yellow-400 hover:bg-yellow-500 text-2xl font-bold text-white rounded-2xl py-3 sm:py-4 shadow-md transition-transform transform hover:scale-110";
        btn.onclick = () => checkAnswer(btn, letter, correctLetter);
        container.appendChild(btn);
      });
    }

    function playQuestion() {
      const letter = questions[currentQuestion];
      const audio = document.getElementById('questionAudio');
      audio.src = `/assets/sound/pertanyaan/${letter.toLowerCase()}.mp3`;
      audio.play();
    }

    function checkAnswer(button, selected, correct) {
      const feedback = document.getElementById('feedback');
      const feedbackAudio = document.getElementById('feedbackAudio');

      if (selected === correct) {
        score++;
        feedback.textContent = "✅ Benar! Hebat!";
        feedback.className = "text-green-600 font-extrabold mt-4";
        button.classList.add("bg-green-500", "wiggle");
        feedbackAudio.src = '/assets/sound/benar.mp3';
      } else {
        feedback.textContent = `❌ Salah! Jawaban benar: ${correct}`;
        feedback.className = "text-red-600 font-extrabold mt-4";
        button.classList.add("bg-red-500", "wiggle");
        feedbackAudio.src = '/assets/sound/salah.mp3';
      }

      feedbackAudio.play();

      setTimeout(() => {
        currentQuestion++;
        showQuestion();
      }, 1500);
    }

    function endQuiz() {
      document.getElementById('quizArea').classList.add('hidden');
      document.getElementById('result').classList.remove('hidden');

      document.getElementById('scoreDisplay').textContent =
        `${playerName}, skormu: ${score} dari ${questions.length}`;

      // SIMPAN KE DATABASE
      saveScoreToDatabase("huruf", score);
    }

    function restartQuiz() {
      document.getElementById('result').classList.add('hidden');
      document.getElementById('quizArea').classList.remove('hidden');
      startQuiz();
    }

    function shuffle(array) {
      for (let i = array.length - 1; i > 0; i--) {
        const j = Math.floor(Math.random() * (i + 1));
        [array[i], array[j]] = [array[j], array[i]];
      }
      return array;
    }

    function getRandomLetters(n, exclude) {
      const pool = letters.filter(l => l !== exclude);
      return shuffle(pool).slice(0, n);
    }
    // ==============================
    // 🔥 SAVE SCORE TO DATABASE (FIXED)
    // ==============================
    function saveScoreToDatabase(type, score) {
      fetch('/leaderboard/save', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
          'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
        },
        body: JSON.stringify({
          quiz_type: type,
          score: score
        })
      })
      .then(res => res.json())
      .then(() => loadLeaderboard())
      .catch(err => console.error("Gagal menyimpan skor:", err));
    }

    // ==============================
    // 🔥 LOAD LEADERBOARD FROM DB (AMAN)
    // ==============================
    function loadLeaderboard() {
      fetch('/leaderboard')
      .then(res => res.json())
      .then(scores => {
        const list = document.getElementById('scoreList');
        list.innerHTML = '';

        if(scores.length === 0){
          list.innerHTML = '<li class="text-gray-500">Belum ada skor 😅</li>';
          return;
        }

        scores.forEach((s, i) => {
          const li = document.createElement('li');
          li.innerHTML = `${i+1}. <span class="font-bold">${s.name}</span> — ${s.score} poin`;
          list.appendChild(li);
        });
      });
    }


    loadLeaderboard();
</script>

</body>
</html>
