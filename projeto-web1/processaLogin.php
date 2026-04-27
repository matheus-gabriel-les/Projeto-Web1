<?php
session_start(); // Inicia a sessão
require "conexao.php";

$email = isset($_POST['email']) ? trim($_POST['email']) : '';
$senha = isset($_POST['senha']) ? $_POST['senha'] : '';

// Validação básica
if (empty($email) || empty($senha)) {
    die("Todos os campos são obrigatórios.");
}

$sql = "SELECT id, nome, senha FROM usuarios WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 1) {
    $user = $result->fetch_assoc();

    if (password_verify($senha, $user['senha'])) {
        // Login OK, salva dados na sessão
        $_SESSION['usuario_id'] = $user['id'];
        $_SESSION['usuario_nome'] = $user['nome'];

        // Redireciona para jogo.php
        header("Location: jogo.php");
        exit();
    } else {
        die("Senha incorreta.");
    }
} else {
    die("Usuário não encontrado.");
}

$stmt->close();
$conn->close();
