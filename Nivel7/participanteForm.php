<?php

require_once __DIR__ . "/lista_combo_cidades.php";
require_once __DIR__ . "/db/participante_db.php";
require_once __DIR__ . "/class/Participante.php";

if(!empty($_REQUEST["action"]) and ($_REQUEST["action"]) == "save"){
    
    $data = $_POST;

    try{        
        (new Participante)->save($data);
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