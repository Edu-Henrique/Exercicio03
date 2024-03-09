<?php

$data = $_POST;

try{
    $conn = mysqli_connect("localhost", "root", "", "eventos");
    $sql = "INSERT INTO MINISTRANTE (ID, NOME, TELEFONE, EMAIL)
            VALUES (DEFAULT, '{$data['nome']}', '{$data['telefone']}', '{$data['email']}')";
    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);
    header("Location: listaPalestra.php");
    // echo "Cadastrado com Sucesso! <a href='ministranteForm.php'>Voltar</a>";
} catch(Exception $e)
{
    echo "Erro: " . $e->getMessage();
}