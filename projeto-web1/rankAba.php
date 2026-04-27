<?php
session_start();

// Conexão com o banco
$host = "localhost";
$user = "root";
$pass = "admin";
$dbname = "projeto_web";

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// Consulta ranking
$sql = "
    SELECT r.pontuacao, u.nome
    FROM ranking r
    INNER JOIN usuarios u ON r.usuario_id = u.id
    ORDER BY r.pontuacao DESC
";

$result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ranking</title>
    <link rel="stylesheet" href="Site.css">
    <script src="Arquivo.js" defer></script>
</head>
<body>
    <h1 class="titulo" style="font-size: 4rem">Rank</h1>

    <div id="user">
        <h2>Ranking de Jogadores</h2>

        <?php
        if ($result && $result->num_rows > 0):
            while ($row = $result->fetch_assoc()):
        ?>

        <div class="user-camp">
            <span class="username">👤 <?= htmlspecialchars($row['nome']) ?></span>
            <input type="text" value="pontos: <?= $row['pontuacao'] ?>" readonly>
        </div>

        <?php
            endwhile;
        else:
            echo "<p>Nenhum resultado encontrado.</p>";
        endif;

        $conn->close();
        ?>
    </div>
</body>
</html>
