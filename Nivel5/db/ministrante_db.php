<?php

function getMinistrante($id)
{
    $conn = mysqli_connect("localhost", "root", "", "eventos");
    $sql = "SELECT * FROM MINISTRANTE WHERE ID = {$id}";
    $result = mysqli_query($conn, $sql);
    $ministrante = mysqli_fetch_assoc($result);
    mysqli_close($conn);
    return $ministrante;
}

function insertMinistrante($ministrante)
{
    $conn = mysqli_connect("localhost", "root", "", "eventos");
    $sql = "INSERT INTO MINISTRANTE (ID, NOME, TELEFONE, EMAIL)
                VALUES (DEFAULT, '{$ministrante['nome']}', '{$ministrante['telefone']}', '{$ministrante['email']}')";
    $result = mysqli_query($conn, $sql);
    return $result;
}
