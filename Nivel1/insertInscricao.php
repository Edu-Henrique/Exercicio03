<?php

$data = $_POST;

var_dump($data);

try{
    $conn = mysqli_connect("localhost", "root", "", "eventos");
    $sql = "INSERT INTO INSCRICAO (ID, id_participante, id_palestra)
            VALUES (DEFAULT, '{$data['id_participante']}', '{$data['id_palestra']}')";            
    $result = mysqli_query($conn, $sql);
    mysqli_close($conn);
    header("Location: listaPalestra.php");
    // echo "Cadastrado com Sucesso! <a href='ministranteForm.php'>Voltar</a>";
} catch(Exception $e)
{
    echo "Erro: " . $e->getMessage();
}