<?php

$data = $_POST;

try{
    $conn = mysqli_connect("localhost", "root", "", "eventos");
    $sql = "INSERT INTO PALESTRAS (ID, NOME, `DATA`, TURNO, DURACAO, TEMA, SALA, MINISTRANTE)
            VALUES (DEFAULT, '{$data['nome']}', '{$data['data']}', '{$data['turno']}', '{$data['duracao']}', '{$data['tema']}', '{$data['sala']}', {$data['ministrante']})";
    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);
    echo "Cadastrado com Sucesso!";
} catch(Exception $e)
{
    echo "Erro: " . $e->getMessage();
}