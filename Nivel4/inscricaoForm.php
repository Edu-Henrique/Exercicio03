<?php

require_once __DIR__ . "/lista_combo_palestras.php";
require_once __DIR__ . "/lista_combo_participantes.php";

if(isset($_GET["id"])){
    $id = $_GET["id"];
}

if(!empty($_REQUEST["action"]) and ($_REQUEST["action"]) == "save"){
    
    $data = $_POST;        

    try{
        $conn = mysqli_connect("localhost", "root", "", "eventos");
        $sql = "INSERT INTO INSCRICAO (ID, id_participante, id_palestra)
                VALUES (DEFAULT, '{$data['id_participante']}', '{$data['id_palestra']}')";            
        $result = mysqli_query($conn, $sql);
        mysqli_close($conn);
        header("Location: listaPalestra.php");        
    } catch(Exception $e)
    {
        echo "Erro: " . $e->getMessage();
    }
}


$listPalestra     = lista_combo_palestras($id);
$listParticipante = lista_combo_participantes();

$index = file_get_contents("html/templateInscricaoForm.html");
$index = str_replace("{palestras}", $listPalestra, $index);
$index = str_replace("{participantes}", $listParticipante, $index);

echo $index;