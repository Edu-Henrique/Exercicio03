<?php

$data = $_POST;

try{
    $conn = mysqli_connect("localhost", "root", "", "eventos");
    $sql = "INSERT INTO PARTICIPANTE (ID, NOME, ENDERECO, BAIRRO, CIDADE, TELEFONE, EMAIL)
            VALUES (DEFAULT, '{$data['nome']}', '{$data['endereco']}', '{$data['bairro']}', {$data['cidade']}, '{$data['telefone']}', '{$data['email']}')";
    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);
    // echo "Cadastrado com Sucesso! <a href='participanteForm.php'>Voltar</a>";
    header("Location: listaPalestra.php");
} catch(Exception $e)
{
    echo "Erro: " . $e->getMessage();
}