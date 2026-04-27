<?php
session_start();

// Se o usuário não está logado, não pode salvar no ranking
if (!isset($_SESSION['usuario_id'])) {
    echo "erro: usuario_nao_logado";
    exit;
}

$usuario_id = $_SESSION['usuario_id'];

// Recebe JSON do JavaScript
$data = json_decode(file_get_contents("php://input"), true);

if (!isset($data['pontuacao'])) {
    echo "erro: pontuacao_invalida";
    exit;
}

$pontuacao = (int)$data['pontuacao'];

// Conexão DB
$conn = new mysqli("localhost", "root", "admin", "projeto_web");
if ($conn->connect_error) {
    echo "erro: conexao";
    exit;
}

// Inserir pontuação na tabela ranking
$stmt = $conn->prepare("INSERT INTO ranking (usuario_id, pontuacao) VALUES (?, ?)");
$stmt->bind_param("ii", $usuario_id, $pontuacao);

if ($stmt->execute()) {
    echo "ok";
} else {
    echo "erro: insert";
}

$stmt->close();
$conn->close();
?>
