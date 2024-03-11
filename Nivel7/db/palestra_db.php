<?php

function getPalestra($id)
{
    $conn = mysqli_connect("localhost", "root", "", "eventos");
    $sql = "SELECT * FROM PALESTRAS WHERE ID = {$id}";
    $result = mysqli_query($conn, $sql);
    $palestra = mysqli_fetch_assoc($result);
    mysqli_close($conn);
    return $palestra;
}

function excluiPalestra($id)
{
    $conn = mysqli_connect("localhost", "root", "", "eventos");
    $sql  = "DELETE FROM PALESTRAS WHERE ID = {$id}";
    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);
    return $result;
}

function insertPalestra($palestra)
{
    $conn = mysqli_connect("localhost", "root", "", "eventos");
    $sql = "INSERT INTO PALESTRAS (ID, NOME, `DATA`, TURNO, DURACAO, TEMA, SALA, MINISTRANTE)
                    VALUES (DEFAULT, '{$palestra['nome']}', '{$palestra['data']}', '{$palestra['turno']}', '{$palestra['duracao']}', '{$palestra['tema']}', '{$palestra['sala']}', {$palestra['ministrante']})";
    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);
    return $result;
}

function updatePalestra($palestra)
{
    $conn = mysqli_connect("localhost", "root", "", "eventos");
    $sql = "UPDATE PALESTRAS SET NOME        = '{$palestra['nome']}',
                                 `DATA`      = '{$palestra['data']}',
                                 TURNO       = '{$palestra['turno']}', 
                                 DURACAO     = '{$palestra['duracao']}', 
                                 TEMA        = '{$palestra['tema']}', 
                                 SALA        = '{$palestra['sala']}', 
                                 MINISTRANTE = {$palestra['ministrante']} WHERE ID = {$palestra['id']}";
    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);
    return $result;
}

function listPalestra()
{
    $conn = mysqli_connect("localhost", "root", "", "eventos");
    $sql  = "SELECT * FROM PALESTRAS";
    $result = mysqli_query($conn, $sql);
    $list = mysqli_fetch_all($result);
    mysqli_close($conn);
    return $list;
}