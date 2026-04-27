<?php
require "conexao.php";

// Pegando dados do formulário
$nome = isset($_POST['nome']) ? trim($_POST['nome']) : '';
$email = isset($_POST['email']) ? trim($_POST['email']) : '';
$senha = isset($_POST['senha']) ? $_POST['senha'] : '';
$confirmar = isset($_POST['confirmar']) ? $_POST['confirmar'] : '';

// Validações
if (empty($nome) || empty($email) || empty($senha) || empty($confirmar)) {
    die("Todos os campos são obrigatórios.");
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    die("Email inválido.");
}

if ($senha !== $confirmar) {
    die("As senhas não coincidem.");
}

if (strlen($senha) < 8 || !preg_match('/[A-Z]/', $senha) || !preg_match('/[a-z]/', $senha) || !preg_match('/[0-9]/', $senha)) {
    die("A senha deve ter pelo menos 8 caracteres e conter letras maiúsculas, minúsculas e números.");
}

// Hash da senha
$senha_hash = password_hash($senha, PASSWORD_DEFAULT);

// Inserindo no banco
$sql = "INSERT INTO usuarios (nome, email, senha) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $nome, $email, $senha_hash);

if ($stmt->execute()) {
    header("Location: AbaSite.html");
    exit();
} else {
    die("Erro: " . $stmt->error);
}

$stmt->close();
$conn->close();
