<?php

$data = $_POST;

try{
    $conn = mysqli_connect("localhost", "root", "", "eventos");
    if(!empty($_GET['edit'])){
        $sql = "UPDATE PALESTRAS SET NOME = '{$data['nome']}',
                                     `DATA` = '{$data['data']}',
                                     TURNO = '{$data['turno']}', 
                                     DURACAO = '{$data['duracao']}', 
                                     TEMA = '{$data['tema']}', 
                                     SALA = '{$data['sala']}', 
                                     MINISTRANTE = {$data['ministrante']} WHERE ID = {$data['id']}";
        $result = mysqli_query($conn, $sql);        
        // echo "Alterado com Sucesso! <a href='palestraForm.php'>Voltar</a>";
    } else{
        $sql = "INSERT INTO PALESTRAS (ID, NOME, `DATA`, TURNO, DURACAO, TEMA, SALA, MINISTRANTE)
                VALUES (DEFAULT, '{$data['nome']}', '{$data['data']}', '{$data['turno']}', '{$data['duracao']}', '{$data['tema']}', '{$data['sala']}', {$data['ministrante']})";
        $result = mysqli_query($conn, $sql);
        // echo "Cadastrado com Sucesso! <a href='palestraForm.php'>Voltar</a>";
    }
    mysqli_close($conn);
    header("Location: listaPalestra.php");
} catch(Exception $e)
{
    echo "Erro: " . $e->getMessage();
}