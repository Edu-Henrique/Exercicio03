<?php
        
require_once __DIR__ . "/db/ministrante_db.php";

if(!empty($_REQUEST["action"]) and ($_REQUEST["action"]) == "save"){
    $data = $_POST;
    try{
        insertMinistrante($data);
        header("Location: listaPalestra.php");                
    } catch(Exception $e)
    {
        echo "Erro: " . $e->getMessage();
    }   
}

$index = file_get_contents("html/templateMinistranteForm.html");

echo $index;