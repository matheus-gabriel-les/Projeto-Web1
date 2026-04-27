<?php
session_start();
$best = isset($_SESSION['best_score']) ? (int)$_SESSION['best_score'] : 0;
?>
<!doctype html>
<html lang="pt-BR">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<link rel="stylesheet" href="Site.css">
<script src="Arquivo.js" defer></script>
<title>Jogo de Digitação</title>
</head>
<body>
<div class="card">
    <h1 class="titulo">WriteCode</h1>
    <p style="color:white">Digite a frase exibida o mais rápido possível. Tempo: <span id="time" style="color:white">60</span>s</p>
    <div id="word" style="color: white;">...</div>
    <center>
        <textarea id="input" autocomplete="off" placeholder="Digite aqui..." style="margin-bottom: 50px; font-size:1.5rem"></textarea>
    </center>
    <div class="meta">
        <div class="estilo">Pontuação: <span id="score">0</span></div>
        <div class="estilo">Melhor: <span id="best"><?= $best ?></span></div>
        <div><button id="start">Iniciar</button></div>
    </div>
</div>
</body>
</html>
