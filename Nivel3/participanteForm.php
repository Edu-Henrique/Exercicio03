<?php

require_once __DIR__ . "/lista_combo_cidades.php";

if(!empty($_REQUEST["action"]) and ($_REQUEST["action"]) == "save"){
    
    $data = $_POST;

    try{
        $conn = mysqli_connect("localhost", "root", "", "eventos");
        $sql = "INSERT INTO PARTICIPANTE (ID, NOME, ENDERECO, BAIRRO, CIDADE, TELEFONE, EMAIL)
                VALUES (DEFAULT, '{$data['nome']}', '{$data['endereco']}', '{$data['bairro']}', {$data['cidade']}, '{$data['telefone']}', '{$data['email']}')";
        $result = mysqli_query($conn, $sql);
        mysqli_close($conn);                
        header("Location: listaPalestra.php");        
    } catch(Exception $e)
    {
        echo "Erro: " . $e->getMessage();
    }
}


$cidades = lista_combo_cidades();

$index = file_get_contents("html/templateParticipanteForm.html");
$index = str_replace("{cidades}", $cidades, $index);

echo $index;