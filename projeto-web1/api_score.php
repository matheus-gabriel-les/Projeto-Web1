<?php
session_start();
header('Content-Type: application/json');

// Usuário precisa estar logado
if (!isset($_SESSION['user_id'])) {
    echo json_encode(['erro' => 'Usuário não logado.']);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['score'])) {

    $score = (int)$_POST['score'];

    // Atualiza best score na sessão
    if (!isset($_SESSION['best_score']) || $score > $_SESSION['best_score']) {
        $_SESSION['best_score'] = $score;
    }

    // concetcar o bancod de dados
    $host = "localhost";
    $user = "root";
    $pass = "root";
    $dbname = "projeto_web";

    $conn = new mysqli($host, $user, $pass, $dbname);

    if ($conn->connect_error) {
        echo json_encode(['erro' => 'Falha na conexão: ' . $conn->connect_error]);
        exit;
    }

    // Salvar no ranking
    $stmt = $conn->prepare("INSERT INTO ranking (usuario_id, pontuacao) VALUES (?, ?)");
    $stmt->bind_param("ii", $_SESSION['user_id'], $score);

    if ($stmt->execute()) {
        echo json_encode([
            'best' => $_SESSION['best_score'],
            'status' => 'Score salvo com sucesso'
        ]);
    } else {
        echo json_encode(['erro' => 'Falha ao salvar score']);
    }

    $stmt->close();
    $conn->close();
    exit;
}

echo json_encode(['erro' => 'Requisição inválida']);
