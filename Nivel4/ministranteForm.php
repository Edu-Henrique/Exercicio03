<?php
        
if(!empty($_REQUEST["action"]) and ($_REQUEST["action"]) == "save"){
    $data = $_POST;
    try{
        $conn = mysqli_connect("localhost", "root", "", "eventos");
        $sql = "INSERT INTO MINISTRANTE (ID, NOME, TELEFONE, EMAIL)
                VALUES (DEFAULT, '{$data['nome']}', '{$data['telefone']}', '{$data['email']}')";
        $result = mysqli_query($conn, $sql);
        mysqli_close($conn);
        header("Location: listaPalestra.php");                
    } catch(Exception $e)
    {
        echo "Erro: " . $e->getMessage();
    }   
}

$index = file_get_contents("html/templateMinistranteForm.html");

echo $index;