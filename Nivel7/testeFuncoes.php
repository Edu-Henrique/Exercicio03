<?php

require_once __DIR__ . "/db/palestra_db.php";

$dados = [
    "id" => 16,
    "nome" => "POO para Leigos Atualizado",
    "data" => "2024-02-05",
    "turno" => "matutino",
    "duracao" => "4",
    "tema" => "Segurança",
    "sala" => "30",
    "ministrante" => 2,
];

// echo insertPalestra($dados);
// echo updatePalestra($dados);
echo "<pre>";
var_dump(listPalestra());
echo "</pre>";