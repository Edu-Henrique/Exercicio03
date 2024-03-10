<?php

function getInscricao($id)
{
    $conn = mysqli_connect("localhost", "root", "", "eventos");
    $sql = "SELECT * FROM INSCRICAO WHERE ID = {$id}";
    $result = mysqli_query($conn, $sql);
    $incricao = mysqli_fetch_assoc($result);
    mysqli_close($conn);
    return $incricao;
}

function insertInscricao($incricao)
{
    $conn = mysqli_connect("localhost", "root", "", "eventos");
    $sql = "INSERT INTO INSCRICAO (ID, id_participante, id_palestra)
                VALUES (DEFAULT, '{$incricao['id_participante']}', '{$incricao['id_palestra']}')";
    $result = mysqli_query($conn, $sql);    
    mysqli_close($conn);
    return $result;
}

function listInscricoes()
{
    $conn = mysqli_connect("localhost", "root", "", "eventos");
    
    $sql = "SELECT I.id,
    P.id AS ID_PARTICIPANTE,
    P.nome AS NOME_PARTICIPANTE,
    P.telefone AS TELEFONE_PARTICIPANTE,
    P.email AS EMAIL_PARTICIPANTE,
    L.id AS ID_PALESTRA,
    L.nome AS NOME_PALESTRA       
        FROM inscricao I 
        INNER JOIN participante P ON I.id_participante = P.id
        INNER JOIN palestras L ON I.id_palestra = L.id ORDER BY L.ID";

    $result = mysqli_query($conn, $sql);
    $incricoes = mysqli_fetch_all($result);
    mysqli_close($conn);
    return $incricoes;
}