<?php
$host = "localhost";
$user = "root";
$pass = "admin";
$dbname = "projeto_web";

$conn = new mysqli($host, $user, $pass, $dbname);

// Verificar erro
if ($conn->connect_error) {
    die("Erro na conexão com o MySQL: " . $conn->connect_error);
}
?>
