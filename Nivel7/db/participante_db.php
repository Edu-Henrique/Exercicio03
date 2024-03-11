<?php

function getParticipante($id)
{
    $conn = mysqli_connect("localhost", "root", "", "eventos");
    $sql = "SELECT * FROM PARTICIPANTE WHERE ID = {$id}";
    $result = mysqli_query($conn, $sql);
    $participante = mysqli_fetch_assoc($result);
    mysqli_close($conn);
    return $participante;
}

function insertParticipante($participante)
{
    $conn = mysqli_connect("localhost", "root", "", "eventos");
    $sql = "INSERT INTO PARTICIPANTE (ID, NOME, ENDERECO, BAIRRO, CIDADE, TELEFONE, EMAIL)
                VALUES (DEFAULT, '{$participante['nome']}', '{$participante['endereco']}', '{$participante['bairro']}', {$participante['cidade']}, '{$participante['telefone']}', '{$participante['email']}')";
    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);
    return $result;
}