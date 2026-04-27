<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *'); 

$arquivo = 'palavras.json';

if (!file_exists($arquivo)) {
    echo json_encode(["erro" => "Arquivo JSON não encontrado"]);
    exit;
}

$conteudo = file_get_contents($arquivo);
$json = json_decode($conteudo, true);

if ($json === null) {
    echo json_encode(["erro" => "JSON inválido"]);
    exit;
}

echo json_encode($json);
