<script>
    /* =========================
   DATA SOAL (10)
========================= */
    const questions = [{
            word: 'TASIK',
            options: ['A', 'S', 'E', 'K', 'O', 'I', 'T']
        },
        {
            word: 'CISAYONG',
            options: ['C', 'A', 'S', 'G', 'O', 'I', 'N', 'Y']
        },
        {
            word: 'CIAMIS',
            options: ['S', 'I', 'M', 'A', 'I', 'C']
        },
        {
            word: 'GALUH',
            options: ['M', 'H', 'U', 'L', 'A', 'G']
        },
        {
            word: 'NAGARAWANGI',
            options: ['W', 'A', 'R', 'G', 'A', 'N', 'I', 'Z']
        },
        {
            word: 'JAKARTA',
            options: ['J', 'A', 'K', 'R', 'T', 'U']
        },
        {
            word: 'BANDUNG',
            options: ['B', 'A', 'N', 'D', 'U', 'G']
        },
        {
            word: 'SURABAYA',
            options: ['S', 'U', 'R', 'A', 'B', 'Y']
        },
        {
            word: 'MEDAN',
            options: ['M', 'E', 'D', 'A', 'N', 'I']
        },
        {
            word: 'SOLO',
            options: ['S', 'O', 'L', 'A', 'E', 'I']
        },
    ];

    /* =========================
       STATE
    ========================= */
    let currentQuestion = 0;
    let currentIndex = 0;
    let score = 0;

    /* =========================
       ELEMENT
    ========================= */
    const wordDiv = document.getElementById('word');
    const choicesDiv = document.getElementById('choices');
    const message = document.getElementById('message');
    const questionNumber = document.getElementById('questionNumber');

    /* AUDIO */
    const audio = new Audio();

    /* =========================
       LOAD SOAL
    ========================= */
    function loadQuestion() {
        if (currentQuestion >= questions.length) {
            showResult();
            return;
        }

        currentIndex = 0;
        message.innerText = '';
        questionNumber.innerText = currentQuestion + 1;

        wordDiv.innerHTML = '';
        const letters = questions[currentQuestion].word.split('');
        letters.forEach((l, i) => {
            const span = document.createElement('span');
            span.innerText = l;
            span.id = 'letter-' + i;
            span.className = 'text-gray-300';
            wordDiv.appendChild(span);
        });

        renderChoices();
    }

    /* =========================
       PILIHAN HURUF
    ========================= */
    function renderChoices() {
        choicesDiv.innerHTML = '';
        questions[currentQuestion].options.forEach(letter => {
            const btn = document.createElement('button');
            btn.innerText = letter;
            btn.className =
                'bg-yellow-300 hover:bg-yellow-400 text-3xl font-bold py-4 rounded-xl';
            btn.onclick = () => check(letter);
            choicesDiv.appendChild(btn);
        });
    }

    /* =========================
       CEK JAWABAN
    ========================= */
    function check(letter) {
        const correct = questions[currentQuestion].word[currentIndex];

        if (letter === correct) {
            document.getElementById('letter-' + currentIndex)
                .classList.replace('text-gray-300', 'text-green-500');

            playSound(letter);

            currentIndex++;
            message.innerText = 'Benar 🎉';

            if (currentIndex === questions[currentQuestion].word.length) {
                score += 10;
                setTimeout(() => {
                    currentQuestion++;
                    loadQuestion();
                }, 800);
            }
        } else {
            message.innerText = 'Coba lagi 😊';
        }
    }

    /* =========================
       AUDIO HURUF
       PATH: public/assets/sound/a.mp3
    ========================= */
    function playSound(letter) {
        const lower = letter.toLowerCase();
        audio.src = "/assets/sound/" + lower + ".mp3";
        audio.load();
        audio.play().catch(err => console.log(err));
    }

    /* =========================
       HASIL AKHIR
    ========================= */
    function showResult() {
        let stars = '⭐';
        if (score >= 80) stars = '⭐⭐⭐';
        else if (score >= 50) stars = '⭐⭐';

        document.getElementById('app').innerHTML = `
        <h1 class="text-4xl font-bold">🎉 Hebat!</h1>
        <p class="text-3xl mt-4">Skor Akhir: ${score}</p>
        <div class="text-5xl mt-4">${stars}</div>
        <a href=""
           class="inline-block mt-6 bg-blue-500 text-white px-8 py-4 text-2xl rounded-full">
           Ulangi
        </a>
    `;
    }

    /* START */
    loadQuestion();
</script>
