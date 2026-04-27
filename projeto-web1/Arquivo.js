document.addEventListener("DOMContentLoaded", () => {
    
    //  Elementos do DOM 
    const wordEl = document.getElementById('word');
    const inputEl = document.getElementById('input');
    const timeEl = document.getElementById('time');
    const scoreEl = document.getElementById('score');
    const bestEl = document.getElementById('best');
    const startBtn = document.getElementById('start');
    const outputEl = document.getElementById('output');

    //  Variáveis do jogo 
    let words = [];
    let time = 60;
    let timerId = null;
    let running = false;
    let score = 0;
    let best = parseInt(bestEl ? bestEl.textContent : 0);

    //  Carrega palavras do servidor 
    async function loadWords() {
        try {
            const res = await fetch("palavras.json");
            const data = await res.json();
            if (data.palavras && Array.isArray(data.palavras)) {
                words = data.palavras;
                console.log("Total de palavras carregadas:", words.length);
            } else {
                console.error("Formato de dados inválido:", data);
            }
        } catch (err) {
            console.error("Erro ao carregar palavras:", err);
        }
    }

    //  Próxima palavra 
    function randWord() {
        if (!words.length) return '';
        return words[Math.floor(Math.random() * words.length)];
    }

    function nextWord() {
        if (!wordEl) return;
        wordEl.textContent = randWord();
        if (inputEl) inputEl.value = '';
        inputEl.focus();
    }

    //  Iniciar/terminar jogo 
    function startGame() {
        if (running) return;
        if (!words.length) {
            alert("Nenhuma palavra carregada para o jogo.");
            return;
        }
        running = true;
        time = 60;
        score = 0;
        scoreEl.textContent = score;
        timeEl.textContent = time;
        startBtn.textContent = 'Jogando...';
        nextWord();
        timerId = setInterval(() => {
            time--;
            timeEl.textContent = time;
            if (time <= 0) endGame();
        }, 1000);
    }

    function endGame() {
        running = false;
        clearInterval(timerId);
        startBtn.textContent = 'Iniciar';
        inputEl.blur();

        // Atualiza "best" localmente
        if (score > best) {
            best = score;
            bestEl.textContent = best;
        }

        // - envia para o servidor -
        fetch("salvar_ranking.php", {
            method: "POST",
            headers: { "Content-Type": "application/json" },
            body: JSON.stringify({ pontuacao: score })
        })
        .then(res => res.text())
        .then(resp => {
            console.log("Resposta do servidor:", resp);

            if (resp.includes("usuario_nao_logado")) {
                console.warn("Usuário não logado, pontuação não salva.");
            } else if (resp === "ok") {
                console.log("Pontuação salva com sucesso no ranking!");
            } else {
                console.error("Erro inesperado ao salvar:", resp);
            }
        })
        .catch(err => console.error("Erro ao enviar score:", err));

        // --

        alert('Tempo esgotado! Sua pontuação: ' + score);
    }
    
    //  Input com efeito de cores 
    inputEl.addEventListener('input', () => {
        if (!running) return;
        const typed = inputEl.value;
        const target = wordEl.textContent;
        let resultado = '';

        for (let i = 0; i < target.length; i++) {
            if (!typed[i]) {
                resultado += `<span>${target[i]}</span>`;
            } else if (typed[i] === target[i]) {
                resultado += `<span style="color: green;">${target[i]}</span>`;
            } else {
                resultado += `<span style="color: red;">${target[i]}</span>`;
            }
        }

        wordEl.innerHTML = resultado;
    });

    //  Enter para validar palavra 
    inputEl.addEventListener('keydown', (e) => {
        if (!running) return;
        if (e.key === 'Enter') {
            e.preventDefault();
            const typed = inputEl.value.trim();
            const current = wordEl.textContent.replace(/<[^>]+>/g, '').trim();
            if (typed === current) {
                score++;
                scoreEl.textContent = score;
                nextWord();
            }
            inputEl.value = '';
        }
    });

    //  Botão iniciar 
    startBtn.addEventListener('click', () => {
        if (!running) startGame();
    });

    //  Inicialização 
    loadWords();
});