<?php

    require_once __DIR__ . "/db/palestra_db.php";
    require_once __DIR__ . "/db/ministrante_db.php";

try {    
    if(!empty($_GET["action"]) and ($_GET["action"] ==  "remove")){
        if(!empty($_GET['id'])){
            $id = $_GET['id'];                
                excluiPalestra($id);
        }                
    }   

    $palestras = listPalestra();

    $bodyTable = "";    
    foreach($palestras as $row){

        $rowTable = file_get_contents("html/templateRowTable.html");

        $ministrante = getMinistrante($row[7]);

        $rowTable = str_replace("{id}",              $row[0],           $rowTable);
        $rowTable = str_replace("{nome}",            $row[1],         $rowTable);
        $rowTable = str_replace("{data}",            $row[2],         $rowTable);
        $rowTable = str_replace("{turno}",           $row[3],        $rowTable);
        $rowTable = str_replace("{duracao}",         $row[4],      $rowTable);
        $rowTable = str_replace("{tema}",            $row[5],         $rowTable);
        $rowTable = str_replace("{sala}",            $row[6],         $rowTable);
        $rowTable = str_replace("{nomeMinistrante}", $ministrante['nome'], $rowTable);

        $bodyTable .= $rowTable;
    }      
} catch(Exception $e){
    echo $e->getMessage();
}

$index = file_get_contents("html/templatePalestraList.html");
$index = str_replace("{rowTablePalestra}", $bodyTable, $index);
echo $index;